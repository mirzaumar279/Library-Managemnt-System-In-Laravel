<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(book $book, $id)
    {
        return view('bookdetail')->with('bookArr', book::find($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $number = mt_rand(1000000000,9999999999);
        // if($this->barcode($number))
        // {
        //     $number = mt_rand(1000000000,9999999999);
        // }
        // $request['barcode']=$number;
        // dd($number);
        // book::create($request->barcode);
        $res = new book();
        $res->title = $request->input('title');
        $res->author = $request->input('author');
        $res->description = $request->input('description');
        $res->category = $request->input('category');
        $res->quantity = $request->input('quantity');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/bookimage/', $filename);
            $res->image = $filename;
        }
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('bookview');
    }
// public function barcode($number)
// {
//     return book::wherebarcode($number)->exists();
// }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $bookArr = book::where('title', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%")
                ->get();
        } else {
            $bookArr = book::orderBy('id','desc')->get()->all();
        }
        $sum=DB::table('books')->count('title');
        $data = compact('bookArr', 'search','sum');
        return view('bookview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book, $id)
    {
        return view('bookedit')->with('bookArr', book::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book, $id)
    {
        $res = book::find($request->id);
        $res->title = $request->input('title');
        $res->author = $request->input('author');
        $res->description = $request->input('description');
        $res->category = $request->input('category');
        $res->quantity = $request->input('quantity');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/bookimage/', $filename);
            $res->image = $filename;
        }
        $res->save();
        $request->session()->flash('msgg','Updated! Data has been updated successfully');
        return redirect('bookview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, book $book, $id)
    {
        book::destroy(['id', $id]);
        $request->session()->flash('msggg','Deleted! Data has been Deleted successfully');
        return redirect('bookview');
    }
}
