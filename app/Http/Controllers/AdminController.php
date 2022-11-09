<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\TaskRequest;
use App\Models\admins;
use App\Models\employee;
use App\Models\task;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function check(AdminRequest $request)
    {
        $user = $request->get('username');
        $pass = $request->get('password');

        if(admins::where("username",'=',$user)->count() > 0){

            if(admins::where("password",$pass)->count() > 0){
                $request->session()->put('adminUser','LoggedIn');


                return redirect('dashboard');
            }else {
                echo "PAssword is incorrect";
            }
        }else {
            echo "No USer With That Credentials";
        }


    }

    public function addEmp(EmployeeRequest $request){


        if($request->session()->has('adminUser')){
            $request->validated();
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $cpassword = $request->get('cpassword');

            if($password == $cpassword){
                $emp = new employee();
                $emp->name = $name;
                $emp->email = $email;
                $emp->password = md5($password);
                $emp->save();
                return redirect()->back()->withSuccess('Employee User Created Successfully');
            }
        }else{
            return redirect('admin');
        }
        //

    }


    public function viewtask(Request $r){

        if($r->session()->has('adminUser')){
            $data = employee::all();
            return view('Admin.addTask',['data' => $data ]);
        }else{
            return redirect('admin');
        }
    }

    public function addTask(TaskRequest $r){


        if($r->session()->has('adminUser')){
            $r->validated();
            $tname = $r->get('tname');
            $start = $r->get('start');
            $end = $r->get('end');
            $assign = $r->get('assign');

            $tk = new task();
            $tk->task_name = $tname;
            $tk->start_time = $start;
            $tk->end_time = $end;
            $tk->status = 1;
            $tk->emp_id = $assign;
            $tk->save();

            return redirect()->back()->withSuccess('New Task Created Successfully');
        }else{
            return redirect('admin');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
