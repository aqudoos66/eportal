@extends('admin.layouts.base')

@section('title', 'Add Trainer')

@section('content')
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <!-- Image Column -->
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>

            <!-- Form Column -->
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Add Trainer</h3>

                <!-- Show validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Form Start -->
                <form action="{{ route('trainers.store') }}" method="POST">
                    @csrf

                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') }}" required>
                        <label class="form-label" for="name">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="phone" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}" required>
                        <label class="form-label" for="phone">Phone</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="expertise" name="expertise" class="form-control form-control-lg" value="{{ old('expertise') }}" required>
                        <label class="form-label" for="expertise">Expertise</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="cnic" name="cnic" class="form-control form-control-lg" value="{{ old('cnic') }}" required>
                        <label class="form-label" for="cnic">CNIC</label>
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                        <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                    </div>
                </form>
                <!-- Form End -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
}
.card-registration .select-arrow {
    top: 13px;
}
</style>
@endsection
