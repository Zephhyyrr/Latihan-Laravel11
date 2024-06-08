@extends('layouts.main')
@section('content')
<div class="row mt-3">
    <div class="col-lg-8">
        <img src="/images/{{ $berita->file_upload }}" class="card-img-top" alt="{{ $berita->title }}">
            <h5 class="card-title"><a href="/berita/{{ $berita->id }}/show">{{ $berita->title }}</a></h5>
            <p class="card-text">{!! $berita->body !!}</p>
            <a href="/berita" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection
