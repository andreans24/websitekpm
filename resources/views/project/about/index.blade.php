@extends('layouts.dashboard')
@section('content')
    {{-- Header Form --}}
    <div class="page-header col-md-8">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-check"></i>
            </span> About Me
        </h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ $about ? route('about-update', $about->id) : route('about-store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($about)
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="aboutMe">About Me</label>
                        <textarea class="form-control" id="aboutMe" name="aboutMe" rows="19" {{ $about ? 'disabled' : '' }}> {{ $about->about_me ?? '' }} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="visiMisi">Visi & Misi</label>
                        <textarea class="form-control" id="visiMisi" name="visiMisi" rows="15" {{ $about ? 'disabled' : '' }}> {{ old('visiMisi', strip_tags(html_entity_decode($about->visi_misi ?? ''))) }} </textarea>

                    </div>
                    <a href="{{ route('about-index') }}" class="btn btn-gradient-dark btn-rounded btn-fw" id="backButton"
                        style="display: none;">Cancel</a>
                    @if ($about)
                        <button type="button" class="btn btn-gradient-warning btn-rounded btn-fw"
                            id="editButton">Edit</button>
                    @else
                        <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw">Create</button>
                    @endif
                    <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw" id="saveButton"
                        style="display: none;">Save</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        let editorInstance; // Menyimpan instance CKEditor
        function enableCKEditor() {
            ClassicEditor
                .create(document.querySelector('#visiMisi'))
                .then(editor => {
                    editorInstance = editor;
                    // Menyimpan konten ke textarea saat menyimpan
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#visiMisi').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }

        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('aboutMe').removeAttribute('disabled');
            document.getElementById('visiMisi').removeAttribute('disabled');
            enableCKEditor();
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('backButton').style.display = 'inline-block';
            this.style.display = 'none';

        });



        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // Hilangkan notifikasi setelah 3 detik
    </script>
@endsection
