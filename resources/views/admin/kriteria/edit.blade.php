@extends('layouts.voler.master')

@section('title')
  <h4>Kriteria</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border border-bottom-0 shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Ubah Kriteria</p>
        <a href="{{ route('kriteria.index') }}"><button class="btn btn-secondary">Kembali</button></a>
      </div>
    </div>
  </section>

  <section id="basic-vertical-layouts">
    <div class="row match-height">
      <div class="col-12">
        <div class="card m-0 border shadow-none">
          <div class="card-content">
            <div class="card-body">
              <form class="form form-vertical" action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" class="form-control" name="name"
                          placeholder="Singkatan Nama" required value="{{ $kriteria->name }}">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" id="description" class="form-control" name="description"
                          placeholder="Deskripsi Singkatan Nama" required value="{{ $kriteria->description }}">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="type">Tipe</label>
                        <select class="form-select" id="type" name="type" required>
                          <option value="cost" {{ $kriteria->type == 'cost' ? 'selected' : '' }}>Cost</option>
                          <option value="benefit" {{ $kriteria->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <select class="form-select" id="bobot" name="bobot" required>
                          @for ($i = 1; $i <= 10; $i++)
                            <option value='{{ $i }}' {{ $i == (int) $kriteria->bobot ? 'selected' : '' }}>
                              {{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Ubah Data</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
