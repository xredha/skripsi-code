@extends('layouts.voler.master')

@section('title')
  <h4>Subkriteria</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border border-bottom-0 shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Tambah Subkriteria</p>
        <a href="{{ route('subkriteria.index') }}"><button class="btn btn-secondary">Kembali</button></a>
      </div>
    </div>
  </section>

  <section id="basic-vertical-layouts">
    <div class="row match-height">
      <div class="col-12">
        <div class="card m-0 border shadow-none">
          <div class="card-content">
            <div class="card-body">
              <form class="form form-vertical" action="{{ route('subkriteria.store') }}" method="POST">
                @csrf
                <div class="form-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="range">Range</label>
                        <input type="text" id="range" class="form-control" name="range"
                          placeholder="Range Subkriteria" required>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <select class="form-select" id="nilai" name="nilai" required>
                          @for ($i = 1; $i <= 5; $i++)
                          <option value='{{ $i }}'>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
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
