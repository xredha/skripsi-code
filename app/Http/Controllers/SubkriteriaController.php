<?php

namespace App\Http\Controllers;

use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubkriteriaController extends Controller
{
    public function index()
    {
        $allSubkriteria = Subkriteria::all();
        return view('admin.subkriteria.index', ['allSubkriteria' => $allSubkriteria]);
    }

    public function create()
    {
        return view('admin.subkriteria.create');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'range' => 'required|string',
        //     'nilai' => 'required',
        // ]);

        // $subkriteria = Subkriteria::create([
        //     'range' => $request->range,
        //     'nilai' => $request->nilai,
        //     'id_kriteria' => 
        // ]);

        // if ($subkriteria) {
        //     return redirect()
        //         ->route('subkriteria.index')
        //         ->with([
        //             'success' => 'New subkriteria has been created successfully'
        //         ]);
        // } else {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with([
        //             'error' => 'Some problem occurred, please try again'
        //         ]);
        // }
    }
}
