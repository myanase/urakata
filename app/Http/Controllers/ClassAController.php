<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassAController extends Controller
{

    //依存解決学習用
    //インスタンス作成
    public function __construct(
        ClassBController $ClassBController
    ){
        \Log::info('ClassAインスタンス化完了');
    }
}
