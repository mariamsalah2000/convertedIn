@extends('main')
@section('content')
    <h1>All Statistics</h1>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Number Of Tasks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $stat)
                <tr>
                    <td>{{ $stat->user->name }}</td>
                    <td>{{ $stat->tasks_no }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $statistics->links() }}
    </div>
@endsection
