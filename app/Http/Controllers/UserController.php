<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    public function index($id){
        $current_user = auth()->user();
        $users= User::all();
        $senduser=User::find($id);
        //  return($senduser);
        return view('user.usersend',['users'=>$users,'current_user'=>$current_user,'senduser'=>$senduser]);
    }
    public function save(Request $request, $senderId,$receiverId){
        $this->validate($request, [
            'message' => 'required|min:3|max:255|string',
            'encryptedimg' => 'required',
        ]);
        $current_user = auth()->user();
        $senduser=User::find($receiverId);

        $message = new Message();
        $users= User::all();
        $message->senderId = $senderId;
        $message->receiverId = $receiverId;
        $message->message = $request->input('message');
        if($request->credentials!=null){
        $message->credentials =$request->input('credentials');
        }

        if($request->hasFile('encryptedimg')){
            $file = $request->file('encryptedimg');
            $extension = $file->getClientOriginalExtension();
            $filename=time().".".$extension;
            $file->move('uploads/encrypted_image/',$filename);
            $message->image=$filename;

        }
        else{
            return $request;
            $message->image ='';
        }
        $message->save();
        return redirect('/home')->with('success','Message Send Successfully');

    }
    public function inbox(){
        $current_user = auth()->user();
        $users= User::all();
        // $senduser=User::find($id);
        $receivedMessages=DB::table('messages')
        ->select('messages.id', 'name','senderId','receiverId','image','message','credentials')
        ->where('receiverId',$current_user->id)
        ->join('users', 'users.id', '=', 'messages.senderId')
        ->get();
        // return($receivedMessages);
        return view('user.inbox',['current_user'=>$current_user,'users'=>$users,'receivedMessages'=>$receivedMessages]);
    }
    public function decryptmessage($id){
        $current_user = auth()->user();
        $users= User::all();
        // $senduser=User::find($id);
        $receivedMessages=Message::find($id)
        ->select('messages.id', 'name','senderId','receiverId','image','message','credentials')
        ->where('receiverId',$current_user->id)
        ->where('messages.id',$id)
        ->join('users', 'users.id', '=', 'messages.senderId')
        ->first();
        // return($receivedMessages);
         return view('user.decryptmessage',['current_user'=>$current_user,'users'=>$users,'receivedMessages'=>$receivedMessages]);

    }
    
    public function credentials(Request $request, $id){
        $this->validate($request, [
            'credentials' => 'required|string',
        ]);
        $credential = $this->request->input('credentials');


        $current_user = auth()->user();
        $users= User::all();
        // $senduser=User::find($id);
        $receivedMessages=Message::find($id)
        ->select('messages.id', 'name','senderId','receiverId','image','message','credentials')
        ->where('receiverId',$current_user->id)
        ->where('messages.id',$id)
        ->join('users', 'users.id', '=', 'messages.senderId')
        ->first();
        // return($credential);
        if($credential==$receivedMessages->credentials){
            // return("yes");
            return view('user.decryptmessage-login',['credential'=>$credential,'current_user'=>$current_user,'users'=>$users,'receivedMessages'=>$receivedMessages]);
        }
        else{
            //  return($receivedMessages);
            return view('user.decryptmessage',['current_user'=>$current_user,'users'=>$users,'receivedMessages'=>$receivedMessages])->withErrors(['error' => "Invalid Password"]);
        }
    }
}
