@extends('layouts.dashboard')

@section('container')

    <div class="container mt-5">    
    <form method="post" action="/dashboard/grade/update/{{ $grade->id }}">
        @csrf
        <div class="form-group">
            <label for="kelas" style="margin-bottom: 15px; margin-top: 25px;">Kelas</label>
            <input type="text" class="form-control" id="kelas_siswa" placeholder="Masukkan Kelas" name="kelas_siswa" value="{{ old('kelas_siswa', $grade->kelas_siswa)}}" required>
        </div>
        <button type="submit" class="btn btn-warning" style="margin-top: 20px"><b>EDIT</b></button>
        <a type="button" class="btn btn-secondary" style="margin-top: 20px; margin-left: 20px;" onclick="kembali()">Kembali</a>
    </form>
    </div>

    <script>
        function kembali() {
            if (confirm('Apakah Anda ingin kembali?')) {
                window.location.href = '/dashboard/grade/all'; 
            }
        }
    </script>

@endsection
