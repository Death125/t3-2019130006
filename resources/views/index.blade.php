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
            <img src="{{ asset('images/bookStore.jpg') }}" width="60%" height="70%">
            <br>
            <br>
            <p class="teks text-wrap">We provide various kinds of books with different genres that you can read, starting
                from romance, horror, adventure and many others. You can also see the author who created the book. Enjoy !!
            </p>
        </div>
    </div>
@endsection
