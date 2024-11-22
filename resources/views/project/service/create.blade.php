@extends('layouts.dashboard')
@section('content')
    {{-- Header Form --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-image-area"></i>
            </span> Create Service
        </h3>
    </div>

    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <br>
                <form class="forms-sample" action="{{ route('service-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categorie_id">Category Id</label>
                        <select class="form-select" id="categorie_id" name="categorie_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->categories }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="images" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" name="images">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Submit</button>
                    <a href="{{ route('serv') }}">
                        <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <style>
        .ck-editor__editable {
            min-height: 300px;
            /* Atur tinggi minimal sesuai kebutuhan */
            width: 100%;
            /* Atur lebar sesuai kebutuhan */
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .catch(error => {});
    </script>
@endsection
