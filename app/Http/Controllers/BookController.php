<?php

namespace App\Http\Controllers;

use App\Book;
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
        $books = Book::paginate(1);
        return view('admin.books.book-lists', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.book-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'number_of_copies' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'lend_cost' => ['required', 'numeric'],
        ]);

        Book::create($request->input());

        return back()->with(['msg' => 'Book added successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit-book-form', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'number_of_copies' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'lend_cost' => ['required', 'numeric'],
        ]);

        $book->update($request->input());

        return back()->with(['msg' => 'Book updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->lendBooks()->forceDelete();
        $book->forceDelete();

        return redirect()->route('books.index');
    }
}
