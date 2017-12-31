<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['uses'=>'InicioController@index']);


Route::group(['middleware'=>['web']],function(){
    Route::group(['prefix'=>'inicio'],function(){
        Route::get('/',['uses'=>'InicioController@index']);
    });

    Route::group(['prefix'=>'produto'],function(){
        Route::get('/',['uses'=>'ProdutoController@index']);
        Route::post('/',['uses'=>'ProdutoController@index']);
        Route::get('/detail',['uses'=>'ProdutoController@detail']);
        Route::get('/delete',['uses'=>'ProdutoController@delete']);
        Route::get('listar',['uses'=>'ProdutoController@listar'])->middleware('auth.basic');
        Route::post('/add',['uses'=>'ProdutoController@add']);
        Route::post('/edit',['uses'=>'ProdutoController@edit']);


    });

    Route::group(['prefix'=>'categoria'],function(){
        Route::get('/',['uses'=>'CategoriaController@index']);
        Route::post('/',['uses'=>'CategoriaController@index']);
        Route::get('/detail',['uses'=>'CategoriaController@detail']);
        Route::post('/add',['uses'=>'CategoriaController@add']);
        Route::post('/edit',['uses'=>'CategoriaController@edit']);
        Route::get('/delete',['uses'=>'CategoriaController@delete']);

    });
    
});



Route::auth();

Route::get('/home', 'HomeController@index');
