<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentList;
use App\Student;
use App\Event;

class StudentListController extends Controller
{
    public function detail($id,$slug){
        $event = Event::where('id',$id)->first();
        
        $student = StudentList::with('student')->latest()->paginate(20);
        
        // $get = Event::all();
        
            $list = StudentList::where('id_event',$id)->get();
            $count = StudentList::where('id_event',$id)->count();
        
        // $tampung[] = $list;
        // return response()->json([
        //     $event,$student,$list,$count
        // ]);
        return view('home.student-list',compact('event','list','student','count'));
    }

    public function jsonDetail($id,$slug){
        $event = Event::where('id',$id)->first();
        
        $student = StudentList::with('student')->latest()->paginate(20);
        
        // $get = Event::all();
        
            $list = StudentList::with('Student.Rombel')->where('id_event',$id)->get();
            $count = StudentList::where('id_event',$id)->count();
        
        return response()->json([
            $list
        ]);
        // return view('home.student-list',compact('event','list','student','count'));
    }

    public function adminDetail($id,$slug){
        $event = Event::where('id',$id)->first();
        
        $student = StudentList::with('student')->get();
        
        // $get = Event::all();
        
        $list = StudentList::where('id_event',$id)->get();
        $count = StudentList::where('id_event',$id)->count();
        
        // $tampung[] = $list;            
        
        return view('admin.student-list.index',compact('event','list','student','count'));
    }

    public function store(Request $request){
        $student = Student::where('nis',$request->nis)->first();

        if($student == ''){
            return back()->with('warning','Siswa Belum terdata');
        }else{
            $cek= StudentList::where([
                ['id_event' ,'=', $request->id_event],
                ['nis','=',$request->nis],
            ])->first();            
            if($cek){
                return back()->with('warning','Siswa sudah dimasukkan');
            }else{
                StudentList::create([
                    'nis' => $request->nis,
                    'id_student' => $student->id,
                    'id_event' => $request->id_event
                ]);        
                return back()->with('success','Berhasil menambahkan siswa');
            }
        }
    }

    public function destroy($id){
        StudentList::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus siswa');
    }

    public function search(Request $request,$id,$slug){

        // $list = StudentList::with('Student.Rombel')->where('id_event',$id)->get();
        $keyword = $request->keyword;
            $count = StudentList::where('id_event',$id)->count();
            $list = StudentList::with('Student.Rombel')->where('nis','like','%'. $keyword . '%')
            ->where('id_event',$id)
            ->get();
            // dd($list);
       return response()->json([
           $list
       ]);
    }
}
