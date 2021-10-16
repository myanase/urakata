<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassBController extends Controller
{
    //依存解決学習用
    public function __construct()
    {
        \Log::info('ClassBインスタンス化完了');
    }
}
