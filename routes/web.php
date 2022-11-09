<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Models\task;
use App\Models\employee;
use Illuminate\Http\Request;

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

Route::get('admin',function(){
    return view('Admin.login');
});
Route::get('dashboard',function(Request $r){
    if($r->session()->has('adminUser')){
        $data = task::all();
        $empdata = employee::all();
        return view("Admin.dashboard",['data'=>$data,'emp'=>$empdata]);
    }else{
        return redirect('admin');
    }
});

// Route::get('AddTask',function(){
//     return view("Admin.addTask");
// });

Route::get('AddTask',[AdminController::class,'viewtask']);

Route::get('AddEmployee',function(Request $r){
    if($r->session()->has('adminUser')){
        return view("Admin.addEmp");
    }else{
        return redirect('admin');
    }
});
Route::post('check',[AdminController::class,'check']);
Route::post('addEm',[AdminController::class,'addEmp']);
Route::post('addTask',[AdminController::class,'addTask']);

Route::get('login',[EmployeeController::class,'index']);
Route::post('employeeCheck',[EmployeeController::class,'check']);
Route::get('employee/tasks',function(Request $request){


    if($request->session()->has('user')){
        $t = task::all();
        $id = $request->session()->get('eid');
        return view('Employee.empTasks',['task'=>$t,'eid'=>$id]);
    }else
        return redirect('login');
});

Route::get('employee/update/{id}',[EmployeeController::class,'alter']);
Route::get('employee/logout',function(Request $request){
    $request->session()->forget('user');
    return redirect('login');
});

Route::get('alogout',function(Request $request){
    $request->session()->forget('adminUser');
    return redirect('admin');
});
