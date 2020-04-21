<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\StudentList;
use App\Student;
use App\Rayon;
use App\Rombel;

class PageController extends Controller
{

    public function index(){
        $count = Event::all()->count();
        $event = Event::latest()->paginate(4);
        $top = Event::with('list')->get();
        $list = StudentList::all();
        $getEvent = Event::all();
        
        $test = StudentList::where('id_event', 2)->count();
        $tests = StudentList::where('id_event', 1)->count();        
        // ,'max'
        return view('index',compact('count','event'));
    }

    public function admin(){
        $countStudent = Student::count();
        $countEvent = Event::count();
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        return view('layouts.pages.app',compact('countStudent','countEvent','rayon','rombel'));
    }

    public function search(Request $request){

        $count = Event::all()->count();
        $keyword = $request->keyword;
        $event = Event::where('name','like','%'. $keyword . '%')    
        ->latest()->paginate(4);

        return view('index',compact('event','count'));
    }
    
    public function listStudent($id){
        
    }

}
