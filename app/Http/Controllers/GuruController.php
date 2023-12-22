<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function admin(Request $request)
    {
        if ($request->has('search')){
            $siswa=Siswa::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $siswa=Siswa::paginate(5);
        }

        return view('admin', compact('siswa'));
    }

    
 public function store(Request $request){
    $siswa = Siswa::create([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'kelas' => $request ->kelas,
        'jurusan' => $request ->jurusan,
    ]);
    if ($siswa) {
        return redirect('admin')->with('success',' data berhasil di tambahkan');;
    }
 }

 public function edit(Request $request){
    $siswa = Siswa::where('id', $request->id)->update([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'kelas' => $request ->kelas,
        'jurusan' => $request ->jurusan,
    ]);
    if ($siswa){
        return redirect('admin')->with('success',' data berhasil di edit');;
     }
 }

 public function delete(Request $request){
    $siswa = Siswa::where('id', $request->id)->delete();
    if ($siswa){
        return redirect('admin')->with('success',' data berhasil di hapus');



    }
 }
//kepsek
 public function kepsek(){
    return view('kepsek');
 }
 //user page
 public function user(Request $request)
    {
        if ($request->has('search')){
            $siswa=Siswa::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $siswa=Siswa::paginate(5);
        }

        return view('user', compact('siswa'));
    }
}


