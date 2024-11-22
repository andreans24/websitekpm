@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-group"></i>
            </span> Edit Portfolio
        </h3>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="class col-8 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('portfolios-update', $portfolio->id) }}" class="form-sample" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                            value="{{ old('title', $portfolio->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $portfolio->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id"> Portfolio Category </label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $portfolio->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="Client"
                            value="{{ old('client', $portfolio->client) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="project_date">Project Date</label>
                        <input type="date" class="form-control" id="project_date" name="project_date"
                            value="{{ old('project_date', $portfolio->project_date) }}">
                    </div>
                    @foreach (['image1', 'image2', 'image3', 'image4'] as $imageField)
                        <div class="form-group">
                            <label> {{ ucfirst($imageField) }} </label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" name="{{ $imageField }}">
                                @if ($portfolio->$imageField)
                                    <img src="{{ asset($portfolio->$imageField) }}" alt="{{ $imageField }}"
                                        class="img-thumbnail mt-2" style="max-width: 100px;">
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Save</button>
                    <a href="{{ route('portfolios-index') }}">
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
                    uploadUrl: "{{ route('portfolio-upload') . '?_token=' . csrf_token() }}",
                }
            })
            .catch(error => {});
    </script>
@endsection
