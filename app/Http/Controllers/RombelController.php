<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\RombelRequest;

use App\Rombel;


class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rombel::all();
        return view('admin.rombel.index',compact('data'));
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
    public function store(Request $request,RombelRequest $requests)
    {
        $validated = $requests->validated();

        Rombel::create([
            'rombel' => Str::upper($request->rombel),
        ]);

        return redirect()->route('rombels.index')->with('success','Rombel berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RombelRequest $requests)
    {
        $validated = $requests->validated();

        Rombel::where('id',$request->id)->update([
            'rombel' => Str::upper($request->rombel),
        ]);

        return redirect()->route('rombels.index')->with('success','Rombel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rombel::where('id',$id)->delete();
        return back()->with('success','Rombel berhasil dihapus!');
    }
}
