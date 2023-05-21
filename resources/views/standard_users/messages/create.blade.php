@extends('layouts.standard')

@section('title', 'Send Message')

@section('content-header')
    <h1>Send Message to Admin</h1>
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
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Send Message</h3>
        </div>
        <div class="card-body">
            <!-- Message form -->
            <form action="{{ route('standard.messages.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="content">Message</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>

        </div>
    </div>
@endsection
