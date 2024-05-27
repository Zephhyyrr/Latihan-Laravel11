@extends('layouts.main')

@section('content')
<h1>Daftar Mahasiswa</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Prodi</th>
        <th>Alamat</th>
    </tr>
    @foreach ($mhs as $mahasiswa)
        <tr>
            <td>{{ $mhs->firstItem() + $loop->index }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama_lengkap }}</td>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
            <td>{{ $mahasiswa->tgl_lahir }}</td>
            <td>{{ $mahasiswa->email }}</td>
            <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
            <td>{{ $mahasiswa->alamat }}</td>
        </tr>
    @endforeach
</table>
{{ $mhs->links() }}
@endsection
