<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Session;
use Illumintae\Http\RedirectResponse\with;
use Inertia;


class Berita_PenggunaController extends Controller
{
    public function index()
    {
        $data = Berita::all();
        return Inertia\Inertia::render('Berita/Index', ['beritas' => $data]);
    }

    public function create()
    {
        return Inertia\Inertia::render('Berita/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|string',
            'headline_berita' => 'required|string',
            'isi_berita' => 'required',
            'tanggal_publikasi' => 'required|dateTime',
            'coresponden' => 'required|string',
        ], [
            'headline_berita.required'=>'Headline berita wajib diisi',
            'headline_berita.string'=>'Headline berita sudah ada',
            'coresponden.required'=>'Coresponden wajib diisi',
            'coresponden.string'=>'Coresponden sudah ada',
        ]);
        $data = [
                    'media'=>$request->media,
                    'headline_berita'=>$request->headline_berita,
                    'isi_berita'=>$request->isi_berita,
                    'tanggal_publikasi'=>$request->tanggal_publikasi,
                    'coresponden'=>$request->coresponden,
                ];

        Berita::create($data);

        return redirect()->route('beritas.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(Berita $berita)
    {
        return Inertia\Inertia::render('Berita/Edit', ['berita' => $berita]);
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'media' => 'required|string',
            'headline_berita' => 'required|string',
            'isi_berita' => 'required',
            'tanggal_publikasi' => 'required|dateTime',
            'coresponden' => 'required|string',
        ], [
            'headline_berita.required'=>'Headline berita wajib diisi',
            'coresponden.required'=>'Coresponden wajib diisi',
        ]);
        $data = [
            'media'=>$request->media,
            'headline_berita'=>$request->headline_berita,
            'isi_berita'=>$request->isi_berita,
            'tanggal_publikasi'=>$request->tanggal_publikasi,
            'coresponden'=>$request->coresponden,
        ];

        $berita->update($data);

        return redirect()->route('beritas.index')->with('success', 'Berhasil Melakukan Update Data');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('beritas.index')->with('success', 'Berhasil Menghapus Data');
    }
}










// class berita_penggunaController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index(Request $request)
//     {
//        $katakunci = $request->katakunci;
//        $jumlahbaris = 4;
//        if(strlen($katakunci)){
//            $data = berita::where('media', 'like', "%$katakunci%")
//                    ->orWhere('isi_berita', 'like', "%$katakunci%")
//                    ->paginate($jumlahbaris);
//        } else{
//             $data = berita::orderBy('media')->paginate($jumlahbaris);   
//        }
//        return view('berita.index')->with('data', $data);
    //    return Inertia\Inertia::render('berita.index',[
    //     'berita'=> $data
    //    ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('berita.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        // Atur tanggal_publikasi dengan waktu saat ini sebelum menyimpan
        // $request->merge(['tanggal_publikasi' => now()]);

        // Session::flash('headline_berita', $request->headline_berita);
        // Session::flash('isi_berita', $request->isi_berita);

        // $request->validate([
        //     'headline_berita'=>'required|unique:berita,headline_berita',
        //     'isi_berita'=>'required|unique:berita,isi_berita',
        // ],[
        //     'headline_berita.required'=>'Headline berita wajib diisi',
        //     'headline_berita.unique'=>'Headline berita sudah ada',
        //     'isi_berita.required'=>'Isi berita wajib diisi',
        //     'isi_berita.unique'=>'Isi berita sudah ada',
        // ]);
    //     $data = [
    //         'media'=>$request->media,
    //         'headline_berita'=>$request->headline_berita,
    //         'isi_berita'=>$request->isi_berita,
    //         'tanggal_publikasi'=>$request->tanggal_publikasi,
    //         'coresponden'=>$request->coresponden,
    //     ];
    //     berita::create($data);
    //     return redirect()->to('berita')->with('success', 'Berhasil Menambahkan Data');
    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $data = berita::where('media', $id)->first();
    //     return view('berita.edit')->with('data', $data);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
         // Atur tanggal_publikasi dengan waktu saat ini sebelum menyimpan
    //      $request->merge(['tanggal_publikasi' => now()]);

    //      $request->validate([
    //          'headline_berita'=>'required',
    //          'isi_berita'=>'required',
    //      ],[
    //          'headline_berita.required'=>'Headline berita wajib diisi',
    //          'isi_berita.required'=>'Isi berita wajib diisi',
    //      ]);
    //      $data = [
    //          'media'=>$request->media,
    //          'headline_berita'=>$request->headline_berita,
    //          'isi_berita'=>$request->isi_berita,
    //          'tanggal_publikasi'=>$request->tanggal_publikasi,
    //          'coresponden'=>$request->coresponden,
    //      ];
    //      berita::where('media', $id)->update($data);
    //      return redirect()->to('berita')->with('success', 'Berhasil Melakukan Update Data');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
//         berita::where('media', $id)->delete();
//         return redirect()->to('berita')->with('success', 'Berhasil Menghapus Data');
//     }
// }