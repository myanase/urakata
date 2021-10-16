<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassXController extends Controller
{
    public $foo;

    public function __construct()
    {
        \Log::info('ClassX instantiated');
    }
}