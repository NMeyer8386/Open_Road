<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\testController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::resource('/notes', NoteController::class)->middleware(['auth']);

// Route::get('/trashed', [TrashedNoteController::class, 'index'])->middleware('auth')->name('trashed.index');

// Route::get('/trashed/{note}', [TrashedNoteController::class, 'show'])
//         ->withTrashed()
//         ->middleware('auth')->name('trashed.show');

// Route::put('/trashed/{note}', [TrashedNoteController::class, 'update'])
//         ->withTrashed()
//         ->middleware('auth')->name('trashed.update');

// Route::delete('/trashed/{note}', [TrashedNoteController::class, 'destroy'])
//         ->withTrashed()
//         ->middleware('auth')->name('trashed.destroy');

//same thing as above commented code but better
Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function(){
    Route::get('/', [TrashedNoteController::class, 'index'])->name('index');
    Route::get('/{note}', [TrashedNoteController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{note}', [TrashedNoteController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{note}', [TrashedNoteController::class, 'destroy'])->name('destory')->withTrashed();
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
