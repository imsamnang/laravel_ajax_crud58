<?php

Route::resource('articles','ArticleController');
Route::get('/',function(){
  return view('pages.index');
});

Route::get('/dashboard',function(){
  return view('admin.dashboard');
});

Route::get('/datarange', 'DateRangeController@index');
Route::get('/getInvoice','DateRangeController@getInvoice');
Route::post('/daterange/fetch_data', 'DateRangeController@fetch_data')->name('daterange.fetch_data');

Route::get('languages', 'LanguageTranslationController@index')->name('languages');
Route::post('translations/update', 'LanguageTranslationController@transUpdate')->name('translation.update.json');
Route::post('translations/updateKey', 'LanguageTranslationController@transUpdateKey')->name('translation.update.json.key');
Route::delete('translations/destroy/{key}', 'LanguageTranslationController@destroy')->name('translations.destroy');
Route::post('translations/create', 'LanguageTranslationController@store')->name('translations.create');
Route::get('check-translation', function(){
	\App::setLocale('fr');
	
	dd(__('website'));
});

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');

Route::get('/task', [
    'uses' => 'TasksController@index',
    'as' => 'tasks.index',
]);

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/{id}', [
        'uses' => 'TasksController@show',
        'as'   => 'tasks.show',
    ]);

    Route::post('/', [
        'uses' => 'TasksController@store',
        'as'   => 'tasks.store',
    ]);

    Route::put('/{id}', [
        'uses' => 'TasksController@update',
        'as'   => 'tasks.update',
    ]);

    Route::delete('/{id}', [
        'uses' => 'TasksController@destroy',
        'as'   => 'tasks.destroy',
    ]);
});

Route::prefix('students')->group(function(){
	Route::get('/','StudentController@index')->name('students.index');
	Route::get('/getDataTable','StudentController@get')->name('students.get');
	Route::post('/store','StudentController@store')->name('students.store');
    Route::get('/edit','StudentController@edit')->name('students.edit');
    Route::post('/update','StudentController@edit')->name('students.edit');
	Route::get('/destroy','StudentController@destroy')->name('students.destroy');
});

Route::group(['as'=>'posts.','prefix'=>'posts'],function(){
	Route::get('/','PostController@index')->name('index');
	Route::get('/getPost','PostController@getPost')->name('getPost');
	Route::post('/store','PostController@store')->name('store');
	Route::get('/edit','PostController@edit')->name('edit');
	Route::get('/destroy','PostController@destroy')->name('destroy');
});

Route::group(['as'=>'category.','prefix'=>'category'],function(){
	Route::get('/','CategoryController@index')->name('index');
	Route::get('/get','CategoryController@get')->name('get');
	Route::post('/store','CategoryController@store')->name('store');
	Route::get('/edit','CategoryController@edit')->name('edit');
	Route::post('/update','CategoryController@update')->name('update');
	Route::post('/destroy','CategoryController@destroy')->name('destroy');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('contact','ContactController');
Route::get('api/contact','ContactController@apiContact')->name('api.contact');

// multiple database connection
Route::get('/get-data/{connection}/{schema?}', 'UserController@getUsers');
Route::get('/get-keywords/{connection}', 'KeyWordsController@getKeyWords');