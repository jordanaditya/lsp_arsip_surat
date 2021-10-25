@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Arsip Surat >> Unggah</h1>
    </div>
    <h5>Unggah surat yang telah terbit pada form ini untuk diarsipkan</h5>
    <h5>Catatan : </h5>
    <ul>
        <li>
            <h5>Gunakan file berformat PDF</h5>
        </li>
    </ul>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-8">
        <form method="post" action="/update-surat/{{ $surat->id }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- title form --}}
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat"
                    name="nomor_surat" required autofocus value="{{ old('nomor_surat') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- category form --}}
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option value="Undangan" selected>Undangan</option>
                    <option value="Pengumuman" selected>Pengumuman</option>
                    <option value="Nota Dinas" selected>Nota Dinas</option>
                    <option value="Pemberitahuan" selected>Pemberitahuan</option>
                </select>
            </div>
            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    required autofocus value="{{ old('judul') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Upload PDF --}}
            <div class="mb-3">
                <label for="file" class="form-label">File Surat PDF</label>
                <img id="output" src="" class="mb-3 col-sm-5 d-block">
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"
                    accept="file/*">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
