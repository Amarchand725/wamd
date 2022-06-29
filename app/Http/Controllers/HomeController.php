<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->role_id==1){
            $numbers = Number::whereStatus('Connected')->get();      
            return view('dashboard.admin-dashboard',[
                'numbers' => Auth::user()->numbers()->get()
            ]);
        }else{
            $devices = Number::where('user_id', Auth::user()->id)->get();
            return view('dashboard.user-dashboard', compact('devices'));
        }
    }
  
    public function store(Request $request){
        $request->validate([
            'sender' => ['required','min:10','unique:numbers,body']
        ]);

        if(Auth::user()->role_id==1){
            $model = Number::create([
                'user_id' => Auth::user()->id,
                'body' => $request->sender,
                'webhook' => $request->urlwebhook,
                'status' => 'Disconnect',
                'messages_sent' => 0
            ]);

            if($model){
                return 'success';
            }else{
                return 'failed';
            } 
        }else{
            $total_added_devices = Number::where('user_id', Auth::user()->id)->count();
            $total_added_devices = $total_added_devices+1;
            if($total_added_devices <= Auth::user()->device_limit){
                Number::create([
                    'user_id' => Auth::user()->id,
                    'body' => $request->sender,
                    'webhook' => $request->urlwebhook,
                    'status' => 'Disconnect',
                    'messages_sent' => 0
                ]);

                return 'success';
            }else{
                return 'failed';
            }
        }
    }
    public function destroy(Request $request){
        Number::find($request->deviceId)->delete();

        return back()->with('alert',[
            'type' => 'success',
            'msg' => 'Devices Deleted!'
        ]);
    }

    public function setHook(Request $request){
        $n = Number::whereBody($request->number)->first();
        $n->webhook = $request->webhook;
        $n->save();
        return true;
    }

    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!empty($user) && $user->role_id==1){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }
            return redirect()->back()->with('error', 'Failed to login try again.!');
        }else{
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }
            return redirect()->back()->with('error', 'Failed to login try again.!');
        }
    }
    public function destroyDevice($id)
    {
        $model = Number::where('id', $id)->delete();
        if ($model) {
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}