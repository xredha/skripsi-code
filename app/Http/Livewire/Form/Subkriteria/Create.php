<?php

namespace App\Http\Livewire\Form\Subkriteria;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $selectedKriteria = null;
    public $allSubkriteriaByKriteriaId = null;
    public $formCounter = [];
    public $formData = [];

    protected $rules = [
        'selectedKriteria' => ['required', 'numeric'],
        'formData.*.range' => ['required', 'string', 'max:255'],
        'formData.*.nilai' => ['required', 'numeric', 'between:1,5'],
    ];

    public function render()
    {
        $allKriteria = DB::table('kriteria')->select('id', 'name')->get();

        return view('livewire.form.subkriteria.create', compact('allKriteria'));
    }

    public function updatedSelectedKriteria($kriteria_id)
    {
        if (!empty($kriteria_id)) {
            // Hanya untuk pembuktian Ada Data
            $this->allSubkriteriaByKriteriaId = DB::table('subkriteria')->where('kriteria_id', '=', $kriteria_id)->get();
            $this->formCounter = [0];
        } else {
            $this->allSubkriteriaByKriteriaId = null;
        }
    }

    public function add()
    {
        $countFormCounter = count($this->formCounter);

        // Push Array
        $this->formCounter[] = $countFormCounter;
    }

    public function remove()
    {
        array_pop($this->formCounter);
    }

    public function submit()
    {
        $this->validate();

        $this->store($this->formData);
    }

    protected function store($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['kriteria_id'] = $this->selectedKriteria;
        }

        $store = DB::table('subkriteria')->insert($data);

        if ($store) {
            return redirect()
                ->route('subkriteria.index')
                ->with([
                    'success' => 'Subkriteria berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Subkriteria gagal dibuat'
                ]);
        }
    }
}
