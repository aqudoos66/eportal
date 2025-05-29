@extends('admin.layouts.base')
@section('title', 'View Course')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View / Edit Course</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label>Title</label>
                <input name="title" value="{{ $course->title }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Duration (in days)</label>
                <input name="duration" type="number" value="{{ $course->duration }}" class="form-control" required>
            </div>

            <div class="col-md-6 mt-3">
                <label>Start Date</label>
                <input name="start_date" type="date" value="{{ $course->start_date }}" class="form-control" required>
            </div>

            <div class="col-md-6 mt-3">
                <label>End Date</label>
                <input name="end_date" type="date" value="{{ $course->end_date }}" class="form-control" required>
            </div>

            <div class="col-md-6 mt-3">
                <label>Trainer</label>
                <select name="trainer_id" class="form-control" required>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}" {{ $trainer->id == $course->trainer_id ? 'selected' : '' }}>
                            {{ $trainer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Course</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
@endsection
