<h4>detail foto</h4>

<table border="1">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Foto</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $foto->nama }}</td>
            <td>
                <img src="{{ $foto->url }}" alt="foto">
            </td>
        </tr>
    </tbody>
</table>

<a href="{{ route('foto.index') }}">kembali</a>