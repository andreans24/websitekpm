@extends('layouts.dashboard')
@section('content')
{{-- Header Form --}}
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-image-area"></i>
        </span> Slider Edit
    </h3>
</div>

<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <br>
            <form class="forms-sample" action="{{ route('slider-update', $slider->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ $slider->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="5">{{ $slider->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Save</button>
                <a href="{{ route('slider-index') }}">
                    <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw">Cancel</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection