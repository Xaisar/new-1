<?php

namespace Modules\Biodata\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Biodata\Entities\Professions;

class ProfessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $professions = Professions::all();
        return view('biodata::professions.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('biodata::Professions.create');
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
            'code' => 'required | string',
            'name' => 'required | string',
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Validation failed! Please check your input.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $professionsData = new Professions();
        $professionsData->code = $request->code;
        $professionsData->name = $request->name;
        $professionsData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('professions.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function edit($id)
    {
        $professionsData = Professions::find($id);
        return view('biodata::professions.edit', compact('professionsData'));
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
            'code' => 'required | string',
            'name' => 'required | string',
        ]);
        if ($validator->fails()) {
            session()->flash('error', 'Validation failed! Please check your input.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $professionsData = Professions::find($id);
        $professionsData->code = $request->code;
        $professionsData->name = $request->name;
        $professionsData->update();

        session()->flash('success', 'Data has been update');
        return redirect()->route('professions.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $professionsData = Professions::find($id);
        $professionsData->delete();

        session()->flash('success', 'Data has been delete');
        return redirect()->route('professions.index');
    }
}
