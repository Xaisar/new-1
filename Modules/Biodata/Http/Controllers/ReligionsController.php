<?php

namespace Modules\Biodata\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Biodata\Entities\Religions;


class ReligionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $religions = Religions::all();
        return view('biodata::religions.index', compact('religions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('biodata::religions.create');
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

        $religionsData = new Religions();
        $religionsData->name = $request->name;
        $religionsData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('religions.index');
    }

    public function edit($id)
    {
        $religionsData = Religions::find($id);
        return view('biodata::religions.edit', compact('religionsData'));
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

        $religionsData = Religions::find($id);
        $religionsData->name = $request->name;
        $religionsData->update();

        session()->flash('success', 'Data has been update');
        return redirect()->route('religions.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $religionsData = Religions::find($id);
        $religionsData->delete();
        session()->flash('success', 'Data has been delete');
        return redirect()->route('religions.index');
    }
}
