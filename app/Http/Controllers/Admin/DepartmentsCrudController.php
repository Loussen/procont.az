<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartmentsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DepartmentsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DepartmentsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Departments::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/departments');
        CRUD::setEntityNameStrings('departments', 'departments');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::addColumn([
            'name'        => 'hospital',
            'type'        => 'select2',
            'allows_null' => true,
            'attribute'   => 'name',
            'wrapper'     => ['class' => 'form-group col-md-6']
        ]);
        CRUD::addColumn([
            'name' => 'image',
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
        CRUD::setValidation(DepartmentsRequest::class);
        CRUD::field('name');
        CRUD::addField([
            'name' => 'image',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
            'hint' => '300x260'
        ]);
        CRUD::addField([
            'name'        => 'hospital',
            'type'        => 'select2',
            'allows_null' => true,
            'attribute'   => 'name',
            'wrapper'     => ['class' => 'form-group col-md-6']
        ]);
        CRUD::field('description')->type('tinymce');

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
