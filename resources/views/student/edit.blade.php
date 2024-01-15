@extends('layouts.main')

@section('container')

    <div class="container mt-5">    
    <form method="post" action="/student/update/{{ $student->id }}">
        @csrf
        <div class="form-group">
            <label for="nis" style="margin-bottom: 15px; margin-top: 25px;">NIS</label>
            <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS" name="nis" value="{{ old('nis', $student->nis) }}" readonly required>
        </div>
        <div class="form-group">
            <label for="nama" style="margin-bottom: 15px; margin-top: 25px;">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ old('nama', $student->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir" style="margin-bottom: 15px; margin-top: 25px;">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        </div>
        <div class="form-group">
            <label for="kelas" style="margin-bottom: 15px; margin-top: 25px;">Kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="Masukkan Kelas" name="kelas" value="{{ old('kelas', $student->kelas) }}" required>
        </div>
        <div class="form-group">
            <label for="alamat" style="margin-bottom: 15px; margin-top: 25px;">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat', $student->alamat) }}" required>
        </div>
        <button type="submit" class="btn btn-warning" style="margin-top: 20px">Edit</button>
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
