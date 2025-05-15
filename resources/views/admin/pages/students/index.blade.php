@extends('admin.layouts.base')

@section('title', 'Student')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Students</h1>
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Student
        </a>
    </div>

    <p class="mb-4">
        This table displays the registered students with their details.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Registration Date</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($student->registration_date)->format('d M Y') }}</td>
                                <td>{{ $student->gender }}</td>
                                <td class="text-center">
                                    <!-- View button -->
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Delete button -->
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this student?');">
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
