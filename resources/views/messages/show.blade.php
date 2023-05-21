@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Message Details</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <tbody>
            <tr>
                <th>From</th>
                <td>{{ $message->sender->name }}</td>
            </tr>
            <tr>
                <th>To</th>
                <td>{{ $message->receiver->name }}</td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>{{ $message->subject }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{{ $message->content }}</td>
            </tr>
            <tr>
                <th>Sent At</th>
                <td>{{ $message->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <h2>Replies</h2>
    @foreach($replies as $reply)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $reply->content }}</p>
                <p><strong>Re:</strong> {{ $reply->subject }}</p>
                <p><strong>From:</strong> {{ $reply->sender->name }}</p>
                <p><strong>Sent At:</strong> {{ $reply->created_at }}</p>
            </div>
        </div>
    @endforeach
    <form action="{{ route('messages.reply', $message) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Reply:</label>
            <textarea name="content" id="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Reply</button>
    </form>

</div>
@endsection
