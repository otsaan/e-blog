<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function index()
    {
        $receivedMessages = Message::with('from')
            ->with('to')
            ->where('to_user_id', '=', auth()->user()->id)
            ->get();

        $unreadMessagesCount = auth()->user()->receivedMessages()->where('read', false)->count();

        return view('messages.index')->with([
            'receivedMessages' => $receivedMessages,
            'unreadMessagesCount' => $unreadMessagesCount
        ]);
    }

    public function sent()
    {
        $sentMessages = Message::with('from')
            ->with('to')
            ->where('from_user_id', '=', auth()->user()->id)
            ->get();

        $unreadMessagesCount = auth()->user()->receivedMessages()->where('read', false)->count();

        return view('messages.sent')->with([
            'sentMessages' => $sentMessages,
            'unreadMessagesCount' => $unreadMessagesCount
        ]);
    }

    public function create()
    {
        $unreadMessagesCount = auth()->user()->receivedMessages()->where('read', false)->count();

        $emails = User::all()->map(function($u) {
            return ['email' => $u->email, 'name' => $u->username];
        });

        return view('messages.create')->with([
            'unreadMessagesCount' => $unreadMessagesCount,
            'emails' => $emails
        ]);
    }

    public function store(Request $request)
    {
        $toEmails = $request->input('emails');

        collect($toEmails)->map(function($e) use ($request) {
            auth()->user()->sentMessages()->create([
                'content' => $request->input('content'),
                'read' => false
            ]);

            Mail::raw($request->input('content'), function($message) use ($e)
            {
                $message->from('', 'e-blog');
                $message->to($e);
            });
        });

    }
}
