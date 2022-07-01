<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\ConsultationController;
use App\Http\Controllers\Backend\ProjectController;

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
    return view('frontend.consultation');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile/view', [AdminProfileController::class, 'ProfileView'])->name('view.profile');
    Route::post('/admin/update', [AdminProfileController::class, 'updateAdmin'])->name('update.admin');
    Route::get('/admin/Settings', [AdminProfileController::class, 'UpdateSettings'])->name('admin.settings');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/ViewAll', [AdminProfileController::class, 'ViewAdmins'])->name('admin.list');
    Route::get('/admin/Schedule/view', [AdminProfileController::class, 'ViewAppointments'])->name('schedule.view');
    Route::get('/schedule/view/all', [AdminProfileController::class, 'scheduleViewAjax']);
    Route::get('/admin/Projects/view', [AdminProfileController::class, 'ViewProjects'])->name('view_projects');

    Route::get('/admin/add', [AdminProfileController::class, 'Addadmin'])->name('Add.admin');
    Route::post('/admin/create', [AdminProfileController::class, 'Createadmin'])->name('create.admin');
    Route::get('/admin/Modify/{id}', [AdminProfileController::class, 'Modifyadmin'])->name('modify.admin');
    Route::post('/admin/Save', [AdminProfileController::class, 'ModifierAdmin'])->name('modifier.admin');
    Route::get('/admin/delete/{id}', [AdminProfileController::class, 'DeleteAdmin'])->name('delete.admin');



    Route::post('/admin/Password', [AdminProfileController::class, 'UpdatePassword'])->name('update.password');
});
// consultation 
Route::post('/add/consultation', [ConsultationController::class, 'insertConsultation'])->name('add.consultation');
// view project page 
Route::get('/Project/View', [ProjectController::class, 'ViewProject'])->name('view.project');
// save project
Route::post('/Project/Save', [ProjectController::class, 'SaveProject'])->name('save.project');




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
