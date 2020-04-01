<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\ImportRequest;
use Illuminate\Support\Facades\Validator;
use QrCode;
use PDF;
use Str;

use App\Student;
use App\Rombel;
use App\Rayon;

class StudentController extends Controller
{
    public function index(){
        $data = Student::with('rombel','rayon')->get();
        $rombel = Rombel::all();
        // dd($rombel);
        $rayon = Rayon::all();
        return view('admin.student.index',compact('data','rombel','rayon'));
    }

    public function create(){
        return view('admin.student.add');
    }

    public function export_excel(){
        return Excel::download(new StudentExport, 'siswa.xlsx');
    }

    public function generate(Request $request,$nis,$nama,$jk){
        // return QrCode::size(200)->generate('W3Adda Laravel Tutorial');
        $qrcode = QrCode::size(200)->generate($nis);
        $nis = $nis;
        $nama = $nama;
        $jk = $jk;
        
        $pdf = PDF::loadview('admin.qrcode.index',compact('nis','nama','jk','qrcode'))->setOptions(['dpi' => 50]);
        return $pdf->stream();
    }

    public function import_excel(Request $request, ImportRequest $requests){

        $validated = $requests->validated();

        $file = $request->file('file');
        $namafile = rand().$file->getClientOriginalName();
        $file->move('upload/file_import',$namafile);

        // import 
        Excel::import(new StudentImport, public_path('/upload/file_import/'.$namafile));
        return back()->with('success','Berhasil import excel! ');
    }

    public function store(Request $request, StudentRequest $requests){

        $validated = $requests->validated();                        

        Student::create([
            'nis' => $request->nis,
            'nama' => ucwords($request->nama),
            'jk' => $request->jk,
            'id_rombel' => $request->rombel,
            'id_rayon' => strtoupper($request->rayon)
        ]);

        return redirect()->route('student.index')->with('success','Siswa berhasil ditambahkan');

    }

    public function destroy($id){
        Student::Where('id',$id)->delete();

        return back()->with('success','Berhasil menghapus siswa! ');
    }

    public function edit($id){
        $student = Student::where('id',$id)->first();
        // dd($student);
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        return view('admin.student.edit',compact('student','rombel','rayon'));
    }

    public function update(Request $request,$id,UpdateStudentRequest $requests){

        $validated = $requests->validated();
        
        $cek = Student::where('nis',$request->nis)->first();
        // dd($cek);
            Student::where('id',$id)->update([
                'nis' => $request->nis,
                'nama' => ucwords($request->nama),
                'jk' => $request->jk,
                'id_rombel' => $request->rombel,
                'id_rayon' => $request->rayon
            ]);
            return redirect()->route('student.index')->with('success','Siswa berhasil diubah');    
    }

}
