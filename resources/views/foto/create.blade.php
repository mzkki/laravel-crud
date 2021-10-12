@extends('layouts.app')

@section('title', 'Foto')

@section('content')

    <h4>Tambah Foto</h4>
    <form action="{{ route('foto.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label for="nama">Nama</label>
                <input class="form-control @error('nama') is-invalid  @enderror" id="nama" type="text" name="nama">
                @error('nama')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="url">Url</label>
                <input class="form-control @error('url') is-invalid  @enderror" id="url" type="text" name="url">
                @error('url')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="album_id">Album</label>
                <select name="album_id" class="form-control" id="album_id">
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->nama }}</option>
                    @endforeach
                </select>
                @error('album_id')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button class="mt-3 btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection