<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('role_id', '!=', 1);
            if($request['search'] != ""){
                $query->where('username', 'like', '%'. $request['search'] .'%');
                $query->orWhere('expired_date', 'like', '%'. $request['search'] .'%');
                $query->orWhere('life_time', 'like', '%'. $request['search'] .'%');
                $query->orWhere('device_limit', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $users = $query->paginate(10);
            return (string) view('admin.user.search', compact('users'));
        }
        $users = User::orderby('id', 'desc')->where('role_id', '!=', 1)->paginate(10);
        $roles = Role::where('role', '!=', 'Admin')->where('status', 1)->get();
        return view('admin.user.index', compact('users', 'roles'));
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
        $validator = $request->validate([
            'username' => 'unique:users|min:4|required',
            'password'  => 'required|min:5',
            'role_id' => 'required',
            'device_limit' => 'required',
        ]); 

        $model = User::create([
            'role_id' => $request->role_id,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'expired_date' => $request->expired_date,
            'life_time' => $request->life_time,
            'device_limit' => $request->device_limit,
        ]);

        if($model){
            return 'success';
        }else{
            return 'failed';
        }
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
        $model = User::where('id', $id)->first();
        $roles = Role::where('role', '!=', 'Admin')->where('status', 1)->get();
        return (string) view('admin.user.edit', compact('model', 'roles'));
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
        $validator = $request->validate([
            'role_id' => 'required',
            'device_limit' => 'required',
        ]);

        $model = User::where('id', $id)->first();
        $model->role_id = $request->role_id;
        $model->username = $request->username;
        if(!empty($request->password)){
            $model->password = $request->password;
        }
        $model->expired_date = $request->expired_date;
        $model->life_time = $request->life_time;
        $model->device_limit = $request->device_limit;
        $model->save();

        if($model){
            return 'success';
        }else{
            return 'failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::where('id', $id)->delete();
        if ($model) {
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
