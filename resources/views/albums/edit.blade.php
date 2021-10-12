@extends('layouts.app')

@section('title', 'Album')


@section('content')

    <h4>Tambah Foto</h4>
    <form action="{{ route('albums.update', $foto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <label for="nama">Nama</label>
                <input class="form-control @error('url') is-invalid  @enderror" id="nama" value="{{ $foto->nama }}"
                    type="text"  name="nama">
                @error('nama')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button class="mt-3 btn btn-primary" type="submit">Simpan</button>
    </form>

@endsection