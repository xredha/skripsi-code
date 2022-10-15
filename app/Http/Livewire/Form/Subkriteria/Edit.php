<?php

namespace App\Http\Livewire\Form\Subkriteria;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $kriteriaId;
    public $subkriteriaId = null;
    public $isFormActive = false;
    public $rangeForm = null;
    public $nilaiForm = null;

    public function render()
    {
        $allSubkriteriaByKriteriaId = DB::table('subkriteria')->where('kriteria_id', '=', $this->kriteriaId)->orderBy('nilai')->get();
        return view('livewire.form.subkriteria.edit', compact('allSubkriteriaByKriteriaId'));
    }

    public function update($id)
    {
        $selectedSubkriteria = DB::table('subkriteria')->where('id', '=', $id)->orderBy('nilai')->get();
        foreach ($selectedSubkriteria as $item) {
            if ($item->id == $id) {
                $this->rangeForm = $item->range;
                $this->nilaiForm = $item->nilai;
            }
        }
        $this->isFormActive = true;
        $this->subkriteriaId = $id;
    }

    public function updateForm()
    {
        $update = DB::table('subkriteria')
            ->where('id', $this->subkriteriaId)
            ->update(
                ['range' => $this->rangeForm],
                ['nilai' => $this->nilaiForm]
            );

        $this->resetForm();
        // if ($update) {
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

    public function remove($id)
    {
        $remove = DB::table('subkriteria')->where('id', '=', $id)->delete();
    }

    public function removeAll()
    {
        $removeAll = DB::table('subkriteria')->where('kriteria_id', '=', $this->kriteriaId)->delete();
    }

    protected function resetForm() {
        $this->rangeForm = null;
        $this->nilaiForm = null;
        $this->subkriteriaId = null;
        $this->isFormActive = false;
    }
}
