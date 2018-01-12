<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function (){
    return redirect('introduction');
})->name('home');

// gen role
Route::group(['prefix' => 'Role', 'middleware' => 'auth'], function () {
    Route::get('create', 'RoleController@create');
    Route::get('index', 'RoleController@index');

    Route::post('store', 'RoleController@store');
    Route::post('update', 'RoleController@update');
});

// gen the relationship between role and user
Route::group(['prefix' => 'RoleUser', 'middleware' => 'auth'], function () {
    Route::get('index', 'RoleUserController@index');
    Route::get('edit', 'RoleUserController@edit');

    Route::post('update', 'RoleUserController@update');
});

//gen the permission
Route::group(['prefix' => 'Permission', 'middleware' => 'auth'], function () {
    Route::get('index', 'PermissionController@index');
    Route::get('create', 'PermissionController@create');
    Route::get('destroy/{permission}', 'PermissionController@destroy');
    Route::get('edit/{permissions}', 'PermissionController@edit');

    Route::post('update', 'PermissionController@update');
    Route::post('store', 'PermissionController@store');
});

// gen the relationship between permission and role
Route::group(['prefix' => 'PermissionUser', 'middleware' => 'auth'], function(){
    Route::get('index', 'PermissionUserController@index');
    Route::get('create', 'PermissionUserController@create');
});

// gen the relation  between permission and role
Route::group(['prefix' => 'PermissionRole', 'middleware' => 'auth'], function(){
    Route::get('index', 'PermissionRoleController@index');
    Route::get('create', 'PermissionRoleController@create');
    Route::get('edit/{id}', 'PermissionRoleController@edit');

    Route::post('store', 'PermissionRoleController@store');
    Route::post('update', 'PermissionRoleController@update');
});



// gen introduction node
Route::middleware('auth')->get('/introduction', function () {
    return view('Introduction.index');
});

// gen photo resource
Route::group(['prefix' => 'TravelRecord', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'TravelRecordController@show');
    Route::get('create', 'TravelRecordController@create');
    Route::middleware('permission:TravelRecord/index')->get('index', 'TravelRecordController@index');
    Route::middleware('permission:TravelRecord/zhengzhouShow')->get('zhengzhouShow', 'TravelRecordController@typeShow')->name('zhengzhou');
    Route::middleware('permission:TravelRecord/shanghaiShow')->get('shanghaiShow', 'TravelRecordController@typeShow')->name('shanghai');
    Route::middleware('permission:TravelRecord/luoyangShow')->get('luoyangShow', 'TravelRecordController@typeShow')->name('luoyang');
    Route::middleware('permission:TravelRecord/beijingShow')->get('beijingShow', 'TravelRecordController@typeShow')->name('beijing');
    Route::middleware('permission:TravelRecord/hubeiShow')->get('hubeiShow', 'TravelRecordController@typeShow')->name('hubei');
    Route::middleware('permission:TravelRecord/otherShow')->get('otherShow', 'TravelRecordController@typeShow')->name('other');
    Route::get('anywayShow', 'TravelRecordController@typeShow')->name('anyway');

    Route::post('store', 'TravelRecordController@store');
});

// gen photo type
Route::group(['prefix' => 'PhotoType', 'middleware' => ['auth']], function () {
    Route::middleware('permission:PhotoType/index')->get('index', 'PhotoTypeController@index');
    Route::middleware('permission:PhotoType/create')->get('create', 'PhotoTypeController@create');
    Route::get('edit/{photoType}', 'PhotoTypeController@edit');
    Route::get('destroy/{photoType}', 'PhotoTypeController@destroy');

    Route::post('update', 'PhotoTypeController@update')->name('update');
    Route::post('store', 'PhotoTypeController@store')->name('store');
});

// gen node
Route::group(['prefix' => 'SystemNode', 'middleware' => ['auth']], function () {
    Route::get('create', 'SystemNodeController@create');
    Route::get('index', 'SystemNodeController@index');
    Route::get('edit/{systemNode}', 'SystemNodeController@edit');
    Route::get('show/{systemNode}', 'SystemNodeController@show');
    Route::get('destroy/{systemNode}', 'SystemNodeController@destroy');

    Route::post('store', 'SystemNodeController@store');
    Route::post('update', 'SystemNodeController@update');
});

// gen protagonist
Route::group(['prefix' => 'Protagonist', 'middleware' => ['auth']], function () {
    Route::get('create', 'ProtagonistController@create');
    Route::get('index', 'ProtagonistController@index');
    Route::get('edit/{protagonist}', 'ProtagonistController@edit');
    Route::get('destroy/{protagonist}', 'ProtagonistController@destroy');
    Route::post('store', 'ProtagonistController@store');
    Route::post('update', 'ProtagonistController@update');
});