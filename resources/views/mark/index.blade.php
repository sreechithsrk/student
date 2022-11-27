@extends('layout')


@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>
    <br>
    <div class="clearfix"></div>
    <h1 class='text-white float-start'>Mark List</h1>
    <a class="button float-end" href="{{ route('mark.create') }}">Add Mark</a>
    <div class="clearfix"></div>
    <hr>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Maths</th>
                <th>Science</th>
                <th>History</th>
                <th>Term</th>
                <th>Total Marks</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>

            @forelse($studentMarks as $mark)
                <tr>
                    <td>{{ $mark->id }}</td>
                    <td>{{ $mark->name }}</td>
                    <td>{{ $mark->maths }}</td>
                    <td>{{ $mark->science }}</td>
                    <td>{{ $mark->history }}</td>
                    <td>{{ $mark->term }}</td>
                    <td>{{ $mark->maths + $mark->science + $mark->history }}</td>
                    <td>{{ date('M d,Y H:i A', strtotime($mark->created_at)) }}</td>
                    <td>
                        <a class="bi bi-trash text-danger" href="{{ route('mark.delete', $mark->id) }}"></a> &nbsp;
                        <a class="bi bi-pencil-square text-success" href="{{ route('mark.update', $mark->id) }}"></a>
                    </td>
                </tr>
            @empty
                <td colspan="9">Nothing Found</td>
            @endforelse
        </table>
    </div>
@stop
