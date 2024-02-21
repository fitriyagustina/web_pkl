<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\dudi;
use App\Models\pkl;
use Illuminate\Http\Request;
use Illumiate\Support\Facades\Storage;

class PklController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get pkl
        $pkl = pkl::all();

        //render view with pkl
        return view('pkl.index', compact('pkl'));
    }


    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $data = Siswa::all();
        $item = Dudi::all();
        return view('pkl.create', compact('data','item'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'siswa_id'     => 'required',
            'dudi_id' =>'required',
            'tgl_masuk'     => 'required',
            'tgl_keluar'     => 'required',


        ]);

        //create pembayaran
        pkl::create([
            'siswa_id'     => $request->siswa_id,
            'dudi_id'  => $request->dudi_id,
            'tgl_masuk'     => $request->tgl_masuk,
            'tgl_keluar'     => $request->tgl_keluar,

        ]);
        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $pkl
     * @return void
     */
    public function edit(pkl $pkl)
    {
        $data = Siswa::all();
        $item = Dudi::all();

        return view('pkl.edit', compact('pkl', 'data','item'));
    }

    public function destroy(pkl $pkl)
    {
        $pkl->delete();

        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Didelete!']);
    }
    public function update(Request $request, pkl $pkl)
    {
        //validate form
        $this->validate($request, [
            'siswa_id'     => 'required',
            'dudi_id' =>'required',
            'tgl_masuk'     => 'required',
            'tgl_keluar'     => 'required',
        ]);

            //update post without image
            $pkl->update([
                'siswa_id'     => $request->siswa_id,
                'dudi_id'  => $request->dudi_id,
                'tgl_masuk'     => $request->tgl_masuk,
                'tgl_keluar'     => $request->tgl_keluar,
            ]);


        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
