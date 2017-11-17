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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('sujetos', 'SujetoController');

Route::resource('clientes', 'ClienteController');

Route::resource('empleados', 'EmpleadoController');

Route::resource('mesas', 'MesaController');

Route::resource('pisos', 'PisoController');

Route::resource('seccions', 'SeccionController');

Route::resource('tipoEmpleados', 'TipoEmpleadoController');

Route::resource('productos', 'ProductoController');

Route::resource('presentacions', 'PresentacionController');

Route::resource('presentacionProductos', 'PresentacionProductoController');

Route::resource('docIdentidads', 'DocIdentidadController');

Route::resource('workstations', 'WorkstationController');

Route::resource('cajaDetalles', 'CajaDetalleController');

Route::resource('comprobantes', 'ComprobanteController');

Route::resource('comprobanteDetalles', 'ComprobanteDetalleController');

Route::resource('estadoMesas', 'EstadoMesaController');

Route::resource('estadoPedidos', 'EstadoPedidoController');

Route::resource('formaPagos', 'FormaPagoController');

Route::resource('formaPagoDetalles', 'FormaPagoDetalleController');

Route::resource('monedas', 'MonedaController');

Route::resource('parametros', 'ParametroController');

Route::resource('pedidos', 'PedidoController');

Route::resource('pedidos', 'PedidoController');

Route::resource('tipoComprobantes', 'TipoComprobanteController');