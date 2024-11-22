@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-group"></i>
            </span> Create Team
        </h3>
    </div>
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('team-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-sm-3 col-form-label">Position</label>
                                        <div class="col-sm-9">
                                            <input type="position" class="form-control" id="position" name="position"
                                                placeholder="Position">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="social_media_1" class="col-sm-3 col-form-label">
                                            <i class="bi bi-facebook social-icon"></i>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="social_media_1"
                                                name="social_media_1" placeholder="URL Facebook">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="social_media_2" class="col-sm-3 col-form-label">
                                            <i class="bi bi-instagram social-icon"></i> <!-- Instagram Icon lebih besar -->
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="social_media_2"
                                                name="social_media_2" placeholder="URL Instagram">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="social_media_3" class="col-sm-3 col-form-label">
                                            <i class="bi bi-linkedin social-icon"></i> <!-- LinkedIn Icon lebih besar -->
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="social_media_3"
                                                name="social_media_3" placeholder="URL LinkedIn">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="social_media_4" class="col-sm-3 col-form-label">
                                            <i class="bi bi-twitter social-icon"></i> <!-- LinkedIn Icon lebih besar -->
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="social_media_4"
                                                name="social_media_4" placeholder="URL LinkedIn">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="image" class="col-sm-5 col-form-label">Upload Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Save</button>
                                    <a href="{{ route('team-index') }}">
                                        <button type="button"
                                            class="btn btn-gradient-dark btn-rounded btn-fw">Cancel</button>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
