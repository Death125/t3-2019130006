@extends('layouts.master')
@section('title', $author->title)

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $author->nama }}</h2>
            </div>

            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3 confirmation">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <p class="lead">Kota : {{ $author->kota }}</p>
        <p class="lead">Negara : {{ $author->negara }}</p>
        <p class="lead">Umur : {{ $author->umur }}</p>

        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                Jumlah Buku :
                @forelse ($allAuthors as $authors)
                    @if ($authors->id == $author->id)
                        {{ $authors->books_count }}
                    @endif
                @empty
                @endforelse
            </span>
        </h5>


        <ul>
            @forelse ($allAuthors as $authors)
                @if ($authors->id == $author->id)
                    @foreach ($author->books as $book)
                        @if ($book->halaman > 10)
                            <li>{{ $book->judul }}</li>
                        @else
                        @endif
                    @endforeach
                @endif
            @empty
            @endforelse
        </ul>
    </div>

@endsection

@push('js_after')
    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function(e) {
            if (!confirm('Are you sure want to delete this author?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
@endpush
