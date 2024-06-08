@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Entri Berita</h1>
    </div>
    <div class="col-lg-6 mb-5">

        <form method="POST" action="/dashboard-berita" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">

                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="file_upload" class="form-label">File Upload</label>

                <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">

                <input type="file" class="form-control @error('file_upload') is-invalid @enderror" name="file_upload"
                    id="file_upload">
                @error('file_upload')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id">
                    @foreach ($kategoris as $kategori)
                        @if (old('kategori_id') == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                        @else
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="mb-2">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script>
            const input = document.getElementById('file_upload');
            const previewPhoto = () => {
                const file = input.files;
                if (file) {
                    const fileReader = new FileReader();
                    const preview = document.getElementById('file-preview');
                    fileReader.onload = function(event) {
                        preview.setAttribute('src', event.target.result);
                    }
                    fileReader.readAsDataURL(file[0]);
                }
            }
            input.addEventListener("change", previewPhoto);
        </script>
    </div>
@endsection
