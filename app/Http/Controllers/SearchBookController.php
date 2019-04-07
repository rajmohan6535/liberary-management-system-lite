<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrowers;
use App\Borrows;
use Illuminate\Http\Request;

class SearchBookController extends Controller
{
    public function search(Request $request)
    {
//        dd($request->all());

        $books = Book::when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%$request->search%")
                ->orWhere('author', 'LIKE', "%$request->search%");
        })->paginate();

        return view('search', compact('books'));
    }

    public function lend(Request $request)
    {

        Borrowers::updateOrCreate(
            [
                'id' => auth()->id()
            ],
            [

            ]
        );
        $this->validate($request, array(
            'book_id' => 'required|numeric|exists:books,id',
            'borrower_id' => 'required|numeric|exists:borrowers,id',
        ));

        $borrow = new Borrows();
        $borrow->book_id = $request->book_id;
        $borrow->borrower_id = $request->borrower_id;
        $borrow->lost = false;
        $borrow->cleared = false;
        $borrow->save();
    }
}
