<?php

use App\descargoMedicoCont;
use App\Http\Controllers\conMedController;
use App\Http\Controllers\ConsClinicaController;
use App\Http\Controllers\HistoriaClinciaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\OrdenMedicaController;
use App\Http\Controllers\recetarioMController;
use App\Http\Controllers\ServrxController;
use App\User;
use Facade\FlareClient\View;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('dev1', function () {
    return view('recetario.receta_a');
});

Route::get('/', function () {
    return view('auth.SysLogin');
})->middleware('guest')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'homeController@index')->name('home');

Route::group(['prefix' => 'historiaClinica'], function () {
    Route::get('hcl', [HistoriaClinciaController::class, 'showHCL']);
    Route::get('showSigVi', [HistoriaClinciaController::class, 'showSigVi']);
    Route::get('colaPacienteMedAten', [HistoriaClinciaController::class, 'colaPacienteMedAten']);
    // Route::get('nroPacienteCola', 'HistoriaClinciaController@nroPacienteCola');
    Route::get('nroPacienteCola', [HistoriaClinciaController::class, 'nroPacienteCola']);
    Route::post('concluirAte', [HistoriaClinciaController::class, 'concluirAte']);
    Route::get('datoClinico_1', [HistoriaClinciaController::class, 'datoClinico_1']);
    Route::get('pdf_hcl_1/{paciente}', [HistoriaClinciaController::class, 'pdf_hcl_1']);
});
Route::group(['prefix' => 'cotizacion'], function () {
    Route::post('create', 'CotizacionController@create');
});
Route::group(['prefix' => 'Descargo'], function () {
    Route::get('make', 'descargoMedicoController@make');
    Route::apiResource('desMed', descargoMedicoController::class, ['only' => ['store']]);
    Route::apiResource('desMedCont', descargoMedicoContController::class);
});
Route::group(['prefix' => 'recetarioM'], function () {
    route::POST('create', [recetarioMController::class, 'create']);
    Route::get('list/{paciente}', [recetarioMController::class, 'list']);
    Route::get('pdf_recetamedica/{receta}', 'recetarioMController@pdfReceta');
});
Route::Group(['prefix' => 'signosVitales'], function () {
    route::post('store/{paciente}', 'SignosvitalesController@store');
    route::get('list1', 'SignosvitalesController@list1');
});
Route::Group(['prefix' => 'servRX'], function () {
    route::post('store/{paciente}', 'ServrxController@store')->name('312654');
    route::get('listPaciSerRX/', 'ServrxController@listPaciSerRX');
    route::get('showPlacaRX/', 'ServrxController@showPlacaRX');
    route::get('delete/{id}', 'ServrxController@delete');
    route::post('delete/{id}', [ServrxController::class, 'delete']);
});
Route::group(['prefix' => 'consultaMedica'], function () {
    route::post('create/{id}', [ConsClinicaController::class, 'store']);
    route::get('show/{id}', [ConsClinicaController::class, 'show']);
    route::get('showdatos/{id}', [ConsClinicaController::class, 'showdatos']);
});
Route::group(['prefix' => 'laboratorio'], function () {
    route::get('registerLab', [LaboratorioController::class, 'storeLab']);
    route::get('showHistLabPaci', [LaboratorioController::class, 'showHistLabPaci']);
    route::get('viewPdfLabPaciente/{data}', [LaboratorioController::class, 'showPdfPaciente']);
});
Route::group(['prefix'=>'ordenMedica'],function ()
{
    route::get('list_1',[OrdenMedicaController::class,'list_1']);
    route::post('store_1',[OrdenMedicaController::class,'store_1']);
    route::get('showPDF/{id}',[OrdenMedicaController::class,'showPDF']);
});
Route::group(['prefix'=>'user'],function ()
{
    route::get('editUsu',[homeController::class,'editUsu']);
    route::post('updateUsu',[homeController::class,'updateUsu']);
    route::post('updatePass',[homeController::class,'updatePass']);
});
