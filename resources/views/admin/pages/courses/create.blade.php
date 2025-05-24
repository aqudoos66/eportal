@extends('admin.layouts.base')

@section('title', 'Add Course')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Course</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label>Title</label>
                <input name="title" value="{{ old('title') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Duration (in hours)</label>
                <input name="duration" type="number" value="{{ old('duration') }}" class="form-control" required>
            </div>
            <div class="col-md-12 mt-3">
                <label>Description</label>
                <textarea name="description" rows="3" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="col-md-6 mt-3">
                <label>Start Date</label>
                <input name="start_date" type="date" value="{{ old('start_date') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>End Date</label>
                <input name="end_date" type="date" value="{{ old('end_date') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Trainer</label>
                <select name="trainer_id" class="form-control" required>
                    <option value="">-- Select Trainer --</option>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}" {{ old('trainer_id') == $trainer->id ? 'selected' : '' }}>
                            {{ $trainer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Create Course</button>
        <a href="{{ asset('/courses') }}" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
@endsection
