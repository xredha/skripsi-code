<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $allKriteria = Kriteria::all();
        return view('admin.kriteria.index', compact('allKriteria'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required',
            'bobot' => 'required',
        ]);

        $lastValueCode = DB::table('kriteria')->orderBy('code', 'desc')->first();
        $code = is_null($lastValueCode) ? 1 : $lastValueCode->code + 1;
        $bobot = (float)$request->bobot;

        $kriteria = Kriteria::create([
            'code' => $code,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'bobot' => $bobot,
        ]);

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'New kriteria has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required',
            'bobot' => 'required',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $bobot = (float)$request->bobot;

        $kriteria->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'bobot' => $bobot,
        ]);

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'New kriteria has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'Kriteria has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}


// /**
//  * Display a listing of the resource.
//  *
//  * @return \Illuminate\Http\Response
//  */
// public function index()
// {
//     //
// }

// /**
//  * Show the form for creating a new resource.
//  *
//  * @return \Illuminate\Http\Response
//  */
// public function create()
// {
//     //
// }

// /**
//  * Store a newly created resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\Response
//  */
// public function store(Request $request)
// {
//     //
// }

// /**
//  * Display the specified resource.
//  *
//  * @param  int  $id
//  * @return \Illuminate\Http\Response
//  */
// public function show($id)
// {
//     //
// }

// /**
//  * Show the form for editing the specified resource.
//  *
//  * @param  int  $id
//  * @return \Illuminate\Http\Response
//  */
// public function edit($id)
// {
//     //
// }

// /**
//  * Update the specified resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @param  int  $id
//  * @return \Illuminate\Http\Response
//  */
// public function update(Request $request, $id)
// {
//     //
// }

// /**
//  * Remove the specified resource from storage.
//  *
//  * @param  int  $id
//  * @return \Illuminate\Http\Response
//  */
// public function destroy($id)
// {
//     //
// }