@extends('layouts.master')
@section('title', 'Home')
@push('css_after')
    <style>
        .judul {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 34px;
        }

        .teks {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
@endpush

@section('content')

    <!DOCTYPE html>
    <div class="container text-center">
        <div>
            <p class="judul"><b>Book store</b></p>
            <br>
            <p class="teks text-wrap">we provide various kinds of books that you can read, and you can see the author who
                made the
                book. Enjoy !!
            </p>
            <img src="{{ asset('images/bookStore.jpg') }}" width="80%" height="80%">
        </div>
    </div>
@endsection
