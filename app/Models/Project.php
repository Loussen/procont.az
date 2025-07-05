<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Project extends Model
{
    use CrudTrait;
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;
    use HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'projects';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    protected $casts = [
        'gallery' => 'array'
    ];

    public $translatable = ['name','short_description','description'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setGalleryAttribute($value): void
    {
        $attribute_name = 'gallery';
        $disk = 'projects_gallery';

        $decoded = is_string($value) ? json_decode($value, true) : $value;
        if (!is_array($decoded)) {
            $decoded = [];
        }

        $previous = $this->gallery ?? [];
        $deleted = array_diff($previous, $decoded);

        foreach ($deleted as $urlPath) {
            $diskUrl = Storage::disk($disk)->url('/');
            $relative = str_replace($diskUrl, '', $urlPath);
            Storage::disk($disk)->delete($relative);

            $info = pathinfo($relative);
            $thumb = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
            Storage::disk($disk)->delete($thumb);
        }

        $this->attributes[$attribute_name] = json_encode($decoded);

        foreach ($decoded as $urlPath) {
            $diskUrl = Storage::disk($disk)->url('/');
            $relative = str_replace($diskUrl, '', $urlPath);
            $absolute = Storage::disk($disk)->path($relative);

            if (!file_exists($absolute)) {
                \Log::error("Şəkil tapılmadı: $absolute");
                continue;
            }

            $originalImage = Image::make($absolute);
            $originalForThumb = clone $originalImage;

            // Əsas şəkli saxla (dəyişiklik etmədən)
            $originalImage->save($absolute);

            // Thumbnail yarat
            $info = pathinfo($relative);
            $thumbRel = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
            $thumbAbs = Storage::disk($disk)->path($thumbRel);

            if (!Storage::disk($disk)->exists($thumbRel)) {
                $thumbImage = $originalForThumb->fit(1100, 740);
                $thumbImage->save($thumbAbs);
            }
        }
    }

}
