@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-group"></i>
            </span> Portfolio List
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('portfolios-create') }}">
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
                                <th>Client</th>
                                <th>Project Date</th>
                                <th>Images 1</th>
                                <th>Images 2</th>
                                <th>Images 3</th>
                                <th>Images 4</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $key => $portfolio)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $portfolio->title }} </td>
                                    <td class="description-ellipsis">
                                        {{ strip_tags(html_entity_decode($portfolio->description)) }} </td>
                                    <td>{{ $portfolio->client }} </td>
                                    <td>{{ $portfolio->project_date }} </td>
                                    <td class="description-ellipsis"><img src="{{ asset($portfolio->image1) }}"
                                            alt="Image 1"> </td>
                                    <td class="description-ellipsis"><img src="{{ asset($portfolio->image2) }}"
                                            alt="Image 2"> </td>
                                    <td class="description-ellipsis"><img src="{{ asset($portfolio->image3) }}"
                                            alt="Image 3"> </td>
                                    <td class="description-ellipsis"><img src="{{ asset($portfolio->image4) }}"
                                            alt="Image 4"> </td>
                                    <td>
                                        <a href="{{ route('portfolios-edit', $portfolio->id) }}"
                                            class="btn btn-warning btn-rounded btn-sm">Edit</a>
                                        <form action="{{ route('portfolios-delete', $portfolio->id) }}" method="POST"
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
