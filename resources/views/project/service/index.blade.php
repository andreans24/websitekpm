@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-group"></i>
            </span> Service List
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('service-create') }}">
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-sm">Create</button>
                    </a>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Categories</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $serv)
                                <tr>
                                    <td> {{ $serv->categorie->categories }} </td>
                                    <td> {{ $serv->title }} </td>
                                    <td class="description-ellipsis">
                                        {{ strip_tags(html_entity_decode($serv->description)) }}
                                    </td>
                                    <td> <img src="{{ asset('storage/' . $serv->images) }}"> </td>
                                    <td>
                                        <a href="{{ route('service-edit', $serv->id) }}"
                                            class="btn btn-warning btn-rounded btn-sm">Edit</a>
                                        <form action="{{ route('service-delete', $serv->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-sm">Delete</button>
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
