@extends('layouts.app')

@section('title', 'Foto')

@section('content')

    <a class="mb-3 btn btn-success" href="{{ route('foto.create') }}">Tambah Data</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Album</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_foto as $foto)
                <tr>
                    <td>{{ $foto->nama }}</td>
                    <td>{{ $foto->album->nama }}</td>
                    <td>
                        <img src="{{ $foto->url }}" alt="foto">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('foto.show', $foto->id) }}">Lihat</a>
                        <a class="btn btn-info" href="{{ route('foto.edit', $foto->id) }}">Edit</a>
                        <form action="{{ route('foto.destroy', $foto->id) }}" method="POST">
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