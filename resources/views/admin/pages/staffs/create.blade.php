@extends('admin.layouts.base')

@section('title', 'Add Staff')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add Staff</h1>

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="form-label">Role</label>
            <input 
                type="text" 
                class="form-control @error('role') is-invalid @enderror" 
                id="role" 
                name="role" 
                value="{{ old('role') }}" 
                required
            >
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Staff</button>
    </form>
@endsection
