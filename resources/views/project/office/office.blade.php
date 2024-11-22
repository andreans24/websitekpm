@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-map-marker-radius"></i>
            </span> Office Address
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
                <form action="{{ $office ? route('office-update', $office->id) : route('office-store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($office)
                        @method('PUT')
                    @endif
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="alamat" name="alamat" rows="14" {{ $office ? 'disabled' : '' }}>{{ $office->alamat ?? '' }} </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notlp" class="col-sm-3 col-form-label">No TLP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="notlp" name="notlp"
                                placeholder="Nomor Telephone" value="{{ $office->notlp ?? '' }}"
                                {{ $office ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail"
                                value="{{ $office->email ?? '' }}" {{ $office ? 'disabled' : '' }}>
                        </div>
                    </div>
                    {{-- Cek apakah data sudah ada  --}}
                    <div class="row">
                        <div class="col-sm-9 offset-sm-3">
                            <a href="{{ route('office') }}" class="btn btn-gradient-dark btn-rounded btn-fw" id="backButton"
                                style="display: none;">Back</a>
                            @if ($office)
                                <button type="button" class="btn btn-gradient-warning btn-rounded btn-fw"
                                    id="editButton">Edit</button>
                            @else
                                <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Create</button>
                            @endif
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
            // Menghapus atribut disabled untuk semua field
            document.getElementById('alamat').removeAttribute('disabled');
            document.getElementById('notlp').removeAttribute('disabled');
            document.getElementById('email').removeAttribute('disabled');

            // Tampilkan tombol Save dan Back
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('backButton').style.display = 'inline-block';

            // Sembunyikan tombol Edit
            this.style.display = 'none';
        });


        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // Hilangkan notifikasi setelah 3 detik
    </script>
@endsection
