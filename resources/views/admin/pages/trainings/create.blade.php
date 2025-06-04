@extends('admin.layouts.base')

@section('title', 'Add Training')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add New Training</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.trainings.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}" 
                           required>
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4" 
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration">Duration (in days) <span class="text-danger">*</span></label>
                    <input type="number" 
                           class="form-control @error('duration') is-invalid @enderror" 
                           id="duration" 
                           name="duration" 
                           min="1" 
                           value="{{ old('duration') }}" 
                           required>
                    @error('duration')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" 
                           class="form-control @error('start_date') is-invalid @enderror" 
                           id="start_date" 
                           name="start_date" 
                           value="{{ old('start_date') }}" 
                           required>
                    @error('start_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">End Date <span class="text-danger">*</span></label>
                    <input type="date" 
                           class="form-control @error('end_date') is-invalid @enderror" 
                           id="end_date" 
                           name="end_date" 
                           value="{{ old('end_date') }}" 
                           required>
                    @error('end_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Type <span class="text-danger">*</span></label>
                    <select class="form-control @error('type') is-invalid @enderror" 
                            id="type" 
                            name="type" 
                            required>
                        <option value="">Select type</option>
                        <option value="course" {{ old('type') == 'course' ? 'selected' : '' }}>Course</option>
                        <option value="training" {{ old('type') == 'training' ? 'selected' : '' }}>Training</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
    <label for="trainer_id">Trainer <span class="text-danger">*</span></label>
    <select class="form-control @error('trainer_id') is-invalid @enderror" 
            id="trainer_id" 
            name="trainer_id" 
            required>
        <option value="">Select trainer</option>
        @foreach($trainers as $trainer)
            <option value="{{ $trainer->id }}" {{ old('trainer_id') == $trainer->id ? 'selected' : '' }}>
                {{ $trainer->name }}
            </option>
        @endforeach
    </select>
    @error('trainer_id')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>


                <button type="submit" class="btn btn-primary">Add Training</button>
                <a href="{{ route('admin.pages.trainings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
