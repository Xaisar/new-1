<?php

namespace Modules\Alamat\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Alamat\Entities\Kecamatan;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $kecamatanData = DB::table('kecamatans')
                -> join('kabupatens', 'kecamatans.kabupatens_id', '=', 'kabupatens.id')
                -> select('kecamatans.id', 'kecamatans.name as kecamatan', 'kabupatens.name as kabupaten')
                -> get();
        dd($kecamatanData);
        return view('alamat::kecamatan.index', compact('kecamatanData'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        return view('alamat::kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
            'kabupaten_id'=>'required'
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Validation failed! Please check your input.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kecamatanData = new Kecamatan();
        $kecamatanData->name = $request->name;
        $kecamatanData->kabupatens_id = $request->kabupatensi_id;
        $kecamatanData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('alamat::kecamatan.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('alamat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $kecamatanData = Kecamatan::find($id);
        return view('alamat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
