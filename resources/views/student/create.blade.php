@extends('layouts.main')

@section('container')

    <div class="container mt-5">    
    <form method="post" action="/student/add">
        @csrf

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label for="nis" style="margin-bottom: 15px; margin-top: 25px;">NIS</label>
            <input type="number" class="form-control" id="nis" placeholder="Masukkan NIS" name="nis" value="{{ old('nis') }}" required>
        </div>

        @error('nis')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="nama" style="margin-bottom: 15px; margin-top: 25px;">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir" style="margin-bottom: 15px; margin-top: 25px;">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        </div>
        <div class="form-group">
            <label for="kelas" style="margin-bottom: 15px; margin-top: 25px;">Kelas</label>
            <select class="form-select" name="kelas_id">
                @foreach ($grades as $grade)
                    <option name="kelas_id" value="{{ $grade->id }}">{{ $grade->kelas_siswa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat" style="margin-bottom: 15px; margin-top: 25px;">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}" required>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Add</button>
        <a type="button" class="btn btn-secondary" style="margin-top: 20px; margin-left: 20px;" onclick="kembali()">Kembali</a>
    </form>
    </div>

    <script>
        function kembali() {
            if (confirm('Apakah Anda ingin kembali?')) {
                window.location.href = '/student/all'; 
            }
        }
    </script>

@endsection
