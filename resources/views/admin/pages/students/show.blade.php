@extends('admin.layouts.base')
@section('title', 'View Student')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View / Edit Student</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.students.update', $student->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
                <input name="name" value="{{ $student->name }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input name="email" value="{{ $student->email }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Phone</label>
                <input name="phone" value="{{ $student->phone }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Date of Birth</label>
                <input name="dob" type="date" value="{{ $student->dob }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label>Address</label>
                <input name="address" value="{{ $student->address }}" class="form-control" required>
            </div>
        </div>

        <hr class="my-4">

        <h5>Education</h5>
        <div id="education-section">
            @foreach ($student->educations as $index => $edu)
                <div class="row education-entry mb-3">
                    <div class="col-md-4">
                        <input name="degree[]" value="{{ $edu->degree }}" class="form-control" placeholder="Degree">
                    </div>
                    <div class="col-md-4">
                        <input name="institution[]" value="{{ $edu->institution }}" class="form-control" placeholder="Institution">
                    </div>
                    <div class="col-md-4">
                        <input name="field_of_study[]" value="{{ $edu->field_of_study }}" class="form-control" placeholder="Field of Study">
                    </div>
                    <div class="col-md-2 mt-2">
                        <input name="start_year[]" value="{{ $edu->start_year }}" class="form-control" placeholder="Start Year">
                    </div>
                    <div class="col-md-2 mt-2">
                        <input name="end_year[]" value="{{ $edu->end_year }}" class="form-control" placeholder="End Year">
                    </div>
                    <div class="col-md-2 mt-2">
                        <input name="grade[]" value="{{ $edu->grade }}" class="form-control" placeholder="Grade">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input name="description[]" value="{{ $edu->description }}" class="form-control" placeholder="Description">
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Student</button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
