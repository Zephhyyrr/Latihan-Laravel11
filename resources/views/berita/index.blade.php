@extends('layouts.main')

@section('content')
    <h1>Berita Terbaru</h1>
    <div class="row">
        @foreach ($beritas as $berita)
        <div class="col-md-4">
            <div class="card">
                <img src="/images/{{ $berita->file_upload }}" class="card-img-top" alt="{{ $berita->title }}">
                <div class="card-body">
                    <h5 class="card-title"><a href="/berita/{{ $berita->id }}/show">{{ $berita->title }}</a></h5>
                    <p style="font-size: 11">Kategori Teknologi Dibuat oleh : Admin</p>
                    <p class="card-text" style="height: 100px; overflow: hidden;">{{ $berita->excerpt }}</p>
                    <a href="/berita/{{ $berita->id }}" class="btn btn-primary">Readmore</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
{{ $beritas->links() }}
@endsection
