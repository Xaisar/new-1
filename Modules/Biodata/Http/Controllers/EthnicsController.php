<?php

namespace Modules\Biodata\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Biodata\Entities\Ethnics;

class EthnicsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ethnics = Ethnics::all();
        return view('biodata::ethnics.index', compact('ethnics'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('biodata::ethnics.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Validation failed! Please check your input.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ethnicsData = new Ethnics();
        $ethnicsData->name = $request->name;
        $ethnicsData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('ethnics.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    
    public function edit($id)
    {
        $ethnicsData = Ethnics::find($id);
        return view('biodata::ethnics.edit', compact('ethnicsData'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Validation failed! Please check your input.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ethnicsData = Ethnics::find($id);
        $ethnicsData->name = $request->name;
        $ethnicsData->update();

        session()->flash('success', 'Data has been update');
        return redirect()->route('ethnics.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ethnicsData = Ethnics::find($id);
        $ethnicsData->delete();
        session()->flash('success', 'Data has been delete');
        return redirect()->route('ethnics.index');
    }
}
