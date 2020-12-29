<?php
//Filtrar productos en el catalogo.
Route::get('busqueda/{id}','HomeController@busqueda')->name('busqueda');
Route::get('/','MainController');
//Route::get('busquedaPro/{id}','CatalogoController@busqueda')->name('busquedaPro');

//Navegabilidad el sitio
Route::get('/home', 'MainController')->name('home');
Route::get('/catalogo', 'MainController@catalogo')->name('catalogo');
Route::get('/servicios', 'MainController@servicios')->name('servicios');
Route::get('/acerca', 'MainController@acerca')->name('acerca');
Route::get('/terminos', 'MainController@terminos')->name('terminos');
Route::get('/admine', 'MainController@admine')->name('admine');

//Registros de productos, y citas
Route::resource('peliculas','PeliculasController');
Route::resource('mascotas', 'MascotasController');
Route::resource('productos', 'ProductosController');
Route::get('contactanos', 'MainController@contactanos')->name('contactanos');
Route::resource('mensajes','MensajesController');
Route::get('mensajes','MainController@mensaje')->name('mensajes');
Auth::routes(); //(['register'=>false]) Es para desabilitar la opcion de registro

//Route::get('/home', 'HomeController@index')->name('home');

//Pedidos para el carrito de compras
Route::get('pedidos','PedidosController@index')->name('pedidos.index');
Route::post('pedidos', 'PedidosController@addProducto')->name('pedidos.add');
Route::post('pedidos/sumar','PedidosController@sumaProducto')->name('pedidos.sumar');
Route::get('pedidos/{id}','PedidosController@quitaProducto')->name('pedidos.quita');
Route::post('pedidos/store','PedidosController@store')->name('pedidos.store');
Route::get('pedidosAdmin','PedidosController@index')->name('pedidos.pedidosAdmin');
Route::get('pedidos/finaliza/{id}','PedidosController@finalizar')->name('pedidos.finalizar');
Route::get('pedidos/show/{id}','pedidosController@show')->name('pedidos.show');