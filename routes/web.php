<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use App\Models\Inventory;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('users', [UserController::class, 'index']);
Route::get('users-export', [UserController::class, 'export'])->name('users.export');
Route::post('users-import', [UserController::class, 'import'])->name('users.import');

Route::get('welcome', function () {
  return view('welcome');
});

Route::get('dashboard', function () {
  return view('dashboard');
});

Route::get('/', [InventoryController::class, 'index']);
Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('inventory-export', [InventoryController::class, 'export'])->name('inventory.export');
Route::post('inventory-import', [InventoryController::class, 'import'])->name('inventory.import');
Route::get('inventory-create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('inventory-store', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('inventory-edit/{inventory}', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('inventory/update/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventory/{id_barang}', [InventoryController::class, 'delete'])->name('inventory.delete');

require __DIR__.'/auth.php';
