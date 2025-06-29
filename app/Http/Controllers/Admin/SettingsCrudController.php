<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\DropzoneOperation;
use Illuminate\Support\Facades\App;

/**
 * Class SettingsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SettingsCrudController extends CrudController
{
//    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use DropzoneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        App::setLocale('az');
        CRUD::setModel(\App\Models\Settings::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/settings');
        CRUD::setEntityNameStrings('ayarlar', 'ayarlar');

        if (!backpack_user()->can('ayarlar siyahi')) {
            CRUD::denyAccess(['list', 'show']);
        }

        if (!backpack_user()->can('ayarlar elave etmek')) {
            CRUD::denyAccess(['create']);
        }

        if (!backpack_user()->can('ayarlar duzelish etmek')) {
            CRUD::denyAccess(['update']);
        }

        if (!backpack_user()->can('ayarlar silmek')) {
            CRUD::denyAccess(['delete']);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingsRequest::class);
        CRUD::field('address')->label('Ünvan')->type('textarea');
        CRUD::field('phone')->label('Telefon nömrəsi')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('email')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('map')->type('textarea');
        $subfieldsSocialProfileInfo[] = [
            'name'        => 'social_network',
            'label'       => 'Sosial şəbəkə',
            'type'        => 'select2_from_array',
            'options'     => ['facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube', 'linkedin' => 'Linkedin', 'tiktok' => 'Tiktok'],
            'allows_null' => false,
            'default'     => 'one',
            'wrapper'     => [
                'class' => 'form-group col-md-4'
            ],
        ];
        $subfieldsSocialProfileInfo[] = [
            'name'        => 'link',
            'type'        => 'url',
            'wrapper'     => [
                'class' => 'form-group col-md-8'
            ],
        ];
        CRUD::addField([
            'name'          => 'social_profiles',
            'label'       => 'Sosial şəbəkə profillər',
            'type'          => "repeatable",
            'subfields'     => $subfieldsSocialProfileInfo,
            'max_rows'      => 10,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subfieldsNumbers[] = [
            'name'        => 'title',
            'label' => 'Başlıq',
            'wrapper'     => [
                'class' => 'form-group col-md-8'
            ],
        ];
        $subfieldsNumbers[] = [
            'name'        => 'number',
            'label' => 'Sayı',
            'type'        => 'number',
            'wrapper'     => [
                'class' => 'form-group col-md-4'
            ],
        ];
        CRUD::addField([
            'name'          => 'numbers',
            'label' => 'Dinamik saylar',
            'type'          => "repeatable",
            'subfields'     => $subfieldsNumbers,
            'max_rows'      => 4,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subfieldsServices[] = [
            'name'        => 'title',
            'label' => 'Başlıq',
            'wrapper'     => [
                'class' => 'form-group col-md-4'
            ],
        ];
        $subfieldsServices[] = [
            'name'        => 'description',
            'label' => 'Mətn',
            'type'        => 'textarea',
            'wrapper'     => [
                'class' => 'form-group col-md-8'
            ],
        ];
        CRUD::addField([
            'name'          => 'services',
            'type'          => "repeatable",
            'subfields'     => $subfieldsServices,
            'max_rows'      => 4,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        CRUD::addField([
            'name' => 'gallery',
            'label'       => 'Qalereya',
            'type' => 'dropzone',
            'disk' => 'site_gallery',
            'withFiles'    => true,
            'hint' => '600x400'
        ]);

        CRUD::field('work_hours')->label('İş saatları');

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
