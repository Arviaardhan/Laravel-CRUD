@extends('layouts.dashboard')

@section('container')
    <h1 style="text-align: center; margin-bottom: 30px;">Detail Siswa</h1>
    <div style="display: flex; align-items: center; justify-content: center;">
        <table class="table table-bordered" style="text-align: center; width: 600px;">
            <tr>
                <th>Kelas</th>
                <td>{{ $grade->kelas_siswa }}</td>
            </tr>
        </table>
    </div>
@endsection
