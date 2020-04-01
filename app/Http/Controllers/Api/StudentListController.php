<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentList;
use App\Student;
use App\Event;

class StudentListController extends Controller
{
    public function action(Request $request){
        
        $this->validate($request,[
            'nis' => 'required|digits:8'
        ]);

        $student = Student::where('nis',$request->nis)->first();

        if($student == ''){
            return back()->with('warning','Siswa Belum terdata');
        }else{
            
            $cek= StudentList::where([
                ['id_event' ,'=', $request->id_event],
                ['nis','=',$request->nis],
            ])->first();            
            if($cek){
                return response()->json([
                    'warning' => 'Siswa sudah dimasukkan'
                ]);
            }else{
                StudentList::create([
                    'nis' => $request->nis,
                    'id_student' => $student->id,
                    'id_event' => $request->id_event
                ]);        
                return response()->json([
                    'success' => 'Berhasil menambahkan siswa'
                ]);
            }
        }
    }

    public function event(){
        $event = Event::all();

        return response()->json([
            $event
        ]);
    }

}
