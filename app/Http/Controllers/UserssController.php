<?php

namespace App\Http\Controllers;

use App\Models\userss;
use Illuminate\Http\Request;
use DB;
class UserssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(userss $users, $id)
    {
        return view('userdetail')->with('userArr', userss::find($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new userss();
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->phone = $request->input('phone');
        $res->address = $request->input('address');
        $res->save();
        $request->session()->flash('msg','Success! Data has been Added successfully');
        return redirect('userview');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userss  $userss
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $userArr = userss::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->get();
        } else {
            $userArr = userss::orderBy('id','desc')->get()->all();
        }
        $sum=DB::table('usersses')->count('name');
        $data = compact('userArr', 'search','sum');
        return view('userview')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userss  $userss
     * @return \Illuminate\Http\Response
     */
    public function edit(userss $users, $id)
    {
        return view('usersedit')->with('userArr', userss::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userss  $userss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userss $userss, $id)
    {
        $res = userss::find($request->id);
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->phone = $request->input('phone');
        $res->address = $request->input('address');
        $res->save();
        $request->session()->flash('msgg','Updated! Data has been updated successfully');
        return redirect('userview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userss  $userss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, userss $userss, $id)
    {
        userss::destroy(['id', $id]);
        $request->session()->flash('msggg','Deleted! Data has been Deleted successfully');
        return redirect('userview');
    }
}
