@extends('main')
@section('content')
    <h1>All Tasks</h1>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            {{ \Session::get('success') }}
        </div>
    @elseif (\Session::has('errors'))
        <div class="alert alert-danger">
            {{ \Session::get('errors') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned By</th>
                <th>Assigned To</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->admin ? $task->admin->name : '-' }}</td>
                    <td>{{ $task->user ? $task->user->name : '-' }}</td>
                    <td>{{ $task->created_at->toDateString() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        {{ $tasks->links() }}
    </div>
@endsection
