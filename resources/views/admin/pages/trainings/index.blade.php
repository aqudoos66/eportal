@extends('admin.layouts.base')

@section('title', 'Trainings')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Trainings</h1>
        <a href="{{ route('admin.trainings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Training
        </a>
    </div>

    <p class="mb-4">
        This table displays the list of trainings with their details.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trainings</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration (days)</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $training->title }}</td>
                                <td>{{ Str::limit($training->description, 50) }}</td>
                                <td>{{ $training->duration }}</td>
                                <td>{{ \Carbon\Carbon::parse($training->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($training->end_date)->format('d M Y') }}</td>
                                <td>{{ ucfirst($training->type) }}</td>
                                <td class="text-center">
                                    <!-- View button -->
                                    <a href="{{ route('admin.trainings.show', $training->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Delete button triggers modal -->
                                    <button 
                                        class="btn btn-sm btn-danger" 
                                        title="Delete" 
                                        data-toggle="modal" 
                                        data-target="#deleteModal" 
                                        data-action="{{ route('admin.trainings.destroy', $training->id) }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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
                Are you sure you want to delete this training?
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

@section('scripts')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action');
        var modal = $(this);
        modal.find('#deleteForm').attr('action', action);
    });
</script>
@endsection
