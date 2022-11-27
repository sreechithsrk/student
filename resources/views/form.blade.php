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
    <h1 class='text-white float-start'>{{ !empty($student->id) ? 'Update' : 'Add New' }} Student</h1>
    <a class="button float-end" href="{{ route('student.index') }}">Back to list</a>
    <div class="clearfix"></div>
    <hr>
    <form method="POST" enctype="multipart/form-data" action="{{ route('student.store') }}">
        @csrf
        <input class="form-control" type="hidden" name="id" value="{{ $student->id ?? '' }}">
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label required">Student Name</label>
                <input type="text" name="name" class="form-control" value="{{ $student->name ?? '' }}"
                    placeholder="Student Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Age</label>
                <input type="number" name="age" class="form-control" min="1" value="{{ $student->age ?? '' }}"
                    placeholder="student age" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M"
                        {{ !empty($student->gender) && $student->gender === 'M' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F"
                        {{ !empty($student->gender) && $student->gender === 'F' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Reporting Teacher</label>
                <select name="id_teacher" class="form-select" required>
                    <option selected disabled value="">Select Reporting Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ !empty($student->id_teacher) && $student->id_teacher === $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
        </div>
    </form>
@stop
