<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\App;

/**
 * Class BlogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BlogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        App::setLocale('az');
        CRUD::setModel(\App\Models\Blog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/blog');
        CRUD::setEntityNameStrings('xəbər', 'xəbərlər');

        if (!backpack_user()->can('xeberler siyahi')) {
            CRUD::denyAccess(['list', 'show']);
        }

        if (!backpack_user()->can('xeberler elave etmek')) {
            CRUD::denyAccess(['create']);
        }

        if (!backpack_user()->can('xeberler duzelish etmek')) {
            CRUD::denyAccess(['update']);
        }

        if (!backpack_user()->can('xeberler silmek')) {
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
        $this->crud->orderBy('lft');
        $this->crud->orderBy('id');

        CRUD::column('title')->label('Başlıq');
        CRUD::column('short_description')->label('Qısa mətn');
        CRUD::addColumn([
            'name' => 'slug',
        ]);
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Şəkil',
            'type' => 'image',
            'upload' => true,
            'prefix' => 'storage/',
            'crop' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addColumn([
            'name'        => 'category_id',
            'label' => 'Kateqoriya',
            'type'        => 'select2',
            'model'       => \App\Models\Category::class,
            'attribute'   => 'name',
            'options'     => function ($query) {
                return $query->where('type', 'blog')->get();
            },
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
        CRUD::setValidation(BlogRequest::class);
        CRUD::field('title')->label('Başlıq')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('short_description')->label('Qısa mətn')->type('textarea')->wrapper(['class' => 'form-group col-md-5']);
        CRUD::addField([
            'name' => 'slug',
            'type' => 'text',
            'hint' => trans('backpack::pagemanager.page_slug_hint'),
            'wrapper' => ['class' => 'form-group col-md-3'],
        ]);
        CRUD::field('description')->label('Mətn')->type('tinymce');
        CRUD::addField([
            'name' => 'image',
            'label' => 'Şəkil',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
            'hint' => '525x350'
        ]);
        CRUD::addField([
            'name'        => 'category_id',
            'type'        => 'select2',
            'label' => 'Kateqoriyalar',
            'model'       => \App\Models\Category::class,
            'attribute'   => 'name',
            'options'     => function ($query) {
                return $query->where('type', 'blog')->get();
            },
            'allows_null' => true,
            'wrapper'     => ['class' => 'form-group col-md-6']
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

    protected function setupReorderOperation()
    {
        $this->crud->set('reorder.label', 'title');
        $this->crud->set('reorder.max_level', 1);
    }
}
