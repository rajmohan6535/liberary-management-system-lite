<?php

namespace App\Http\Controllers;

use App\Book;
use App\Lend;
use Illuminate\Http\Request;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lends = Lend::with('user', 'book')->paginate();
        return view('admin.lends.lend-lists', compact('lends'))->with(['msg' => session('msg')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lends.lend-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => ['required', 'exists:books,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $lend = Lend::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'fine' => 0,
            'paid' => 0,
            'status' => 1,
            'due_date' => now()->addDays(env('DEFAULT_DUE_DATE', 10))->endOfDay()
        ]);

        return back()->with(['msg' => 'Successfully lend a book']);
//        return view()
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lend $lend
     * @return \Illuminate\Http\Response
     */
    public function show(Lend $lend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Lend $lend
     * @return \Illuminate\Http\Response
     */
    public function edit(Lend $lend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lend $lend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lend $lend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lend $lend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lend $lend)
    {
        //
    }

    public function lend(Request $request)
    {
        $this->validate($request, [
            'book_id' => ['required', 'exists:books,id'],
        ]);

        $lend = Lend::create([
            'user_id' => $request->user()->id,
            'book_id' => $request->book_id,
            'fine' => 0,
            'paid' => 0,
            'status' => 1,
            'due_date' => now()->addDays(env('DEFAULT_DUE_DATE', 10))->endOfDay()
        ]);

        return redirect()->route('myLends')->with(['msg' => 'contact admin to collect your book']);
    }

    public function lendActionSummary($action, $lendId)
    {
        switch ($action) {
            case 1:
                $lend = Lend::findOrFail($lendId);
            case 0:
                $lend = Lend::findOrFail($lendId);
        }

        return view('admin.lends.lend-summary', compact('lend', 'action'));
    }

    public function lendActions($action, $lendId)
    {
        switch ($action) {
            case 1:
                $lend = Lend::findOrFail($lendId);
                $lend->update([
                    'status' => 2,
                    'paid' => $lend->book->lend_cost,
                    'fine' => $lend->isOverdue() ? $lend->calculateFine() : 0
                ]);
                break;
            case 0:
                $lend = Lend::findOrFail($lendId);
                $lend->update([
                    'status' => 0,
                    'paid' => 0,
                    'fine' => $lend->book->price
                ]);
                break;

        }

        return redirect()->route('lends.index')->with(['msg' => 'updated']);
    }

    public function myLends()
    {
        $lends = Lend::whereUserId(auth()->id())->paginate();

        return view('lend-history', compact('lends'))->with(['msg' => session('msg')]);
    }
}
