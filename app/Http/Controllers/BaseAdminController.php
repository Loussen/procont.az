<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\App;

class BaseAdminController extends CrudController
{
    public function __construct()
    {
        App::setLocale('az');
    }
}