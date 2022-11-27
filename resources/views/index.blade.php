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
    <h1 class='text-white float-start'>Students List</h1>
    <a class="button float-end" href="{{ route('student.create') }}">Add New Student</a>
    <div class="clearfix"></div>
    <hr>
    <div class="container">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Reporting Teacher</th>
                <th>Action</th>
            </tr>

            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->teacher_name }}</td>
                    <td>
                        <a class="bi bi-trash text-danger" href="{{ route('student.delete', $student->id) }}"></a> &nbsp;
                        <a class="bi bi-pencil-square text-success" href="{{ route('student.update', $student->id) }}"></a>
                    </td>
                </tr>
            @empty
                <td colspan="6">Nothing Found</td>
            @endforelse
        </table>
    </div>
@stop
