<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

/*
 *プロジェクト
 */
//プロジェクト一覧画面
Route::middleware(['auth:sanctum', 'verified'])->get('/project-list', 'ProjectController@index')->name('project-list');

//プロジェクト登録画面
Route::middleware(['auth:sanctum', 'verified'])->get('/create-project', function () {
    return view('project/create-project');
})->name('create-project');
Route::post('/create-project', 'ProjectController@store')->name('store-project');

//プロジェクト編集画面
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-project/{project_no}', 'ProjectController@edit');
Route::post('/update-project/{project_no}', 'ProjectController@update');

//プロジェクト削除画面
Route::middleware(['auth:sanctum', 'verified'])->get('/delate-project/{project_no}', 'ProjectController@delate');

/*
 * 登場人物
 */
//登場人物一覧画面
Route::middleware(['auth:sanctum', 'verified'])->get('/character-list/{project_no}', 'CharacterController@index');

//登場人物登録・編集画面（削除含む）
Route::middleware(['auth:sanctum', 'verified'])->get('/charcter-edit/{project_no}', 'CharacterController@edit');
Route::post('/update-character/{project_no}', 'CharacterController@update');

/*
 * 相関図
 */
//相関図画面
Route::middleware(['auth:sanctum', 'verified'])->get('/relation', function () {
    return view('project/relation');
})->name('relation');

//出来事・年齢早見表
Route::middleware(['auth:sanctum', 'verified'])->get('/event-list', function () {
    return view('project/event-list');
})->name('event-list');
