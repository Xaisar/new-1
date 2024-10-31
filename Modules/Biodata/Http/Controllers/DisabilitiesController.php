<?php

namespace Modules\Biodata\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Biodata\Entities\Disabilities;

class DisabilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $disabilities = Disabilities::all();
        return view('biodata::disabilities.index', compact('disabilities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('biodata::disabilities.create');
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

        $disabilitiesData = new Disabilities();
        $disabilitiesData->name = $request->name;
        $disabilitiesData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('disabilities.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function edit($id)
    {
        $disabilitiesData = Disabilities::find($id);
        return view('biodata::disabilities.edit', compact('disabilitiesData'));
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
        
        $disabilitiesData = Disabilities::find($id);
        $disabilitiesData->name = $request->name;
        $disabilitiesData->update();

        session()->flash('success', 'Data has been update');
        return redirect()->route('disabilities.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $disabilitiesData = Disabilities::find($id);
        $disabilitiesData->delete();
        session()->flash('success', 'Data has been delete');
        return redirect()->route('disabilities.index');
    }
}
