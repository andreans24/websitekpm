@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-group"></i>
            </span> Edit Team
        </h3>
    </div>

    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('team-update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $team->name) }}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="position" class="col-sm-3 col-form-label">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="{{ old('position', $team->position) }}" placeholder="Position">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="social_media_1" class="col-sm-3 col-form-label">
                                        <i class="bi bi-facebook social-icon"></i>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="social_media_1" name="social_media_1"
                                            value="{{ old('social_media_1', $team->social_media_1) }}"
                                            placeholder="URL Facebook">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="social_media_2" class="col-sm-3 col-form-label">
                                        <i class="bi bi-instagram social-icon"></i>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="social_media_2" name="social_media_2"
                                            value="{{ old('social_media_2', $team->social_media_2) }}"
                                            placeholder="URL Instagram">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="social_media_3" class="col-sm-3 col-form-label">
                                        <i class="bi bi-linkedin social-icon"></i>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="social_media_3" name="social_media_3"
                                            value="{{ old('social_media_3', $team->social_media_3) }}"
                                            placeholder="URL LinkedIn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="social_media_4" class="col-sm-3 col-form-label">
                                        <i class="bi bi-twitter social-icon"></i>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="social_media_4" name="social_media_4"
                                            value="{{ old('social_media_4', $team->social_media_4) }}"
                                            placeholder="URL Twitter">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-5 col-form-label">Upload Foto</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($team->image)
                                            <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                                width="100">
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-info btn-rounded btn-fw">Update</button>
                                <a href="{{ route('team-index') }}">
                                    <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
