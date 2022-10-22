<div>
  <div class="row mb-4">
    <div class="col-12">
      <div class="form-group col-md-6">
        <label for="kriteria" class="mb-2">Pilih Kriteria</label>
        <div class="input-group mb-3">
          <select class="form-select" id="kriteria" name="kriteria" wire:model="selectedKriteria">
            <option value="" selected>Pilih Kriteria...</option>
            @foreach ($allKriteria as $kriteria)
              <option value="{{ $kriteria->id }}">{{ strtoupper($kriteria->name) }}</option>
            @endforeach
          </select>
          <label class="input-group-text" for="kriteria">Pilihan</label>
        </div>
      </div>
    </div>
  </div>

  @if (!is_null($allSubkriteriaByKriteriaId))
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card m-0 border shadow-none">
            <div class="card-content">
              <div class="card-body">
                <button type="button"
                  class="btn btn-sm btn-outline-primary min-width-70 {{ count($formCounter) == 5 ? 'btn-outline-dark' : '' }}"
                  wire:click="add()" {{ count($formCounter) == 5 ? 'disabled' : '' }}>
                  Add Form
                </button>
                <form class="form" wire:submit.prevent="submit()">
                  @csrf
                  @foreach ($formCounter as $index => $value)
                    <div class="row align-items-center mt-3">
                      <div class="col-10">
                        <div class="row">
                          <div class="form-group col-12 col-md-6">
                            <label for="range">Range</label>
                            <input type="text" class="form-control" name="range" placeholder="Persentase Range"
                              wire:model="dataStore.{{ $index }}.range"
                              wire:key="formCounter.{{ $index }}.range" required>
                          </div>
                          <div class="form-group col-12 col-md-6">
                            <label for="nilai">Nilai</label>
                            <select class="form-select" name="nilai" wire:model="dataStore.{{ $index }}.nilai"
                              wire:key="formCounter.{{ $index }}.nilai" required>
                              <option value="" selected>Pilih Nilai...</option>
                              @for ($i = 1; $i <= 5; $i++)
                                <option value='{{ $i }}'>{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="d-flex">
                          <button type="button"
                            class="btn btn-sm btn-outline-danger min-width-70 {{ count($formCounter) == 1 ? 'btn-outline-dark' : '' }}"
                            wire:click="remove()" {{ count($formCounter) == 1 ? 'disabled' : '' }}>
                            Remove
                          </button>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-4">Tambah Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
</div>
