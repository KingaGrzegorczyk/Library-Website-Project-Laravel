<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            $id = \Auth::user()->id;
            $users = User::where('id', $id)->get();
            return view('usersData', compact('users'));
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
        $id = \Auth::user()->id;
        $users = User::where('id', $id)->get();
        return view('dataChanged', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = \Auth::user()->id;
        $users = User::find($id);
        if(Hash::check($request->oldPassword, $users->password))
        {   
            if($request->newPassword1==$request->newPassword2)
            {
                $users->password = Hash::make($request->newPassword1);
            }
            else 
                return view('differentPasswords', compact('users'));
        
            if($users->save()) 
            { 
                return redirect()->route('showUpdate'); 
            }
            else
                return view('error', compact('users'));
       
        }
        else 
            return view('wrongPassword', compact('users'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(\Auth::check()){
            $id = \Auth::user()->id;
            $users = User::find($id);
            if(Hash::check($request->password, $users->password))
            {
                $users->name = $request->name; 
                $users->email = $request->email; 
            
                if($users->save()) 
                { 
                    return redirect()->route('showUpdate'); 
                }
                else
                    return view('error');
        
            }
            else 
                return view('wrongPassword', compact('users'));
        }
        else
            return view('loginOrRegister');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if(\Auth::check()){
            $id = \Auth::user()->id;
            $library = Library::where(function($query){
                $query->where('status', 'Borrowed')
                        ->orWhere('status', 'Renewed');
            })
            ->where('userId',$id)
            ->first();
            if($library == "")
            {
                $user = User::where('id',$id);
                $library = $library = Library::where('userId', $id);
                $user->delete();
                $library->delete();
                return view('accountDeleted', compact('library'));
            }
            else
            {
                return view('returnBooks', compact('library'));
            }
        }
        else
            view('loginOrRegister');
    }
}
