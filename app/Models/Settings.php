<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Settings extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'settings';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    protected $casts = [
        'social_profiles' => 'array',
        'numbers' => 'array',
        'gallery' => 'array'
    ];

    public $translatable = ['address','work_hours','numbers','services'];

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

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setGalleryAttribute($value): void
    {
        $attribute_name = 'gallery';
        $disk = 'site_gallery';
        $watermarkPath = public_path('assets/images/logo.png');

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

            if (file_exists($watermarkPath)) {
                $originalWidth = $originalImage->width();

                $watermarkWidth = intval($originalWidth * 0.3);

                $watermark = Image::make($watermarkPath)
                    ->resize($watermarkWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->opacity(70);

                $originalImage->insert($watermark, 'center')->save($absolute);
            }

            $info = pathinfo($relative);
            $thumbRel = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
            $thumbAbs = Storage::disk($disk)->path($thumbRel);

            if (!Storage::disk($disk)->exists($thumbRel)) {
                $thumbImage = $originalForThumb->fit(600, 400);

                if (file_exists($watermarkPath)) {
                    $thumbWatermark = Image::make($watermarkPath)
                        ->resize(600 * 0.3, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->opacity(70);

                    $thumbImage->insert($thumbWatermark, 'center');
                }

                $thumbImage->save($thumbAbs);
            }
        }
    }


}
