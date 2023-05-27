<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        
        // Fetch all messages for admin and only specific messages for standard users
        if ($user->role === 'admin') {
            $messages = Message::all();
            $view = 'messages.index';
        } else {
            $userId = $user->id;
            $messages = Message::where('receiver_id', $userId)
                ->orWhere(function ($query) use ($userId) {
                    $query->where('sender_id', $userId)
                        ->whereHas('receiver', function ($query) {
                            $query->where('role', 'admin');
                        });
                })
                ->get();
            $view = 'standard_users.messages.index';
        }

        return view($view, compact('messages'));
    }

    public function show(Message $message)
    {
        // Check if the user has permission to view the message
        if ($message->receiver_id !== auth()->user()->id && $message->sender_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $message->update(['is_read' => true]);
        $replies = Message::where('parent_id', $message->id)->get();

        // Choose the view based on the user's role
        $view = (auth()->user()->role === 'admin') ? 'messages.show' : 'standard_users.messages.show';
        return view($view, compact('message', 'replies'));
    }


    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $reply = new Message([
            'subject' => $message->subject,
            'content' => $request->input('content'),
            'sender_id' => auth()->user()->id,
            'receiver_id' => $message->sender_id,
            'parent_id' => $message->id,
        ]);

        $reply->save();

        // Redirect based on user role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('messages.show', $message)->with('success', 'Reply sent successfully.');
        } else {
            return redirect()->route('standard.messages.show', $message)->with('success', 'Reply sent successfully.');
        }
    }

    public function createStandardUser()
    {
        return view('standard_users.messages.create');
    }

    public function storeStandardUser(Request $request)
    {
        $request->validate([
            'subject' => 'required', // Add this line
            'content' => 'required',
        ]);

        // Find the admin user
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            return redirect()->route('standard.messages.create')->with('error', 'Admin user not found.');
        }

        $message = new Message([
            'subject' => $request->input('subject'), // Add this line
            'content' => $request->input('content'),
            'sender_id' => auth()->user()->id,
            'receiver_id' => $admin->id,
        ]);

        $message->save();

        return redirect()->route('standard.messages.create')->with('success', 'Message sent successfully.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        // Check if the logged-in user has permission to delete the message
        if (auth()->user()->id !== $message->sender_id && auth()->user()->id !== $message->receiver_id) {
            return abort(403, 'Unauthorized action.');
        }

        $message->delete();

        // Redirect the user to the appropriate dashboard based on their role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('messages.index')->with('success', 'Message deleted successfully');
        } else {
            return redirect()->route('standard.messages.index')->with('success', 'Message deleted successfully');
        }
    }

    public function getUnreadMessagesCount()
    {
        if (auth()->check()) {
            return Message::where('receiver_id', auth()->user()->id)
                ->where('is_read', false)
                ->count();
        }

        return 0;
    }

}

