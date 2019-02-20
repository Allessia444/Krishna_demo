<?php

Route::get('/', function () {
return view('welcome');
});

Route::get('/blog_list', 'DashboardController@blog_list')->name('blog_list');
Route::get('/blog_list/{id}', 'DashboardController@blog_view')->name('blog_view');

Route::group(['middleware'=>['auth'],'prefix'=>'admin',], function(){ 

Route::get('/', function () {
return view('index');
})->name('home');

Route::resource('users','UsersController');
Route::get('users_profile','UsersController@profile')->name('profile');
Route::post('profile','UsersController@update_profile')->name('update.profile');

Route::post('userlogout','UsersController@logout')->name('userlogout');
Route::resource('projects','ProjectsController');
Route::resource('industries','IndustriesController');
Route::resource('departments','DepartmentsController');
Route::resource('designations','DesignationsController');
//Route::resource('clients','ClientsController');
Route::resource('/project_categories', 'ProjectCategoriesController');
Route::resource('/task_categories', 'TaskCategoriesController');
Route::resource('/clients', 'ClientsController');
Route::resource('users.experiences','UserExperiencesController');
Route::resource('blogs','UserBlogsController');
Route::resource('blog_categories','BlogCategoriesController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
?>