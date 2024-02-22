@extends('layouts.main')

@section('container')
    <h1 style="text-align: center; margin-bottom: 50px;">Ini adalah halaman students</h1>
    {{-- <a type="button" class="btn btn-success" href="/student/create" style="margin-left: 150px; margin-bottom: 20px;">ADD</a> --}}
<div style="display: flex; align-item: center; justify-content:center;">


    <table class="table table-bordered" style="text-align: center; width: 1000px; ">

      <thead>
          <th>NO</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Action</th>
      </thead>
      <tbody>
            @php
                $no = 1
            @endphp
          @foreach ($students as $student)
              <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <th>{{ $student->nis }}</th>
                  <td>{{ $student->nama }}</td>
                  <td>{{ $student->kelas->kelas_siswa ?? 'Tidak ada kelas' }}</td>
                  <td>
                    <a class="btn btn-primary" href="/student/detail/{{ $student->id }}"><b>DETAIL</b></a>
                </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>

@endsection