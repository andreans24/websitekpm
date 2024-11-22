@extends('layouts.dashboard')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-newspaper"></i>
        </span> News List
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
                <a href="{{ route('news-create') }}">
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm">Create</button>
                </a>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $i => $item)
                        <tr>
                            <td> {{ $i + 1 }} </td>
                            <td> {{ $item->title }}</td>
                            <td>{!! Str::limit(htmlspecialchars_decode(strip_tags($item->description))) !!} </td>
                            <td>
                                @if ($item->image)
                                <!-- Cek jika ada gambar -->
                                <img src="{{ asset($item->image) }}" alt="Image" width="100">
                                <!-- Menampilkan gambar -->
                                @else
                                No Image
                                <!-- Menampilkan keterangan jika tidak ada gambar -->
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('news-edit', $item->id) }}"
                                    class="btn btn-gradient-warning btn-rounded btn-sm">Edit</a>
                                <form action="{{ route('news-delete', $item->id) }}" method="POST"
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