<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClassBController;

class ClassAController extends Controller
{
    private $ClassBController;

    //依存解決学習用
    //インスタンス作成
    public function __construct(
        ClassBController $ClassBController
    ){
        \Log::info('ClassAインスタンス化完了');
    }
}
