@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-crop-rotate"></i>
            </span> Team List
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('team-create') }}">
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-sm">Create</button>
                    </a>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>LinkedIn</th>
                                <th>X twitter</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key => $team)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $team->name }} </td>
                                    <td> {{ $team->position }} </td>
                                    <td>{{ $team->social_media_1 }} </td>
                                    <td>{{ $team->social_media_2 }} </td>
                                    <td>{{ $team->social_media_3 }} </td>
                                    <td>{{ $team->social_media_4 }} </td>
                                    <td>{{ $team->image }} </td>
                                    <td>
                                        <a href="{{ route('team-edit', $team->id) }}"
                                            class="btn btn-gradient-warning btn-rounded btn-sm">Edit</a>
                                        <form action="{{ route('team-delete', $team->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
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
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // Hilangkan notifikasi setelah 3 detik
    </script>
@endsection
