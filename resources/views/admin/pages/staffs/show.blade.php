@extends('admin.layouts.base')

@section('title', 'View & Update Staff')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">View & Update Staff</h1>

    

    <!-- Update Form -->
    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $staff->name) }}" 
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $staff->email) }}" 
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input 
                type="text" 
                id="role" 
                name="role" 
                class="form-control @error('role') is-invalid @enderror" 
                value="{{ old('role', $staff->role) }}" 
                required
            >
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Staff</button>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary mt-3">Back</a>

    </form>

</div>
@endsection
