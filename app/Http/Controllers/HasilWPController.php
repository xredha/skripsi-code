<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilWPController extends Controller
{
    public function index()
    {
        $bobotTernormalisasi = $this->bobot_ternormalisasi();
        $vektorS = $this->vektor_s();
        $vektorV = $this->vektor_v();

        return view('dashboard.hasil_wp.index', compact(['bobotTernormalisasi', 'vektorS', 'vektorV']));
    }

    public function hasil()
    {
        $hasilPerankingan = $this->sorting_vektor_v();

        return view('dashboard.hasil_wp.hasil', compact(['hasilPerankingan']));
    }

    protected function bobot_ternormalisasi()
    {
        $allBobot = DB::table('kriteria')->get();
        $totalBobot = $allBobot->sum('bobot');
        $result = [];

        foreach ($allBobot as $item) {
            if ($item->type == 'cost') {
                $resultBobot = ($item->bobot / $totalBobot) * -1;
                $result[] = ['name' => $item->name, 'description' => $item->description, 'type' => $item->type, 'bobot' => $item->bobot, 'bobot_ternormalisasi' => $resultBobot];
            }

            if ($item->type == 'benefit') {
                $resultBobot = $item->bobot / $totalBobot;
                $result[] = ['name' => $item->name, 'description' => $item->description, 'type' => $item->type, 'bobot' => $item->bobot, 'bobot_ternormalisasi' => $resultBobot];
            }
        }

        return $result;
    }

    protected function vektor_s()
    {
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('nilai_bobot.alternatif_id', 'alternatif.code', 'alternatif.code_saham', 'alternatif.name_saham')
            ->orderBy('nilai_bobot.alternatif_id')
            ->groupBy('nilai_bobot.alternatif_id')
            ->get();
        $bobotTernormalisasi = $this->bobot_ternormalisasi();
        $result = [];

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            // 1 Karena Perkalian
            $vektorS = 1;
            $selectedNilaiBobot = DB::table('nilai_bobot')->where('alternatif_id', '=', $item->alternatif_id)->orderBy('kriteria_id')->get();

            for ($i = 0; $i < count($bobotTernormalisasi); $i++) {
                $vektorS *= pow($selectedNilaiBobot[$i]->nilai, $bobotTernormalisasi[$i]['bobot_ternormalisasi']);
            }

            $result[] = ['alternatif_code' => $item->code, 'code_saham' => $item->code_saham, 'name_saham' => $item->name_saham, 'vektor_s' => $vektorS];
        }

        return $result;
    }

    protected function vektor_v()
    {
        $vektorS = $this->vektor_s();
        $totalVektorS = array_sum(array_column($vektorS, 'vektor_s'));
        $result = [];

        foreach ($vektorS as $item) {
            $vektorV = $item['vektor_s'] / $totalVektorS;
            $result[] = ['alternatif_code' => $item['alternatif_code'], 'code_saham' => $item['code_saham'], 'name_saham' => $item['name_saham'], 'vektor_v' => $vektorV];
        }

        return $result;
    }

    protected function sorting_vektor_v()
    {
        $vektorV = $this->vektor_v();
        $selectedSorting = array_column($vektorV, 'vektor_v');
        array_multisort($selectedSorting, SORT_DESC, $vektorV);

        return $vektorV;
    }
}
