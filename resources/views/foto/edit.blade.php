@extends('layouts.app')

@section('title', 'Page Foto')

@section('content')

<h4>edit foto</h4>
<form action="{{ route('foto.update', $foto->id) }}" method="post">
    @csrf
    @method('put')

    <label for="nama">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $foto->nama }}" name="nama" id="nama">
    @error('nama')
        <span class="text-sm text-danger">
            {{$message}}
        </span>
    @enderror
    <label for="url">URL</label>
    <input type="text" class="form-control @error('url') is-invalid @enderror" value="{{ $foto->url }}" name="url" id="url">
    @error('url')
        <span class="text-sm text-danger">
            {{$message}}
        </span>
    @enderror
    <button class="btn btn-primary" type="submit">ubah</button>

</form>
<a class="btn btn-warning" href="{{ route('foto.index') }}">kembali</a>
@endsection