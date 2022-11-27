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
    <h1 class='text-white float-start'>{{ !empty($marks->id) ? 'Update' : 'Add ' }} Mark</h1>
    <a class="button float-end" href="{{ route('mark.index') }}">Back to list</a>
    <div class="clearfix"></div>
    <hr>
    <form method="POST" action="{{ route('mark.store') }}">
        @csrf
        <input class="form-control" type="hidden" name="id" value="{{ $marks->id ?? '' }}">
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Student</label>
                <select name="id_student" class="form-select" required>
                    <option selected disabled value="">Select student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}"
                            {{ !empty($marks->id_student) && $marks->id_student === $student->id ? 'selected' : '' }}>
                            {{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Term</label>
                <select name="id_term" class="form-select" required>
                    <option selected disabled value="">Select Term</option>
                    @foreach ($terms as $term)
                        <option value="{{ $term->id }}"
                            {{ !empty($marks->id_term) && $marks->id_term === $term->id ? 'selected' : '' }}>
                            {{ $term->term }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label required">Marks</label>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Maths</span>
                <input type="number" name="maths" min="0" value="{{ $marks->maths ?? '' }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Science</span>
                <input type="number" name="science" min="0" value="{{ $marks->science ?? '' }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">History</span>
                <input type="number" name="history" min="0"  value="{{ $marks->history ?? '' }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
