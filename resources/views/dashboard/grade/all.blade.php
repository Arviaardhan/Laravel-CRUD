@extends('layouts.dashboard')

@section('container')

    <style>
        .table-head {
            background-color: #200E3A !important;
            color: white !important;
        }
    </style>

    <div style="text-align: center; margin-bottom: 20px; margin-top: 5%;">
        <form action="/dashboard/grade/search" method="GET">
            <input type="text" name="search" placeholder="Search..." style="
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 20px;
            padding-right: 20px;">
            <button type="submit" class="btn btn-primary" style="margin-bottom: 5px"><i class='fas fa-search'></i></button>
        </form>
    </div>
    @if(session('success'))
        <div class="d-flex justify-content-center align-items-center">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 600px; text-align: center;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <a type="button" class="btn btn-success" href="/dashboard/grade/create" style="margin-left: 180px; margin-bottom: 20px;">ADD</a>
<div style="display: flex; align-item: center; justify-content:center;">
    <table class="table table-bordered" style="text-align: center; width: 1000px; ">
      <thead>
          <th class="table-head">NO</th>
          <th class="table-head">Kelas</th>
          <th class="table-head">Action</th>
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
                    <a class="btn btn-info" href="/dashboard/grade/detail/{{ $grade->id }}"><b><i class='fas fa-info'></i></b></a>
                    <a class="btn btn-warning" href="/dashboard/grade/edit/{{ $grade->id }}"><b><i class="fa fa-edit"></i></b></a>
                    <form action="/dashboard/grade/delete/{{ $grade->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><b><i class='fas fa-trash'></i></b></button>
                    </form>
                </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>

@endsection