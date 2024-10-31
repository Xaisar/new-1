<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/admin', )->name('admin.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
// Route::group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');

    Route::prefix('biodata')->group(function() {
        Route::get('/', 'BiodataController@index')->name('biodata.index');

        // Disabilities
        Route::get('/disabilities', 'DisabilitiesController@index')->name('disabilities.index');
        Route::get('/disabilities/create', 'DisabilitiesController@create')->name('disabilities.create');
        Route::post('/disabilities/store', 'DisabilitiesController@store')->name('disabilities.store');
        Route::get('/disabilities/edit/{id}', 'DisabilitiesController@edit')->name('disabilities.edit');
        Route::post('/disabilities/update/{id}', 'DisabilitiesController@update')->name('disabilities.update');
        Route::get('/disabilities/destroy/{id}', 'DisabilitiesController@destroy')->name('disabilities.destroy');


        // Ethnics
        Route::get('/ethnics', 'EthnicsController@index')->name('ethnics.index');
        Route::get('/ethnics/create', 'EthnicsController@create')->name('ethnics.create');
        Route::post('/ethnics/store', 'EthnicsController@store')->name('ethnics.store');
        Route::get('/ethnics/edit/{id}', 'EthnicsController@edit')->name('ethnics.edit');
        Route::post('/ethnics/update/{id}', 'EthnicsController@update')->name('ethnics.update');
        Route::get('/ethnics/destroy/{id}', 'EthnicsController@destroy')->name('ethnics.destroy');
        
        // Incomes
        Route::get('/incomes', 'IncomesController@index')->name('incomes.index');
        Route::get('/incomes/create', 'IncomesController@create')->name('incomes.create');
        Route::post('/incomes/store', 'IncomesController@store')->name('incomes.store');
        Route::get('/incomes/edit/{id}', 'IncomesController@edit')->name('incomes.edit');
        Route::post('/incomes/update/{id}', 'IncomesController@update')->name('incomes.update');
        Route::get('/incomes/destroy/{id}', 'IncomesController@destroy')->name('incomes.destroy');

        // Professions
        Route::get('/professions', 'ProfessionsController@index')->name('professions.index');
        Route::get('/professions/create', 'ProfessionsController@create')->name('professions.create');
        Route::post('/professions/store', 'ProfessionsController@store')->name('professions.store');
        Route::get('/professions/edit/{id}', 'ProfessionsController@edit')->name('professions.edit');
        Route::post('/professions/update/{id}', 'ProfessionsController@update')->name('professions.update');
        Route::get('/professions/destroy/{id}', 'ProfessionsController@destroy')->name('professions.destroy');

        // Religions
        Route::get('/religions', 'ReligionsController@index')->name('religions.index');
        Route::get('/religions/create', 'ReligionsController@create')->name('religions.create');
        Route::post('/religions/store', 'ReligionsController@store')->name('religions.store');
        Route::get('/religions/edit/{id}', 'ReligionsController@edit')->name('religions.edit');
        Route::post('/religions/update/{id}', 'ReligionsController@update')->name('religions.update');
        Route::get('/religions/destroy/{id}', 'ReligionsController@destroy')->name('religions.destroy');
    });
// });

