@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-box"></i>
            </span> Profile
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile-update', $profile->id) }}" method="POST" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @method('PUT')

                    @if ($profile->image)
                        <img src="{{ asset('images/' . $profile->image) }}" alt="Profile Image"
                            style="width: 150px; hight: 150px; object-fit: cover;">
                    @endif
                    <input id="image-upload" type="file" name="image" class="form-control mt-2">

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="{{ $profile->name }}" disabled>
                        </div>

                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ $profile->email }}" disabled>
                        </div>

                        <label for="unitkerja" class="col-sm-3 col-form-label">Unit Kerja</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="unitkerja" name="unitkerja"
                                placeholder="Unit Kerja" value="{{ $profile->unitkerja }}" disabled>
                        </div>

                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" disabled>
                        </div>
                    </div>
                    {{-- Cek apakah data sudah ada  --}}
                    <div class="row">
                        <div class="col-sm-9 offset-sm-3">
                            <a href="{{ route('profile') }}" class="btn btn-gradient-dark btn-rounded btn-fw"
                                id="backButton" style="display: none;">Back</a>
                            <button type="button" class="btn btn-gradient-warning btn-rounded btn-fw"
                                id="editButton">Edit</button>
                            <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw" id="saveButton"
                                style="display: none;">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('name').removeAttribute('disabled');
            document.getElementById('email').removeAttribute('disabled');
            document.getElementById('unitkerja').removeAttribute('disabled');
            document.getElementById('password').removeAttribute('disabled');
            document.getElementById('image-upload').removeAttribute('disabled');

            document.getElementById('saveButton').style.display = 'inline-block'; // Tampilkan tombol Save
            document.getElementById('backButton').style.display = 'inline-block'; // Tampilkan tombol Back
            this.style.display = 'none'; // Sembunyikan tombol Edit
        });


        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // Hilangkan notifikasi setelah 3 detik
    </script>
@endsection
