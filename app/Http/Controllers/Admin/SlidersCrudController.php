<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SlidersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\App;

/**
 * Class SlidersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SlidersCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        App::setLocale('az');
        CRUD::setModel(\App\Models\Sliders::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sliders');
        CRUD::setEntityNameStrings('slayder', 'slayderlər');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title')->label('Başlıq')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::column('url')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::column('description')->label('Mətn');

        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Şəkil',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'prefix' => 'storage/',
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);

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
        CRUD::setValidation(SlidersRequest::class);

        CRUD::field('title')->label('Başlıq')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('url')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('description')->label('Mətn');

        CRUD::addField([
            'name' => 'image',
            'label' => 'Şəkil',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
            'hint' => '1280x720'
        ]);

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
