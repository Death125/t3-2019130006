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
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Books List</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('books.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Book</span>
                        </a>
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
                        <th>Author</th>
                        <th>Author ID</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a class="text" href="{{ route('books.show', $book->id) }}">
                                    {{ $book->id }}
                                </a>
                            </td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->halaman }}</td>
                            <td>{{ $book->kategori }}</td>
                            <td>{{ $book->penerbit }}</td>
                            @foreach ($authors as $author)
                                @if ($book->author_id == $author->id)
                                    <td>{{ $author->nama }}</td>
                                @endif
                            @endforeach
                            <td>{{ $book->author_id }}</td>
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
