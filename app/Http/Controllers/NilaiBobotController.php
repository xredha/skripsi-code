<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiBobot;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiBobotController extends Controller
{
    public function index()
    {
        $allKriteria = Kriteria::all();
        $allNilaiBobot = NilaiBobot::all();
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif.id', 'alternatif.code_saham', 'alternatif.name_saham')
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        return view('dashboard.nilai_bobot.index', compact('allKriteria', 'allNilaiBobot', 'nilaiBobotGroupByAlternatifId'));
    }

    public function create()
    {
        $allKriteria = Kriteria::all();
        $allSubkriteria = Subkriteria::all();
        $allAlternatif = Alternatif::all();

        return view('dashboard.nilai_bobot.create', compact('allKriteria', 'allSubkriteria', 'allAlternatif'));
    }

    public function store(Request $request)
    {
        $this->validator($request);

        for ($i = 0; $i < count($request->nilai); $i++) {
            NilaiBobot::create([
                'nilai' => $request->nilai[$i],
                'kriteria_id' => (int) $request->kriteria[$i],
                'alternatif_id' => (int) $request->alternatif,
            ]);
        }

        return redirect()
            ->route('nilai-bobot.index')
            ->with([
                'success' => 'Nilai Bobot berhasil dibuat'
            ]);
    }

    public function edit($alternatifId)
    {
        $selectedAlternatif = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->join('kriteria', 'nilai_bobot.kriteria_id', '=', 'kriteria.id')
            ->select('nilai_bobot.*', 'alternatif.code_saham', 'alternatif.name_saham', 'kriteria.name AS kriteria_name')
            ->orderBy('kriteria.id')
            ->where('nilai_bobot.alternatif_id', '=', $alternatifId)
            ->get();
        $allSubkriteria = Subkriteria::all();
        // dd($selectedAlternatif);

        return view('dashboard.nilai_bobot.edit', compact('selectedAlternatif', 'allSubkriteria'));
    }

    public function update(Request $request, $alternatifId)
    {
        $this->validator($request);

        $nilaiBobot = DB::table('nilai_bobot')
            ->where('alternatif_id', '=', (int) $alternatifId)
            ->orderBy('kriteria_id')
            ->get();

        for ($i = 0; $i < count($nilaiBobot); $i++) {
            DB::table('nilai_bobot')
                ->where('alternatif_id', '=', (int) $alternatifId)
                ->where('kriteria_id', '=', $request->kriteria[$i])
                ->update(['nilai' => $request->nilai[$i]]);
        }

        return redirect()
            ->route('nilai-bobot.index')
            ->with([
                'success' => 'Nilai Bobot berhasil diubah'
            ]);
    }

    protected function validator(Request $request)
    {
        return $request->validate([
            'alternatif' => ['required', 'numeric'],
            'kriteria' => ['required', 'array'],
            'kriteria.*' => ['required', 'numeric'],
            'nilai' => ['required', 'array'],
            'nilai.*' => ['required', 'numeric', 'between:1,5'],
        ]);
    }
}
