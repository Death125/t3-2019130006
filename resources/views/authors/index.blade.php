@extends('layouts.master')
@section('title', 'Author List')

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
                        <h2>Author List</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('authors.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Author</span>
                        </a>
                    </div>
                </div>
            </div>


            <table style="table-layout: fixed;width: 100%" class="table table-striped table-success table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Kota</th>
                        <th>Negara</th>
                        <th style="width: 40%; word-wrap: break-word">Books</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allAuthors as $author)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a class="text" href="{{ route('authors.show', $author->id) }}">
                                    {{ $author->id }}
                                </a>
                            </td>
                            <td>{{ $author->nama }}</td>
                            <td>{{ $author->umur }}</td>
                            <td>{{ $author->kota }}</td>
                            <td>{{ $author->negara }}</td>
                            <td>
                                <ul>
                                    @if ($author->books_count > 0)
                                        <p>Total Books : {{ $author->books_count }}</p>
                                    @else
                                        <p>Author tidak memiliki buku</p>
                                    @endif



                                    @foreach ($author->books as $book)
                                        @if ($book->halaman > 10)
                                            <li>{{ $book->judul }}</li>
                                        @endif
                                    @endforeach

                                </ul>
                            </td>
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
