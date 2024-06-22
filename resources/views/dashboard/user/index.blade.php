@extends('dashboard.layouts.main')
@section('title', 'Dashboard Mahasiswa')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar User</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-primary" role="alert">
            {{ session('pesan') }}
        </div>
    @endif

    <a href="/dashboard-user/create" class="btn btn-primary mb-3"><i class="bi bi-person-fill-add"></i>Create Prodi</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/updateStatus/{{$user->id}}" onclick="return confirm('Apakah anda ingin ganti status user?')">
                        <span class="badge {{ $user->status == 'aktif' ? 'text-bg-success rounded-3' : 'text-bg-light rounded-3' }}" id="status">
                            {{ $user->status  == 'aktif' ? 'Aktif' : 'Disable' }}
                        </span>
                    </a>
                </td>
                <td>
                    <a href="/dashboard-user/{{ $user->id }}/edit" class="btn btn-success btn-sm"><i
                            class="bi bi-pencil-fill"></i>Edit</a>
                    {{-- <a href="" class="btn btn-danger btn-sm">Hapus</a> --}}
                    <form action="dashboard-prodi/{{ $user->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm d-inline"
                            onclick="return confirm('Yakin akan menghapus data')"><i
                                class="bi bi-trash3-fill"></i>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection
