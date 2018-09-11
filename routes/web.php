<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {  return view('admin/starter');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//修改密码
Route::get('/changePwd/{id}','UserController@showPwd')->name('changePwd');
Route::post('/changePwd','UserController@changePwd');

Route::get('/gradeImport','UserController@show');
Route::post('/gradeImport','UserController@gradeImport');
//数据查询
Route::get('/query/nopass','UserController@showNopass')->name('nopass');
Route::get('/query/queryCredit','UserController@showCredit')->name('queryCredit');
Route::get('/query/queryEach','UserController@showEach')->name('queryEach');
Route::post('/query/nopass','UserController@selectNopass');
Route::post('/query/queryCredit','UserController@selectCredit');
Route::post('/query/queryEach','UserController@selectEach');
//统计
Route::get('/stat/nopass','StatController@showNopass')->name('nopassCount');
Route::get('/stat/lessonCredit','StatController@showCredit')->name('lessonCredit');
Route::post('/stat/nopass','StatController@selectNopass');
Route::post('/stat/lessonCredit','StatController@selectCredit');
//数据管理
Route::get('/manage/student','ManageController@showStudent')->name('studentManage');
Route::get('/manage/lesson','ManageController@showLesson')->name('lessonManage');
Route::get('manage/student/{id}','ManageController@showUpdateS');
Route::get('manage/addS','ManageController@showAddS');
Route::post('/manage/addS','ManageController@addS');
Route::get('/manage/updateS/{id}','ManageController@showUpdateS');
Route::post('/manage/updateS','ManageController@UpdateS');
Route::get('/manage/deleteS/{id}','ManageController@deleteS');

Route::get('manage/lesson/{id}','ManageController@showUpdateL');
Route::get('manage/addL','ManageController@showAddL');
Route::post('/manage/addL','ManageController@addL');
Route::get('/manage/updateL/{id}','ManageController@showUpdateL');
Route::post('/manage/updateL','ManageController@UpdateL');
Route::get('/manage/deleteL/{id}','ManageController@deleteL');
//Excel导入
Route::get('excel/export','ExcelController@export');
Route::get('excel/import','ExcelController@import');

