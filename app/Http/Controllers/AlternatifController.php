<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index()
    {
        $allAlternatif = Alternatif::all();
        return view('admin.alternatif.index', compact('allAlternatif'));
    }

    public function create()
    {
        return view('admin.alternatif.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'codeSaham' => 'required|string',
            'nameSaham' => 'required|string',
        ]);

        $lastValueCode = DB::table('alternatif')->orderBy('code', 'desc')->first();
        $code = is_null($lastValueCode) ? 1 : $lastValueCode->code + 1;
        
        $alternatif = Alternatif::create([
            'code' => $code,
            'code_saham' => $request->codeSaham,
            'name_saham' => $request->nameSaham,
        ]);

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'New Alternatif has been created successfully'
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
        $alternatif = Alternatif::findOrFail($id);
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'codeSaham' => 'required|string',
            'nameSaham' => 'required|string',
        ]);

        $alternatif = Alternatif::findOrFail($id);

        $alternatif->update([
            'code_saham' => $request->codeSaham,
            'name_saham' => $request->nameSaham,
        ]);

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'New Alternatif has been created successfully'
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
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
