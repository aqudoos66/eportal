@extends('admin.layouts.base')

@section('title', 'Staff')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Staff Members</h1>
        <a href="{{ route('staff.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Staff
        </a>
    </div>

    <p class="mb-4">
        This table displays all staff members with their assigned roles and contact information.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staffs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->role }}</td>
                                <td class="text-center">
                                    <!-- Optional: View button -->
                                    <a href="{{ route('staff.show', $member->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Delete button -->
                                    <form action="{{ route('staff.destroy', $member->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
