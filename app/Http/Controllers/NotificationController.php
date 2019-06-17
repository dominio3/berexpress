<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
 
class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        // user 2 sends a message to user 1
        $message = new Message;
        $message->setAttribute('from', 2);
        $message->setAttribute('to', 1);
        $message->setAttribute('message', 'Demo message from user 2 to user 1.');
        $message->save();
         
        $fromUser = User::find(2);
        $toUser = User::find(1);
         
        // send notification using the "user" model, when the user receives new message
        $toUser->notify(new NewMessage($fromUser));
         
        // send notification using the "Notification" facade
        Notification::send($toUser, new NewMessage($fromUser));
    }
}