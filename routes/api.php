<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MsgsController;



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

//Métodos Cliente
/**
 * http://localhost:8000/api/inserirCliente?nomeCliente=teste5&cpfCliente=testeCpf5&emailCliente=teste@email.com&senhaCliente=12345&statusCliente=1
 * http://localhost:8000/api/updateCliente/4?nomeCliente=teste4&cpfCliente=testeCpf4&emailCliente=teste@email.com&senhaCliente=12345&statusCliente=1
 * http://localhost:8000/api/getAllClientes
 * http://localhost:8000/api/getCliente/x
 * http://localhost:8000/api/deleteCliente/x
 */
Route::post('/inserirCliente', [ClienteController::class, 'addCliente']);
Route::put('/updateCliente/{id}', [ClienteController::class, 'updateCliente']);
Route::get('/getAllClientes', [ClienteController::class, 'getAllClientes']);
Route::get('/getCliente/{id}', [ClienteController::class, 'getCliente']);
Route::put('/deleteCliente/{id}', [ClienteController::class, 'deleteCliente']);
Route::get('/loginCliente/{email}/{senha}', [ClienteController::class, 'loginCliente']);

//Métodos Vendedor
/**
 * http://localhost:8000/api/getVendedor/x
 */
Route::get('/getVendedor/{id}', [VendedorController::class, 'getVendedor']);
Route::get('/getAllVendedores', [VendedorController::class, 'getAllVendedores']);

//Métodos Produtos
/**
 * http://localhost:8000/api/getProduto/x
 * http://localhost:8000/api/getAllProdutos/x 
 */
Route::get('/getProduto/{idProduto}', [ProdutoController::class, 'getProduto']);
Route::get('/getAllProdutos/{idVendedor}', [ProdutoController::class, 'getAllProdutos']);
Route::get('/getEveryProduct', [ProdutoController::class, 'getEveryProduct']);

//Métodos Cupom
/**
 * https://localhost:8000/api/getAllCupons
 */
Route::get('/getAllCupons', [CupomController::class, 'getAllCupons']);
Route::get('/getClienteCupoms/{id}', [CupomController::class, 'getCuponsCliente']);

//Métodos Enderecos
/**
 * http://localhost:8000/api/inserirCliente?apelidoEndereco=teste1&endereco=rua x&complemento=casa &numero=12&statusEndereco=1&idCliente=1
 * http://localhost:8000/api/updateEndereco/1?apelidoEndereco=testeEndereco&endereco=rua y&complemento=apto&numero=14&statusEndereco=1&idCliente=1
 * http://localhost:8000/api/getAllEnderecos
 * http://localhost:8000/api/getEndereco/x
 * http://localhost:8000/api/deleteEndereco/x
 */
Route::post('/inserirEndereco', [EnderecoController::class, 'addEndereco']);
Route::put('/updateEndereco/{id}', [EnderecoController::class, 'updateEndereco']);
Route::get('/getAllEnderecos/{id}', [EnderecoController::class, 'getAllEnderecos']);
Route::get('/getEndereco/{id}', [EnderecoController::class, 'getEndereco']);
Route::put('/deleteEndereco/{id}', [EnderecoController::class, 'deleteEndereco']);

//Métodos Feedback
/**
 * http://localhost:8000/api/inserirFeedback?nome=Kurt&feedback=teste de feedback
 */
Route::post('/inserirFeedback', [FeedbackController::class, 'addFeedback']);

//Métodos Item
/**
 * http://localhost:8000/api/inserirItem?qntdItem=5&idProduto=1&idPedido=1
 * http://localhost:8000/api/getItem/x
 * http://localhost:8000/api/getAllItems/x
 * http://localhost:8000/api/deleteItem/x
 */
Route::post('/inserirItem', [ItemController::class, 'addItem']);
Route::get('/getItem/{idItem}', [ItemController::class, 'getItem']);
Route::get('/getAllItems/{idPedido}', [ItemController::class, 'getAllItems']);
Route::delete('/deleteItem/{idItem}', [ItemController::class, 'deleteItem']);

//Métodos Pedido
/**
 * http://localhost:8000/api/inserirPedido?data=20/06/2022&frete=10&idCliente=1&idVendedor=1
 * http://localhost:8000/api/getPedido/id
 * http://localhost:8000/api/getAllPedidos
 */
Route::post('/inserirPedido', [PedidoController::class, 'inserirPedido']);
Route::get('/getPedido/{id}', [PedidoController::class, 'getPedido']);
Route::get('/getAllPedidos', [PedidoController::class, 'getAllPedidos']);

//Métodos Conversa
/**
 * 
 */
Route::get('/getChats/{id}', [MsgsController::class, 'getChats']);
Route::get('/getAllMessages/{id}', [MsgsController::class, 'getAllMessages']);
Route::post('/sendMessage', [MsgsController::class, 'sendMessage']);

//-----------------------------------------------------------------------------------------------//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
