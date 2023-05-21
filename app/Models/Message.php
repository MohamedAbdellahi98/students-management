<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'subject', // Add this line
        'content',
        'is_read',
        'parent_id',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

/*     public function reply(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $reply = new Message([
            'subject' => 'Re: ' . $message->subject,
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
    } */


    public function replies()
    {
        return $this->hasMany(Message::class, 'parent_id');
    }


    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
