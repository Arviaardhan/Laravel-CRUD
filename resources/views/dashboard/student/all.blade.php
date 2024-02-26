@extends('layouts.dashboard')

@section('container')

    <style>
        .table-head {
            background-color: #200E3A !important;
            color: white !important;
        }
    </style>

    <div style="text-align: center; margin-bottom: 20px; margin-top: 5%;">
        <form action="/dashboard/student/search" method="GET">
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
    <a type="button" class="btn btn-success" href="/dashboard/student/create" style="margin-left: 180px; margin-bottom: 20px;">ADD</a>
    <div style="display: flex; align-item: center; justify-content:center;">
        @if($students->isEmpty())
            <p>Tidak ada data</p>
        @else
            <table class="table table-bordered" style="text-align: center; width: 1000px;">
                <thead>
                    <th class="table-head">NO</th>
                    <th class="table-head">NIS</th>
                    <th class="table-head">Nama</th>
                    <th class="table-head">Kelas</th>
                    <th class="table-head">Action</th>
                </thead>                
                <tbody>
                    @php
                        $no = ($students->currentPage() - 1) * $students->perPage() + 1;
                    @endphp
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <th>{{ $student->nis }}</th>
                            <td>{{ $student->nama }}</td>
                            <td>{{ $student->kelas->kelas_siswa ?? 'Tidak ada kelas' }}</td>
                            <td>
                                <a class="btn btn-info" href="/dashboard/student/detail/{{ $student->id }}"><b><i class='fas fa-info'></i></b></a>
                                <a class="btn btn-warning" href="/dashboard/student/edit/{{ $student->id }}"><b><i class='fas fa-user-edit'></i></b></a>
                                <form action="/dashboard/student/delete/{{ $student->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><b><i class='fas fa-trash'></i></b></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item {{ ($students->currentPage() == 1) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $students->lastPage(); $i++)
                <li class="page-item {{ ($students->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ ($students->currentPage() == $students->lastPage()) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $students->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
