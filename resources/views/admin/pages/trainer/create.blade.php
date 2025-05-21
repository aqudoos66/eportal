@extends('admin.layouts.base')

@section('title', 'Add Trainer')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Trainer</h1>

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

    <form method="POST" action="{{ route('admin.pages.trainers.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
                <input name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Phone</label>
                <input name="phone" value="{{ old('phone') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Expertise</label>
                <input name="expertise" value="{{ old('expertise') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>CNIC</label>
                <input name="cnic" value="{{ old('cnic') }}" class="form-control" required>
            </div>
        </div>

        <hr class="my-4">

        <h5>Education</h5>
        <div class="row">
            <div class="col-md-4">
                <label>Degree</label>
                <input name="degree" value="{{ old('degree') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Institution</label>
                <input name="institution" value="{{ old('institution') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Field of Study</label>
                <input name="field_of_study" value="{{ old('field_of_study') }}" class="form-control" required>
            </div>
            <div class="col-md-2 mt-3">
                <label>Start Year</label>
                <input name="start_year" type="number" value="{{ old('start_year') }}" class="form-control" required>
            </div>
            <div class="col-md-2 mt-3">
                <label>End Year</label>
                <input name="end_year" type="number" value="{{ old('end_year') }}" class="form-control" required>
            </div>
            <div class="col-md-2 mt-3">
                <label>Grade</label>
                <input name="grade" value="{{ old('grade') }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Description</label>
                <input name="description" value="{{ old('description') }}" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Add Trainer</button>
        <a href="{{ route('admin.pages.trainers.index') }}" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
@endsection
