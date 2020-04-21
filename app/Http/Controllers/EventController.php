<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\EventRequest;

use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::latest()->paginate(20);
        return view('admin.event-list.index',compact('event'));
        
    }    

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
    public function createEvent(Request $request){                
        Event::create([
            'name' => ucwords($request->nama),
            'slug' => Str::slug($request->nama),
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success','Kegiatan berhasil dibuat!');
    }

    public function deleteEvent($id){
        Event::where('id',$id)->delete();
        return redirect()->route('index')->with('success','Event berhasil dihapus!');
    }

    public function store(Request $request,EventRequest $requests)
    {        
        // $validated = $requests->validated(); 
        
        Event::create([
            'name' => ucwords($request->name),
            'slug' => Str::slug($request->name),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('events.index')->with('success','Event berhasil dibuat!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('id',$id)->first();

        return view('admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,EventRequest $requests)
    {
        // $validated = $requests->validated();
        // dd('kjdafkjsldfjlkasj');
        Event::where('id',$request->id)->update([
            'name' => ucwords($request->name),
            'slug' => Str::slug($request->name),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('events.index')->with('success','Event berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id',$id)->delete();
        return back()->with('success','Event berhasil dihapus !');
    }

}
