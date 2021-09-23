<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Messages;
use App\Models\User;
use DB;

class MessageController extends Controller
{
    public function retrieveUserMessage(){
        //retrieve authenticated user ID
        $user_id = Auth::id();
        //query messages table based on Authenticated user ID = Recipient ID
        $messages = Messages::all()->where('recipient_id', $user_id);
        //retrieve sending user ID
        $sender_id = Messages::all()->where('recipient_id', $user_id)->pluck('sender_id');
        //retrieve sending user name from user table using ID
        $sender_name = Messages::with('User')->pluck('sender_id');
        //Return the messages view and array of messages received from query
        return view('profile.messages', compact('messages','sender_name'));
        
    }

    public function sendMessage(){
        //logic to send messages here
    }
}
