<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SafeTransactionController;
use App\Http\Controllers\SafeController;
use App\Http\Controllers\SafeAccountController;
use App\Http\Controllers\SafeTransactionTypeController;
use App\Http\Controllers\SafeTransactionCategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusTypeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CurrencyTypeController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\AttachmentController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/check_login', [AuthController::class, 'check_login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group([
    'prefix' => 'admin',
    'middleware' =>['web', 'auth']
], function () {
    Route::group([
        'prefix' => 'configurations',
        'controller' => ConfigurationController::class
    ], function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

    Route::group([
        'prefix' => 'users',
        'controller' => UserController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'roles',
        'controller' => RoleController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}/show', 'show');
        Route::put('/{id}/update', 'update');
        Route::put('/{id}/permissions/update', 'update_permissions');
        Route::delete('/{id}/delete', 'destroy');
        Route::get('/permission-categories', 'permissions_categories');
    });

    Route::group([
        'prefix' => 'customers',
        'controller' => CustomerController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'safe-transactions',
        'controller' => SafeTransactionController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}/show', 'show');
        Route::get('/safes-summary', 'safe_summary');
        Route::post('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'safes',
        'controller' => SafeController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'safe-accounts',
        'controller' => SafeAccountController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'safe-transaction-types',
        'controller' => SafeTransactionTypeController::class
    ], function () {
        Route::get('/search', 'search');
    });

    Route::group([
        'prefix' => 'safe-transaction-categories',
        'controller' => SafeTransactionCategoryController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'countries',
        'controller' => CountryController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'cities',
        'controller' => CityController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'areas',
        'controller' => AreaController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'states',
        'controller' => StateController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'orders',
        'controller' => OrderController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'status-types',
        'controller' => StatusTypeController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'stores',
        'controller' => StoreController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'expenses',
        'controller' => ExpenseController::class
    ], function () {
        Route::get('/data', 'data');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::get('/{id}/print', 'print');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'currency-types',
        'controller' => CurrencyTypeController::class
    ], function () {
        Route::get('/search', 'search');
    });

    Route::group([
        'prefix' => 'branches',
        'controller' => BranchController::class
    ], function () {
        Route::get('/data', 'data');
        Route::get('/search', 'search');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::put('/{id}/toggle-is-main', 'toggle_is_main');
        Route::delete('/{id}/delete', 'destroy');
    });

    Route::group([
        'prefix' => 'translations',
        'controller' => TranslationController::class
    ], function () {
        Route::get('/', 'index');
        Route::get('/data', 'data');
        Route::post('/create', 'store');
        Route::post('/{id}/update', 'update');
        Route::put('/{id}/swtich-language', 'swtich_language');
        Route::delete('/{id}/delete', 'destroy');
    });

});

Route::get('/attachments/{path}', [AttachmentController::class, 'index'])
    ->where('path', '.*')->middleware('auth'); // Accept any path after /attachments

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
