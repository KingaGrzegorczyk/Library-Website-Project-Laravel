<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            $books = Book::orderBy('name', 'asc')->get();
            
            return view('booksSearchView', compact('books'));
        }
        else
            return view('loginOrRegister');
    }

    public function search(Request $request)
    {
        if(\Auth::check()){
            $search = $request->get('search');
            $books = Book::where('name', 'LIKE', '%'.$search.'%')->orWhere('author', 'LIKE', '%'.$search.'%')->get();
            return view('booksSearchView', compact('books'));
        }
        else
            return view('loginOrRegister'); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::check()){
            $books = Book::find($id);
            if($books->availableAmount >= 1)
            {
                $books->availableAmount = $books->availableAmount - 1;
                $books->save();
                $books = Book::orderBy('name', 'asc')->get();
                $library = new Library();
                $library->userId = \Auth::user()->id;
                $library->bookId = $id;
                $library->status = 'Borrowed';
                $library->expirationDate = Carbon::now()->addDays(14);
                $library->save();
                return view('bookAdded', compact('books'));
            }
            else
                return view('noBooks', compact('books'));
        }
        else
            return view('loginOrRegister');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
