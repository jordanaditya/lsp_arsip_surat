@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Arsip Surat</h1>
        <form action="/cari" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="cari" value="{{ old('cari') }}">
                <button class="btn btn-outline-secondary" type="submit" value='cari'>Search</button>
            </div>
        </form>
    </div>
    <h5>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h5>
    <h5>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h5>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Judul</th>
                <th scope="col">Waktu Pengarsipan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat as $p)
                <tr>
                    <td>{{ $p->nomor_surat }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>
                        <a href="{{ url('/lihat-surat', $p->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="{{ url('/download', $p->file) }}" class="badge bg-warning"><span data-feather="download"></span></a>
                        <a href="/hapus/{{ $p->id }}">
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')"><span
                                    data-feather="x-circle"></span></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/arsipkan-surat">
        <button type="button" class="btn btn-primary">Arsipkan Surat</button>
    </a>
@endsection
