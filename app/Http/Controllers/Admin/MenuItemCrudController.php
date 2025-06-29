<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuItem;
use App\Models\Page;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\App;

class MenuItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    public function setup()
    {
        App::setLocale('az');
        $this->crud->setModel(MenuItem::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/menu-item');
        $this->crud->setEntityNameStrings('menyu', 'menyular');

        if (!backpack_user()->can('menyular siyahi')) {
            CRUD::denyAccess(['list', 'show']);
        }

        if (!backpack_user()->can('menyular elave etmek')) {
            CRUD::denyAccess(['create']);
        }

        if (!backpack_user()->can('menyular duzelish etmek')) {
            CRUD::denyAccess(['update']);
        }

        if (!backpack_user()->can('menyular silmek')) {
            CRUD::denyAccess(['delete']);
        }

        $this->crud->enableReorder('name', 3);

        $this->crud->orderBy('lft');
        $this->crud->orderBy('id');

        $this->crud->operation('list', function () {
            $this->crud->addColumn([
                'name' => 'name',
                'label' => 'Ad'
            ]);
            $this->crud->addColumn([
                'label' => 'Ana menyu',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "app\Models\MenuItem",
            ]);
        });

        $this->crud->operation(['create', 'update'], function () {
            $this->crud->addField([
                'name' => 'name',
                'label' => 'Ad',
            ]);
            $this->crud->addField([
                'label' => 'Ana menyu',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "app\Models\MenuItem",
            ]);
            $this->crud->addField([
                'name' => 'type,link,page_id',
                'label' => 'Type',
                'type' => 'page_or_link',
                'page_model' => Page::class,
                'view_namespace' => file_exists(resource_path('views/vendor/backpack/crud/fields/page_or_link.blade.php')) ? null : 'menucrud::fields',
            ]);
            $this->crud->addField([
                'name' => 'bg_image',
                'type' => 'image',
                'label' => 'Arxa fon şəkil',
                'upload' => true,
                'crop' => true,
                'wrapper' => ['class' => 'form-group col-md-12'],
                'hint' => '1920x1280'
            ]);
            $this->crud->addField([   // CustomHTML
                'name' => 'metas_separator',
                'type' => 'custom_html',
                'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            ]);
            $this->crud->addField([
                'name' => 'meta_title',
                'label' => trans('backpack::pagemanager.meta_title'),
                'fake' => true,
                'hint' => 'Max: 60 character',
                'store_in' => 'extras',
            ]);
            $this->crud->addField([
                'name' => 'meta_description',
                'label' => trans('backpack::pagemanager.meta_description'),
                'fake' => true,
                'hint' => '160 simvol olmalıdır',
                'store_in' => 'extras',
            ]);
            $this->crud->addField([
                'name' => 'meta_keywords',
                'type' => 'textarea',
                'hint' => '8 açar söz və vergüllə ayrılmalıdır',
                'label' => trans('backpack::pagemanager.meta_keywords'),
                'fake' => true,
                'store_in' => 'extras',
            ]);
        });
    }
}
