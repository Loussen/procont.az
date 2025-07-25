<?php

namespace App\Http\Controllers\Admin;;

use App\Models\Page;
use App\PageTemplates;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use App\Http\Requests\PageRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

// VALIDATION: change the requests to match your own file names if you need form validation

class PageCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation { create as traitCreate; }
    use UpdateOperation { edit as traitEdit; }
    use DeleteOperation;
    use PageTemplates;

    public function setup(): void
    {
        App::setLocale('az');
        $this->crud->setModel(Page::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/page');
        $this->crud->setEntityNameStrings('səhifə', 'səhifələr');

        if (!backpack_user()->can('sehifeler siyahi')) {
            CRUD::denyAccess(['list', 'show']);
        }

        if (!backpack_user()->can('sehifeler elave etmek')) {
            CRUD::denyAccess(['create']);
        }

        if (!backpack_user()->can('sehifeler duzelish etmek')) {
            CRUD::denyAccess(['update']);
        }

        if (!backpack_user()->can('sehifeler silmek')) {
            CRUD::denyAccess(['delete']);
        }
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Ad',
        ]);
        $this->crud->addColumn([
            'name' => 'template',
            'label' => 'Şablon',
            'type' => 'model_function',
            'function_name' => 'getTemplateName',
        ]);
        $this->crud->addColumn([
            'name' => 'slug',
            'label' => trans('backpack::pagemanager.slug'),
        ]);
        $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
    }

    // -----------------------------------------------
    // Overwrites of CrudController
    // -----------------------------------------------

    protected function setupCreateOperation()
    {
        // Note:
        // - default fields, that all templates are using, are set using $this->addDefaultPageFields();
        // - template-specific fields are set per-template, in the PageTemplates trait;

        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));

        $this->crud->setValidation(PageRequest::class);
    }

    protected function setupUpdateOperation()
    {
        // if the template in the GET parameter is missing, figure it out from the db
        $template = \Request::input('template') ?? $this->crud->getCurrentEntry()->template;

        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        $this->crud->setValidation(PageRequest::class);
    }

    // -----------------------------------------------
    // Methods that are particular to the PageManager.
    // -----------------------------------------------

    /**
     * Populate the create/update forms with basic fields, that all pages need.
     *
     * @param  string  $template  The name of the template that should be used in the current form.
     */
    public function addDefaultPageFields($template = false)
    {
        $this->crud->addField([
            'name' => 'template',
            'label' => 'Şablon',
            'type' => 'select_page_template',
            'view_namespace' => file_exists(resource_path('views/vendor/backpack/crud/fields/select_page_template.blade.php')) ? null : 'pagemanager::fields',
            'options' => $this->getTemplatesArray(),
            'value' => $template,
            'allows_null' => false,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Ad',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'title',
            'label' => 'Başlıq',
            'type' => 'text',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Səhifə slug (URL)',
            'type' => 'text',
            'hint' => trans('backpack::pagemanager.page_slug_hint'),
            // 'disabled' => 'disabled'
        ]);
    }

    /**
     * Add the fields defined for a specific template.
     *
     * @param  string  $template_name  The name of the template that should be used in the current form.
     */
    public function useTemplate($template_name = false)
    {
        $templates = $this->getTemplates();

        // set the default template
        if ($template_name == false) {
            $template_name = $templates[0]->name;
        }

        // actually use the template
        if ($template_name) {
            $this->{$template_name}();
        }
    }

    /**
     * Get all defined templates.
     */
    public function getTemplates($template_name = false)
    {
        $templates_array = [];

        $templates_trait = new \ReflectionClass('App\PageTemplates');
        $templates = $templates_trait->getMethods(\ReflectionMethod::IS_PRIVATE);

        if (! count($templates)) {
            abort(503, trans('backpack::pagemanager.template_not_found'));
        }

        return $templates;
    }

    /**
     * Get all defined template as an array.
     *
     * Used to populate the template dropdown in the create/update forms.
     */
    public function getTemplatesArray()
    {
        $templates = $this->getTemplates();

        foreach ($templates as $template) {
            $templates_array[$template->name] = str_replace('_', ' ', Str::title($template->name));
        }

        return $templates_array;
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
