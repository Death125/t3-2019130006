@extends('layouts.master')
@section('title', $book->title)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $book->judul }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary ml-3">Edit</a>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                Jumlah halaman :
                {{ $book->halaman }}
            </span>
        </h5>
        <p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>Kategori : {{ $book->kategori }}</em>
                <br>
                <p class="lead">Penerbit : {{ $book->penerbit }}</p>
            </li>
        </ul>
        </p>
    </div>
@endsection