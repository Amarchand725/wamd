<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Number;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Auth;
class ApiController extends Controller
{
    
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if(!empty($user) && $user->role_id==1){
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()
                    ->json(['message' => 'You have logged in successfully dear '.$user->name.', welcome to dashboard','access_token' => $token,
                        'token_type' => 'Bearer',
                        'details' => $user 
                    ],200);
            }else{
                return response()
                ->json(['message' => 'Not found your account.',
                    'token_type' => 'Bearer',
                ],404);
            }
        }else{
            return response()
            ->json(['message' => 'Not found your account.',
                'token_type' => 'Bearer',
            ],404);
        }
    }

    public function userStore(Request $request)
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
            return response()
            ->json(['message' => 'You have registered user successfully',
                'token_type' => 'Bearer',
                'details' => $model 
            ],200);
        }else{
            return response()
            ->json(['message' => 'Something went wrong.',
                'token_type' => 'Bearer',
            ],404);
        }
    }

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return response()
                    ->json(['message' => 'User Details',
                        'token_type' => 'Bearer',
                        'details' => $user 
                    ],200);
    }

    public function updateUser(Request $request, $id)
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
            return response()
            ->json(['message' => 'You have updated user successfully',
                'token_type' => 'Bearer',
                'details' => $model 
            ],200);
        }else{
            return response()
            ->json(['message' => 'Something went wrong.',
                'token_type' => 'Bearer',
            ],404);
        }
    }

    public function deleteUser($id)
    {
        $model = User::where('id', $id)->delete();
        if($model){
            return response()
            ->json(['message' => 'You have deleted user successfully',
                'token_type' => 'Bearer',
            ],200);
        }else{
            return response()
            ->json(['message' => 'Something went wrong.',
                'token_type' => 'Bearer',
            ],404);
        }
    }

    public function messageText(Request $request){
       if(!isset($request->sender) || !isset($request->api_key) || !isset($request->number) || !isset($request->message)){
        return response()->json([
            'status' => false ,
            'msg' => 'Wrong parameters!',
        ],Response::HTTP_BAD_REQUEST);
       }
       
    
      
        $data = Number::whereBody($request->sender)->with('user')->first();
    if(!$data){
        return response()->json([
            'status' => false ,
            'msg' => 'Invalid data!',
        ],Response::HTTP_BAD_REQUEST);
    }
      
    if($request->api_key !== $data->user->api_key){
        return response()->json([
            'status' => false ,
            'msg' => 'Wrong API KEY',
        ],Response::HTTP_BAD_REQUEST);
    }

    if($data->status !=='Connected'){
        return response()->json([
            'status' => false ,
            'msg' => 'Your sender is not connected yet!',
        ],Response::HTTP_BAD_REQUEST);
    }

        $post = json_decode($this->postMsg([
            'type' => 'text',
            'sender' => $request->sender,
            'number' => $request->number,
            'message' => $request->message
        ],'/backend-message'));

        return response()->json([
            'status' => $post->status ,
            'msg' => $post->msg,
        ],Response::HTTP_ACCEPTED);
    
    }



    public function messageImage(Request $request){
       
        if(!isset($request->sender) || !isset($request->api_key) || !isset($request->number) || !isset($request->message) || !isset($request->url)){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong parameters!',
         ],Response::HTTP_BAD_REQUEST);
        }

        $arr = explode('.',$request->url);
        $ext = end($arr);
        $allowed = ['jpg','jpeg','png'];
        if(!in_array($ext,$allowed)){
            return response()->json([
                'status' => false ,
                'msg' => 'Image URL Not Valid',
            ],Response::HTTP_BAD_REQUEST);
        }
        

     
       
         $data = Number::whereBody($request->sender)->with('user')->first();
     if(!$data){
         return response()->json([
             'status' => false ,
             'msg' => 'Invalid data!',
         ],Response::HTTP_BAD_REQUEST);
     }
       
     if($request->api_key !== $data->user->api_key){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong API KEY',
         ],Response::HTTP_BAD_REQUEST);
     }
 
     if($data->status !=='Connected'){
         return response()->json([
             'status' => false ,
             'msg' => 'Your sender is not connected yet!',
         ],Response::HTTP_BAD_REQUEST);
     }
 
         $post = json_decode($this->postMsg([
             'type' => 'image',
             'sender' => $request->sender,
             'number' => $request->number,
             'message' => $request->message,
             'url' => $request->url
         ],'/backend-media'));
 
         return response()->json([
             'status' => $post->status ,
             'msg' => $post->msg,
         ],Response::HTTP_ACCEPTED);
     
     }
    public function messageDocument(Request $request){
       
        if(!isset($request->sender) || !isset($request->api_key) || !isset($request->number)  || !isset($request->url)){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong parameters!',
         ],Response::HTTP_BAD_REQUEST);
        }

        $arr = explode('.',$request->url);
        $ext = end($arr);
        $allowed = ['pdf','doc','docx'];
        if(!in_array($ext,$allowed)){
            return response()->json([
                'status' => false ,
                'msg' => 'File URL Not Valid,ALLOWED PDF,DOC,DOCX',
            ],Response::HTTP_BAD_REQUEST);
        }
        

     
       
         $data = Number::whereBody($request->sender)->with('user')->first();
     if(!$data){
         return response()->json([
             'status' => false ,
             'msg' => 'Invalid data!',
         ],Response::HTTP_BAD_REQUEST);
     }
       
     if($request->api_key !== $data->user->api_key){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong API KEY',
         ],Response::HTTP_BAD_REQUEST);
     }
 
     if($data->status !=='Connected'){
         return response()->json([
             'status' => false ,
             'msg' => 'Your sender is not connected yet!',
         ],Response::HTTP_BAD_REQUEST);
     }
 
         $post = json_decode($this->postMsg([
             'type' => 'document',
             'sender' => $request->sender,
             'number' => $request->number,
             'url' => $request->url
         ],'/backend-document'));
 
         return response()->json([
             'status' => $post->status ,
             'msg' => $post->msg,
         ],Response::HTTP_ACCEPTED);
     
     }


     public function messageButton(Request $request){
       
        if(!isset($request->sender) || !isset($request->api_key) || !isset($request->number) || !isset($request->message)   || !isset($request->footer) || !isset($request->button1) || !isset($request->button2)){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong parameters!',
         ],Response::HTTP_BAD_REQUEST);
        }
       
         $data = Number::whereBody($request->sender)->with('user')->first();
     if(!$data){
         return response()->json([
             'status' => false ,
             'msg' => 'Invalid data!',
         ],Response::HTTP_BAD_REQUEST);
     }
       
     if($request->api_key !== $data->user->api_key){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong API KEY',
         ],Response::HTTP_BAD_REQUEST);
     }
 
     if($data->status !=='Connected'){
         return response()->json([
             'status' => false ,
             'msg' => 'Your sender is not connected yet!',
         ],Response::HTTP_BAD_REQUEST);
     }
 
         $post = json_decode($this->postMsg([
             'type' => 'button',
             'sender' => $request->sender,
             'number' => $request->number,
             'message' => $request->message,
             'footer' => $request->footer,
             'button1' => $request->button1,
             'button2' => $request->button2,
         ],'/backend-button'));
 
         return response()->json([
             'status' => $post->status ,
             'msg' => $post->msg,
         ],Response::HTTP_ACCEPTED);
     
     }
 
     public function messageTemplate(Request $request){
       
        if(!isset($request->sender) || !isset($request->api_key) || !isset($request->number) || !isset($request->message)   || !isset($request->footer) || !isset($request->template1) || !isset($request->template2)){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong parameters!',
         ],Response::HTTP_BAD_REQUEST);
        }
       
         $data = Number::whereBody($request->sender)->with('user')->first();
     if(!$data){
         return response()->json([
             'status' => false ,
             'msg' => 'Invalid data!',
         ],Response::HTTP_BAD_REQUEST);
     }
       
     if($request->api_key !== $data->user->api_key){
         return response()->json([
             'status' => false ,
             'msg' => 'Wrong API KEY',
         ],Response::HTTP_BAD_REQUEST);
     }
 
     if($data->status !=='Connected'){
         return response()->json([
             'status' => false ,
             'msg' => 'Your sender is not connected yet!',
         ],Response::HTTP_BAD_REQUEST);
     }
 
         $post = json_decode($this->postMsg([
             'type' => 'template',
             'sender' => $request->sender,
             'number' => $request->number,
             'message' => $request->message,
             'footer' => $request->footer,
             'template1' => $request->template1,
             'template2' => $request->template2,
         ],'/backend-template'));
 
         return response()->json([
             'status' => $post->status ,
             'msg' => $post->msg,
         ],Response::HTTP_ACCEPTED);
     
     }
 

    public function postMsg($data,$url){
        try {
           
           $post =  Http::withOptions(['verify' => false])->asForm()->post(env('WA_URL_SERVER').$url,$data);
           if(json_decode($post)->status === true){
            $c = Number::whereBody($data['sender'])->first();
            $c->messages_sent += 1;
            $c->save();
         }
         return $post;
        } catch (\Throwable $th) {
        
           return json_encode(['status' => false,'msg' => 'Make sure your server Node already running!']);
        }
    }
}
