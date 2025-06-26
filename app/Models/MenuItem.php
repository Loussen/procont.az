<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class MenuItem extends Model
{
    use CrudTrait;
    use HasTranslations;

    protected $table = 'menu_items';
    protected $fillable = ['name', 'type', 'link', 'page_id', 'parent_id','extras', 'bg_image', 'bg_image_thumb'];

    public $translatable = ['name','extras'];

    private string $image = 'bg_image';
    private string $thumbImage = 'bg_image_thumb';
    private string $disk = 'public';

    public function parent()
    {
        return $this->belongsTo('App\Models\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\MenuItem', 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id');
    }

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree()
    {
        $menu = self::orderBy('lft')->get();

        if ($menu->count()) {
            foreach ($menu as $k => $menu_item) {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem) {
                    if ($menu_subitem->parent_id == $menu_item->id) {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem) {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }

    public function url()
    {
        switch ($this->type) {
            case 'external_link':
                return $this->link;

            case 'internal_link':
                return is_null($this->link) ? '#' : url($this->link);

            default: //page_link
                if ($this->page) {
                    return url($this->page->slug);
                }
                break;
        }
    }

    public function setBgImageAttribute($value): void
    {
        $attribute_name = $this->image;
        $thumb_attribute_name = $this->thumbImage;
        // or use your own disk, defined in config/filesystems.php
        $disk = $this->disk;
        // destination path relative to the disk above
        $destination_path = "uploads/images/menus/images";

        // if the image was erased
        if (empty($value)) {
            // delete the image from disk
            if (!empty($this->{$attribute_name})) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }
            if (!empty($this->{$thumb_attribute_name})) {
                Storage::disk($disk)->delete($this->{$thumb_attribute_name});
            }
            // set null on database column
            $this->attributes[$attribute_name] = null;
            $this->attributes[$thumb_attribute_name] = null;
            return;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value)->encode('png', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';

            $thumbnail = Image::make($value)->fit(1920, 1280)->encode('png', 90);
            $thumb_filename = md5($value . time()) . '_thumb.png';

            // 2. Store the image on disk.
            Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            Storage::disk($disk)->put($destination_path . '/' . $thumb_filename, $thumbnail->stream());

            // 3. Delete the previous image, if there was one.
            if (!empty($this->{$attribute_name})) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }
            if (!empty($this->{$thumb_attribute_name})) {
                Storage::disk($disk)->delete($this->{$thumb_attribute_name});
            }

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
            $this->attributes[$thumb_attribute_name] = $public_destination_path . '/' . $thumb_filename;
        }
    }
}
