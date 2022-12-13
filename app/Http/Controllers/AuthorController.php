<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAuthors = Author::withCount('books')->get();

        return view('authors.index', compact('allAuthors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'id' => 'required|unique:authors,id|max:13',
            'nama' => 'required|max:255',
            'umur' => 'required|integer|min:20|max:90',
            'kota' => 'required|max:255',
            'negara' => 'required|max:255'
        ]);

        Author::create($validateData);

        $request->session()->flash('success', "Successfully adding new author named {$validateData['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $allAuthors = Author::withCount('books')->get();
        return view('authors.show', compact('author', 'allAuthors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validateData = $request->validate([
            'id' => 'required|max:13',
            'nama' => 'required|max:255',
            'umur' => 'required|integer|min:20|max:90',
            'kota' => 'required|max:255',
            'negara' => 'required|max:255'
        ]);

        $author->update($validateData);

        $request->session()
            ->flash('success', "Successfully updating Author named{$validateData['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with(
            'success',
            "Successfully deleting author named {$author['nama']}!"
        );
    }
}
