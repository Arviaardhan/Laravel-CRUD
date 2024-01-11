@extends('layouts.main')

@section('container')
    <h1 style="text-align: center; margin-bottom: 30px;">Ini adalah halaman students</h1>
    <a type="button" class="btn btn-success" href="/student/create" style="margin-left: 150px; margin-bottom: 20px;">ADD</a>
<div style="display: flex; align-item: center; justify-content:center;">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 50%; left: 50%; max-width: 400px; text-align: center;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                  <td>{{ $student->kelas }}</td>
                  <td>
                    <a class="btn btn-primary" href="/student/detail/{{ $student->id }}">Detail</a>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection