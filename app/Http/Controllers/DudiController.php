<?php

namespace App\Http\Controllers;

use App\Models\dudi;
use Illuminate\Http\Request;
use Illumiate\Support\Facades\Storage;

class DudiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get dudi
        $dudi = dudi::latest()->paginate(5);

        //render view with dudi
        return view('dudi.index', compact('dudi'));
    }


    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('dudi.create');
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
            'nama'     => 'required',
            'alamat'     => 'required',

        ]);

        //create dudi
        dudi::create([
            'nama'     => $request->nama,
            'alamat'     => $request->alamat

        ]);
        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $dudi
     * @return void
     */
    public function edit(dudi $dudi)
    {

        return view('dudi.edit', compact('dudi'));

        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(dudi $dudi)
    {
        $dudi->delete();

        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Didelete!']);
    }
    public function update(Request $request, dudi $dudi)
    {
        //validate form
        $this->validate($request, [

            'nama'     => 'required',
            'alamat'     => 'required',
        ]);

            //update post without image
            $dudi->update([
                'nama'     => $request->nama,
                'alamat'     => $request->alamat,
            ]);


        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
