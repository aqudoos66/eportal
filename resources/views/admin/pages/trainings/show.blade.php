@extends('admin.layouts.base')

@section('title', 'View Training')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View / Edit Training</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.trainings.update', $training->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label for="title">Title</label>
                <input id="title" name="title" value="{{ old('title', $training->title) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="duration">Duration (in days)</label>
                <input id="duration" name="duration" type="number" value="{{ old('duration', $training->duration) }}" class="form-control" required>
            </div>

            <div class="col-md-12 mt-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" class="form-control" required>{{ old('description', $training->description) }}</textarea>
            </div>

            <div class="col-md-6 mt-3">
    <label for="start_date">Start Date</label>
    <input id="start_date" name="start_date" type="date" 
        value="{{ old('start_date', \Carbon\Carbon::parse($training->start_date)->format('Y-m-d')) }}" 
        class="form-control" required>
</div>

<div class="col-md-6 mt-3">
    <label for="end_date">End Date</label>
    <input id="end_date" name="end_date" type="date" 
        value="{{ old('end_date', \Carbon\Carbon::parse($training->end_date)->format('Y-m-d')) }}" 
        class="form-control" required>
</div>


            <div class="col-md-6 mt-3">
                <label for="type">Type</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="course" {{ old('type', $training->type) == 'course' ? 'selected' : '' }}>Course</option>
                    <option value="training" {{ old('type', $training->type) == 'training' ? 'selected' : '' }}>Training</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Training</button>
        <a href="{{ route('admin.pages.trainings.index') }}" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
@endsection
