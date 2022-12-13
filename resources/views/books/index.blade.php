@extends('layouts.master')
@section('title', 'Books List')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: rgb(69, 194, 194);
        }
    </style>
@endpush

@section('content')
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Books List</h2>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-success table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Judul</th>
                        <th>Halaman</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->halaman }}</td>
                            <td>{{ $book->kategori }}</td>
                            <td>{{ $book->penerbit }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
