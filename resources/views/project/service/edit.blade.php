@extends('layouts.dashboard')
@section('content')
{{-- Header Form --}}
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-group"></i>
        </span> Edit Service
    </h3>
</div>

<div class="col-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('serv') }}">
                    <button type="button" class="btn btn-gradient-primary btn-sm">Back</button>
                </a>
            </div>
            <br>
            <form class="forms-sample" action="{{ route('service-update', $service->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="categorie_id">Category Id</label>
                    <select class="form-select" id="categorie_id" name="categorie_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $service->categorie_id ? 'selected' :
                            ''}} data-slug="{{ $category->slug }}">
                            {{ $category->categories }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                        value="{{ $service->slug }}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Title"
                        value="{{ $service->title }}">
                </div>
                <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="images" class="file-upload-default form-control">
                    <div id="imagePreview" style="margin-top: 10px;">
                        @if ($service->images)
                        <img id="previewImage" src="{{ asset($service->images) }}" alt="Current Image"
                            style="max-width: 200px;" />
                        @else
                        <p>No image uploaded</p>
                        @endif
                    </div>
                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="images">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="5">{{ $service->description }} </textarea>
                </div>
                <button type="submit" class="btn btn-gradient-success btn-fw">Update</button>
                <a href="{{ route('serv') }}">
                    <button class="btn btn-light">Cancel</button>
                </a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .catch(error => {});
            // Populate slug based on selected category
            document.getElementById('categorie_id').addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const slug = selectedOption.getAttribute('data-slug');
                document.getElementById('slug').value = slug;
            });
</script>
@endsection