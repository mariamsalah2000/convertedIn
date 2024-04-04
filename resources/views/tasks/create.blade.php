@extends('main')
@section('content')
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="assigned_by">Assigned By:</label>
            <select id="assigned_by" name="assign_by" class="form-control" required>
                <option value="">Select Admin</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
            @error('assigned_by')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigned To:</label>
            <select id="assigned_to" name="assign_to" class="form-control" required>
                <option value="">Select Assignee User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('assigned_to')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
