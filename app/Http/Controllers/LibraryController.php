<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(\Auth::check()){
            $id = \Auth::user()->id;
            $library = DB::table('library')
                            ->join('books','books.id','=','library.bookId')
                            ->join('users','users.id','=','library.userId')
                            ->select('library.*','books.*')
                            ->where('library.userId','=',$id)
                            ->get();
            return view('usersBook', compact('library'));
        }
        else
            return view('loginOrRegister');
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
            $userId = \Auth::user()->id;
            $library = Library::where('userId','=',$userId)
                            ->where('bookId','=',$id)
                            ->first();
            $date = new Carbon($library->expirationDate);
            $library->expirationDate = $date->modify('+14 day')->format('Y-m-d');
            $library->status = 'Renewed';
            $library->save();
        
            return redirect()->route('show');
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
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::check()){
            $books = Book::find($id);
            $books->availableAmount = $books->availableAmount + 1;
            $books->save();
            $userId = \Auth::user()->id;
            $library = Library::where('userId','=',$userId)
                            ->where('bookId','=',$id)
                            ->first();
            
            $library->status = 'Returned';
            $library->save();
        
            return redirect()->route('show');
        }
        else
            return view('loginOrRegister');
    }
}
