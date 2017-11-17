<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('sujetos', 'SujetoAPIController');

Route::resource('clientes', 'ClienteAPIController');

Route::resource('empleados', 'EmpleadoAPIController');

Route::resource('mesas', 'MesaAPIController');

Route::resource('pisos', 'PisoAPIController');

Route::resource('seccions', 'SeccionAPIController');

Route::resource('tipo_empleados', 'TipoEmpleadoAPIController');

Route::resource('productos', 'ProductoAPIController');

Route::resource('presentacions', 'PresentacionAPIController');

Route::resource('presentacion_productos', 'PresentacionProductoAPIController');

Route::resource('doc_identidads', 'DocIdentidadAPIController');

Route::resource('workstations', 'WorkstationAPIController');

Route::resource('caja_detalles', 'CajaDetalleAPIController');

Route::resource('comprobantes', 'ComprobanteAPIController');

Route::resource('comprobante_detalles', 'ComprobanteDetalleAPIController');

Route::resource('estado_mesas', 'EstadoMesaAPIController');

Route::resource('estado_pedidos', 'EstadoPedidoAPIController');

Route::resource('forma_pagos', 'FormaPagoAPIController');

Route::resource('forma_pago_detalles', 'FormaPagoDetalleAPIController');

Route::resource('monedas', 'MonedaAPIController');

Route::resource('parametros', 'ParametroAPIController');

Route::resource('pedidos', 'PedidoAPIController');

Route::resource('pedidos', 'PedidoAPIController');

Route::resource('tipo_comprobantes', 'TipoComprobanteAPIController');