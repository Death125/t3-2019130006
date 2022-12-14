<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\support\facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::has('books')->get();
        return view('books.index', compact('books', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorId = DB::table('authors')->select('id')->get();
        $author = Author::all();
        return view('books.create', compact('author', 'authorId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|unique:books,id|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:10|max:999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required',
        ]);

        Book::create($validateData);

        $request->session()->flash('success', "Successfully adding {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $authors = Author::has('books')->get();
        return view('books.show', compact('book', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $author = Author::all();
        return view('books.edit', compact('book', 'author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'id' => 'required|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:10|max:999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required',
        ]);

        $book->update($validateData);

        $request->session()
            ->flash('success', "Successfully updating {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with(
            'success',
            "Successfully deleting {$book['judul']}!"
        );
    }
}
