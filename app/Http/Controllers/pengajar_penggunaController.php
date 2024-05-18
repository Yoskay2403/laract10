<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use Illuminate\Support\Facades\Session;
use Illumintae\Http\RedirectResponse\with;

class pengajar_penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = pengajar::where('nama_pengajar', 'like', "%$katakunci%")
                    ->orWhere('detail_pengajar', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        } else{
            $data = pengajar::orderBy('nama_pengajar')->paginate($jumlahbaris);
        }
        return view('pengajar.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_pengajar', $request->nama_pengajar);
        Session::flash('detail_pengajar', $request->detail_pengajar);
        Session::flash('id_peserta', $request->id_peserta);
        Session::flash('id_program', $request->id_program);

        $request->validate([
            'nama_program'=>'required|unique:program,nama_program',
            'detail_program'=>'required|unique:program,detail_program',
        ],[
            'nama_program.required'=>'Nama program wajib diisi',
            'nama_program.unique'=>'Nama program sudah ada',
            'detail_program.required'=>'Detail program wajib diisi',
            'detail_program.unique'=>'Detail program sudah ada',
        ]);
        $data = [
            'nama_program'=>$request->nama_program,
            'detail_program'=>$request->detail_program,
        ];
        Pengajar::create($data);
        return redirect()->to('program')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pengajar::where('nama_program', $id)->first();
      return view('program.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_program'=>'required',
            'detail_program'=>'required',
        ],[
            'nama_program.required'=>'Nama program wajib diisi',
            'detail_program.required'=>'Detail program wajib diisi',
        ]);
        $data = [
            'nama_program'=>$request->nama_program,
            'detail_program'=>$request->detail_program,
        ];
        Pengajar::where('nama_program',$id)->update($data);
        return redirect()->to('program')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengajar::where('nama_program', $id)->delete();
        return redirect()->to('program')->with('success', 'Berhasil Menghapus Data');
    }
}