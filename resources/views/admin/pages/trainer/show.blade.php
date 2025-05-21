@extends('admin.layouts.base')

@section('title', 'View Trainer')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View / Edit Trainer</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.pages.trainers.update', $trainer->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mt-3">
                <label>Name</label>
                <input name="name" value="{{ old('name', $trainer->name) }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Email</label>
                <input name="email" type="email" value="{{ old('email', $trainer->email) }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Phone</label>
                <input name="phone" value="{{ old('phone', $trainer->phone) }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>Expertise</label>
                <input name="expertise" value="{{ old('expertise', $trainer->expertise) }}" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3">
                <label>CNIC</label>
                <input name="cnic" value="{{ old('cnic', $trainer->cnic) }}" class="form-control" required>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Trainer</button>
            <a href="{{ route('admin.pages.trainers.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
