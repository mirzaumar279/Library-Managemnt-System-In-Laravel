<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\userss;
use App\Models\book;
use Illuminate\Validation\ValidationException;
use DB;
use DateTime;
use Arr;
class CustomerController extends Controller
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
        $users = userss::get();
        $book = book::get();
        return view('add', compact('users','book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = userss::findOrFail($request->user_id);
        $book = book::findOrFail($request->book_id);
        //date
        $start = $request->start;
        $end = $request->end;
        $datetime1 = new DateTime($start);
        $datetime2 = new DateTime($end);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        //------
        if ($book->quantity === 0)
        {
            throw ValidationException::withMessages([ 'book' => 'Error! No books are available' ]);
            
        }


        if (customer::where('name', $user->name)->where('status', 'Given')->exists())
        {
            throw ValidationException::withMessages([ 'book' => "Error! {$user->name} you have already a book" ]);
        }

        if (customer::where('name', $user->name)->where('title', $book->title)->where('status', 'Given')->exists())
        {
            throw ValidationException::withMessages([ 'book' => 'Already Checked Out' ]);
        }

        $book->decrement('quantity', 1);
        $ress = new customer();
        $ress->name = $user->name;
        $ress->title = $book->title;
        $ress->start = $request->input('start');
        $ress->end = $request->input('end');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/issueimage/', $filename);
            $ress->image = $filename;
        }
        $ress->save();
        $request->session()->flash('msgg','Success! This Book has been issued to ' .$user->name.' whose Id is ' .$user->id.' You have '.$days.' days to return it');
        return redirect('view');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        $book = DB::table('books')->select('image')->get();
        $customer = customer::get();
        // $arr=[];
        // array_push($arr,$book);
        // array_push($arr,$customer);
        // $mix=Arr::flatten($arr);
        // dd($arr);
        return view('view', ['showArr' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        return view('edit')->with('showArr', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        $book = book::where('title', $customer->title)->firstOrFail();
     
        $customer->status = $request->input('status');
        $customer->save();
        $book->increment('quantity', 1);
        $request->session()->flash('msggg','Updated! Data has been updated successfully');
        return redirect('view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, customer $customer, $id)
    {
        customer::destroy(['id', $id]);
        $request->session()->flash('msgggg','Deleted! Data has been Deleted successfully');
        return redirect('view');
    }
}