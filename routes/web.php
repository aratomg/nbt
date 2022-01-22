<?php

use App\Http\Controllers\CamionController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ConsoGasoilController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FactureListeController;
use App\Http\Controllers\GasoilController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecouvrementController;
use App\Http\Controllers\VoyageController;
use App\Http\Middleware\AppAuth;
use App\Models\Chauffeur;
use App\Models\Voyage;
use Illuminate\Support\Facades\Route;

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




// Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::prefix('/')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('page.login');
    Route::post('/check', [LoginController::class, 'check'])->name('page.login.check');
});

Route::middleware(['auth'])->group(function(){
    Route::middleware(['appAuth:admin'])->group(function(){
        Route::prefix('/index')->group(function(){
            Route::get('/', [IndexController::class ,'index'])->name('page.index');
        });
        Route::prefix('/chauffeur')->group(function(){
            Route::get('/', [ChauffeurController::class, 'index'])->name('page.chauffeur');
            Route::get('/liste', [ChauffeurController::class, 'list_chauffeur'])->name('list_chauffeur');
            Route::post('/add', [ChauffeurController::class, 'add_chauffeur'])->name('add_chauffeur');
            Route::post('/get', [ChauffeurController::class, 'get'])->name('get_chauffeur');
            Route::post('/update', [ChauffeurController::class, 'update'])->name('update_chauffeur');
            Route::post('/delete', [ChauffeurController::class, 'delete'])->name('delete_chauffeur');
        });
        Route::prefix('/camion')->group(function(){
            Route::get('/', [CamionController::class, 'index'])->name('page.camion');
            Route::get('/liste', [CamionController::class, 'list_camion'])->name('list_camion');
            Route::post('/add', [CamionController::class, 'add'])->name('add_camion');
            Route::post('/get', [CamionController::class, 'get'])->name('get_camion');
            Route::post('/update', [CamionController::class, 'update'])->name('update_camion');
            Route::post('/delete', [CamionController::class, 'delete'])->name('delete_camion');
        });
        Route::prefix('/gasoil')->group(function(){
            Route::get('/', [GasoilController::class, 'index'])->name('page.gasoil');
            Route::post('/add', [GasoilController::class, 'add'])->name('add_carte');
            Route::post('/get', [GasoilController::class, 'get'])->name('get_carte');
            Route::get('/liste', [GasoilController::class, 'list'])->name('liste_carte');
            Route::post('/update', [GasoilController::class, 'update'])->name('update_carte');
            Route::post('/delete', [GasoilController::class, 'delete'])->name('delete_carte');
        });
        Route::prefix('/voyage')->group(function(){
            Route::get('/', [VoyageController::class, 'index'])->name('page.voyage');
            Route::post('/add', [VoyageController::class, 'add'])->name('add_voyage');
            Route::get('/list', [VoyageController::class, 'list'])->name('list_voyage');
            Route::post('/get', [VoyageController::class, 'get'])->name('get_voyage');
            Route::post('/update', [VoyageController::class, 'update'])->name('update_voyage');
            Route::post('/delete', [VoyageController::class, 'delete'])->name('delete_voyage');
        });
        Route::prefix('/depense')->group(function(){
            Route::post('/add', [DepenseController::class,  'add'])->name('add_depense');
            Route::post('/update',[DepenseController::class, 'update'])->name('update_depense');
            Route::post('/delete', [DepenseController::class, 'delete'])->name('delete_depense');
        });
        Route::prefix('/consomation')->group(function(){
            Route::any('/', [ConsoGasoilController::class, 'index'])->name('page.conso');
            Route::post('/post', [ConsoGasoilController::class, 'Carte'])->name('conso');
        });
        Route::prefix('/detail')->group(function(){
            Route::post('/add', [DetailController::class, 'add'])->name('add_detail');
            Route::post('/update', [DetailController::class, 'update'])->name('update_detail');
            Route::post('/delete', [DetailController::class, 'delete'])->name('delete_detail');
        });
        Route::prefix('/facture')->group(function(){
            Route::get('/', [FactureController::class, 'index'])->name('page.facture');
            Route::get('/voyage_liste', [FactureController::class, 'list'])->name('voyage_liste');
            Route::post('/add', [FactureController::class, 'add'])->name('add_facture');
            Route::get('/liste', [FactureController::class, 'liste'])->name('page.liste_facture');
            Route::get('/listefacture', [FactureController::class, 'liste_facture'])->name('liste_facture');
            Route::post('/get', [FactureController::class, 'get_facture'])->name('get_facture');
            Route::post('/update', [FactureController::class, 'update'])->name('update_facture');
            Route::post('/delete', [FactureController::class, 'delete'])->name('delete_facture');
        });
        Route::prefix('/revouvrement')->group(function(){
            Route::get('/', [RecouvrementController::class, 'index'])->name('page.recouvrement');
            Route::post('/add', [RecouvrementController::class, 'add'])->name('add_recouvrement');
            Route::get('/liste', [RecouvrementController::class, 'list'])->name('liste_recouvrement');
            Route::get('/liste_recouvrement', [RecouvrementController::class, 'index_list'])->name('page_liste_recou');
            Route::get('/array', [RecouvrementController::class, 'liste_rec'])->name('liste_recou');
        });
    });
});