@extends('layouts.app')

@section('title', 'Album')

@section('content')

    <a class="mb-3 btn btn-success" href="{{ route('albums.create') }}">Tambah Data</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Album</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($albums as $album)
                <tr>
                    <td>{{ $album->nama }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('albums.show', $album->id) }}">Lihat</a>
                        <a class="btn btn-info" href="{{ route('albums.edit', $album->id) }}">Edit</a>
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Data tidak ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection