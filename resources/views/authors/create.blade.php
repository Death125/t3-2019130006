@extends('layouts.master')
@section('title', 'Add New Author')

@section('content')
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="container-md mx-auto" style="width: 700px;">
            <h2>Add New Author</h2>

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
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur"
                        id="umur" min="10" value="{{ old('umur') }}">
                    @error('umur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota"
                        id="kota" value="{{ old('kota') }}">
                    @error('kota')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="negara">Negara</label>
                    <input type="text" class="form-control @error('negara') is-invalid @enderror" name="negara"
                        id="negara" value="{{ old('negara') }}">
                    @error('negara')
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
