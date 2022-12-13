@extends('layouts.master')
@section('title', 'Add New Book')

@section('content')
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="container-md mx-auto" style="width: 700px;">
            <h2>Add New Book</h2>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="id">Id</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                        value="{{ old('id') }}">
                    @error('id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                        id="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="halaman">Halaman</label>
                    <input type="number" class="form-control @error('halaman') is-invalid @enderror" name="halaman"
                        id="halaman" min="10" value="{{ old('halaman') }}">
                    @error('halaman')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="halaman">kategori</label>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                        id="kategori" value="{{ old('kategori') }}">
                    @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="halaman">Penerbit</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                        id="penerbit" value="{{ old('penerbit') }}">
                    @error('penerbit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
                </div>
            </div>
        </div>
    </form>
@endsection