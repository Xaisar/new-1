<?php

namespace Modules\Biodata\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Biodata\Entities\Incomes;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $incomes = Incomes::all();
        return view('biodata::incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('biodata::incomes.create');
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

        $incomesData = new Incomes();
        $incomesData->name = $request->name;
        $incomesData->save();

        session()->flash('success', 'Data has been saved');
        return redirect()->route('incomes.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
   
    public function edit($id)
    {
        $incomesData = Incomes::find($id);
        return view('biodata::incomes.edit', compact('incomesData'));
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

        $incomesData = Incomes::find($id);
        $incomesData->name = $request->name;
        $incomesData->update();

        session()->flash('success', 'Data has been update');
        return redirect()->route('incomes.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $incomesData = Incomes::find($id);
        $incomesData->delete();
        session()->flash('success', 'Data has been delete');
        return redirect()->route('incomes.index');
    }
}
