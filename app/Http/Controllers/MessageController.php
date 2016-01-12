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
            ->orderBy('created_at', 'desc')
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
            ->orderBy('created_at', 'desc')
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
            return [
                'email' => $u->email,
                'id' => $u->id,
                'name' => $u->username
            ];
        });

        return view('messages.create')->with([
            'unreadMessagesCount' => $unreadMessagesCount,
            'emails' => $emails
        ]);
    }

    public function store(Request $request, $username)
    {
        $usersId = $request->input('usersId');

        collect($usersId)->map(function($id) use ($request) {

            Message::create([
                'content' => $request->input('content'),
                'to_user_id' => $id,
                'from_user_id' => auth()->user()->id,
                'read' => false
            ]);

//            Mail::raw($request->input('content'), function($message) use ($e)
//            {
//                $message->from('', 'e-blog');
//                $message->to($e);
//            });
        });

        return redirect()->route('sent_messages', $username);

    }

    public function show($username, $messageId)
    {
        $message = Message::with('from')->find($messageId);
        $unreadMessagesCount = auth()->user()->receivedMessages()->where('read', false)->count();

        return view('messages.show')->with([
            'unreadMessagesCount' => $unreadMessagesCount,
            'message' => $message
        ]);
    }

    public function showSent($username, $messageId)
    {
        $message = Message::with('from')->find($messageId);
        $unreadMessagesCount = auth()->user()->receivedMessages()->where('read', false)->count();

        return view('messages.showSent')->with([
            'unreadMessagesCount' => $unreadMessagesCount,
            'message' => $message
        ]);
    }

    public function reply(Request $request, $username, $messageId)
    {
        Message::create([
            'content' => $request->input('content'),
            'to_user_id' => intval($request->input('to_user_id')),
            'from_user_id' => auth()->user()->id,
            'read' => false
        ]);

        return redirect()->route('sent_messages', $username);
    }
}
