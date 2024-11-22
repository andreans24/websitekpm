@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-newspaper"></i>
            </span> Slider List
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-10
            grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('slider-create') }}">
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-sm">Create</button>
                    </a>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $s => $slider)
                                <tr>
                                    <td> {{ $s + 1 }} </td>
                                    <td>
                                        <!-- Cek jika ada gambar -->
                                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}"
                                            width="100">
                                    </td>
                                    <td>{{ $slider->title }} </td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <a href="{{ route('slider-edit', $slider->id) }}"
                                            class="btn btn-gradient-warning btn-rounded btn-sm">Edit</a>
                                        <form action="{{ route('slider-delete', $slider->id) }}" method="POST"
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
@endsection
