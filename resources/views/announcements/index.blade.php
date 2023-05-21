@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Announcements</h1>
    <a href="{{ route('announcements.create') }}" class="btn btn-primary">Create Announcement</a>
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->id }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->content }}</td>
                    <td>
                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
