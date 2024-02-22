@extends('layouts.dashboard')

@section('container')
    <h1 style="text-align: center; margin-bottom: 30px; margin-top: 70px;">Detail Siswa</h1>
    <div style="display: flex; align-items: center; justify-content: center;">
        <table class="table table-bordered" style="text-align: center; width: 600px;">
            <tr>
                <th>NIS</th>
                <td>{{ $student->nis }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $student->nama }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $student->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $student->kelas->kelas_siswa }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $student->alamat }}</td>
            </tr>
        </table>
    </div>
@endsection
