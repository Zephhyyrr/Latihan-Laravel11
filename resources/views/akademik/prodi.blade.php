@extends('layouts.main')

@section('content')
    <h1>Daftar Prodi</h1>
    <table class="table table-boreder table-striped">
        <tr>
            <th>ID</th>
            <th>Nama Prodi</th>
        </tr>
        @foreach ($prd as $prodi)
            <tr>
                <td>{{$prodi->id}}</td>
                <td>{{$prodi->nama_prodi}}</td>
            </tr>

        @endforeach
    </table>
{{ $prd->links() }}
@endsection
