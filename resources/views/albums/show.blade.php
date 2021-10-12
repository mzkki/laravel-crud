@extends('layouts.app')

@section('title', 'Album')


@section('content')
    <h4>Lihat Foto</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama :</td>
                <td>{{ $foto->name }}</td>
            </tr>
            <tr>
                <td>Foto :</td>
                <td><img src="{{ $foto->url }}" alt="foto"></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-light" href="{{ route('foto.index') }}">Kembali</a>
@endsection