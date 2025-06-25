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

        // DB-də saxlanacaq şəkil siyahısı
        $decoded = is_string($value) ? json_decode($value, true) : $value;
        if (!is_array($decoded)) {
            $decoded = [];
        }

        // Əvvəlki şəkillər (modeldə cast edilib array olacaq)
        $previous = $this->gallery ?? [];

        // Silinmiş şəkilləri tap və həm original, həm thumb faylını sil
        $deleted = array_diff($previous, $decoded);
        foreach ($deleted as $urlPath) {
            $diskUrl = Storage::disk($disk)->url('/');
            $relative = str_replace($diskUrl, '', $urlPath);
            Storage::disk($disk)->delete($relative);

            $info = pathinfo($relative);
            $thumb = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
            Storage::disk($disk)->delete($thumb);
        }

        // Yeni qiyməti yaz
        $this->attributes[$attribute_name] = json_encode($decoded);

        // Yeni və qalan şəkillər üçün thumb yarat (əgər yoxdursa)
        foreach ($decoded as $urlPath) {
            $diskUrl = Storage::disk($disk)->url('/');
            $relative = str_replace($diskUrl, '', $urlPath);
            $absolute = Storage::disk($disk)->path($relative);

            if (!file_exists($absolute)) {
                \Log::error("Şəkil tapılmadı: $absolute");
                continue;
            }

            $info = pathinfo($relative);
            $thumbRel = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
            $thumbAbs = Storage::disk($disk)->path($thumbRel);

            if (!Storage::disk($disk)->exists($thumbRel)) {
                Image::make($absolute)
                    ->fit(600, 400)
                    ->save($thumbAbs);
            }
        }
    }
}
