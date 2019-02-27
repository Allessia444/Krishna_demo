<?php

Route::get('/', function () {
return view('welcome');
})->name('welcome');

Route::get('/blogs', 'DashboardController@blog_list')->name('blogs');
Route::get('/blog_list/{id}', 'DashboardController@blog_view')->name('blog_view');

Route::get('/task_category', 'DashboardController@task_category')->name('task_category');

Route::get('/task/{id}', 'DashboardController@get_task')->name('get_task');

Route::get('/task_detail/{id}', 'DashboardController@get_task_detail')->name('get_task_detail');

Route::group(['middleware'=>['auth'],'prefix'=>'admin', 'namespace'=> 'Admin' ], function(){ 

Route::get('/color', 'DashboardController@color')->name('color');
Route::get('/background', 'DashboardController@background')->name('background');
Route::get('/', 'DashboardController@home')->name('home');

Route::resource('users','UsersController');
Route::get('users_profile','UsersController@profile')->name('profile');
Route::post('profile','UsersController@update_profile')->name('update.profile');
Route::post('photo_upload','UsersController@photo_upload')->name('photo.upload');

Route::post('blogs_import','UserBlogsController@import')->name('import');

Route::post('users_import','UsersController@import')->name('users.import');

Route::get('blogs_export','UserBlogsController@export')->name('export');

Route::get('users_export','UsersController@export')->name('users.export');

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

Route::resource('tasks.task_logs','TaskLogsController');

Route::resource('departments.team_leads','TeamLeadsController');

Route::resource('blogs','UserBlogsController');

Route::get('edit_blogs_render/{id}','UserBlogsController@edit_blogs_render')->name('edit_blogs_render');

Route::post('update_blogs_render/{id}','UserBlogsController@update_blogs_render')->name('update_blogs_render');


Route::resource('blog_categories','BlogCategoriesController');
Route::resource('tasks','TasksController');

Route::post('tasks_compalate','TasksController@complate')->name('complate');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
?>


