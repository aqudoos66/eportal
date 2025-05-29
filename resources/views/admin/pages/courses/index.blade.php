@extends('admin.layouts.base')

@section('title', 'Courses')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Course
        </a>
    </div>

    <p class="mb-4">
        This table displays all courses with their details and assigned trainers.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Duration (days)</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Trainer</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->duration }}</td>
                                <td>{{ \Carbon\Carbon::parse($course->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($course->end_date)->format('d M Y') }}</td>
                                <td>{{ $course->trainer->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                 <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this course?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No courses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this course?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
        </div>
    </form>
  </div>
</div>

@endsection

@push('scripts')
<!-- Ensure jQuery is loaded before this script -->
<script>
    $(document).ready(function () {
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('#deleteForm').attr('action', action);
        });
    });
</script>
@endpush
