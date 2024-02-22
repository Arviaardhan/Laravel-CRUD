@extends('layouts.dashboard')

@section('container')
    <h1 style="text-align: center; margin-bottom: 30px; margin-top: 70px;">Ini adalah halaman kelas</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 400px; text-align: center; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a type="button" class="btn btn-success" href="/dashboard/grade/create" style="margin-left: 180px; margin-bottom: 20px;">ADD</a>
<div style="display: flex; align-item: center; justify-content:center;">
    <table class="table table-bordered" style="text-align: center; width: 1000px; ">
      <thead>
          <th>NO</th>
          <th>Kelas</th>
          <th>Action</th>
      </thead>
      <tbody>
            @php
                $no = 1
            @endphp
          @foreach ($grades as $grade)
              <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $grade->kelas_siswa }}</td>
                  <td>
                    <a class="btn btn-primary" href="/dashboard/grade/detail/{{ $grade->id }}"><b>DETAIL</b></a>
                    <a class="btn btn-warning" href="/dashboard/grade/edit/{{ $grade->id }}"><b>EDIT</b></a>
                    <form action="/dashboard/grade/delete/{{ $grade->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><b>DELETE</b></button>
                    </form>
                </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>

@endsection