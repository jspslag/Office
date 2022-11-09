<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\task;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Employee.login');

    }

    public function check(Request $request)
    {
        $email = $request->get('email');
        $pass = md5($request->get('password'));

        if(employee::where("email","=",$email)->count() > 0){
            if(employee::where("password","=",$pass)->count() > 0){
                $request->session()->put('user','LoggedIn');
                $id = employee::where("email","=",$email)->get();
                $request->session()->put('eid',$id[0]->id);
                return redirect('employee/tasks');
            }else{
                echo "Password is INcorrect";
            }
        }else{
            echo "BAd Credentials";
        }
    }

    public function alter($id){
        $task = task::find($id);

        if($task->status == 1){
            $task->status = 2;
            $task->save();
            return redirect()->back()->withSuccess('Status Updated Successfully');
        }else if($task->status == 2){
            $task->status = 0;
            $task->save();
            return redirect()->back()->withSuccess('Status Updated Successfully');

        }else{
            return redirect()->back()->withSuccess('Task Is Completed Already');

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
    public function edit($id)
    {
        //
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
        //
    }
}
