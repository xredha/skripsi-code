@extends('layouts.dashboard.master')

@section('notification')
  @include('layouts.partial.notification')
@endsection

@section('title')
  <h4>Nilai Bobot</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Halaman Nilai Bobot</p>
        <div>
          <a href="{{ route('nilai-bobot.create') }}"><button class="btn btn-success">Tambah Nilai Bobot</button></a>
        </div>
      </div>
    </div>
  </section>
  <div>
    <h4 class="text-center my-3">Data Nilai Bobot</h4>
    <div class="table-responsive">
      <table class="table table-bordered table-hover mb-0">
        <thead>
          <tr>
            <th class="text-center p-2" rowspan="2">Alternatif</th>
            <th class="text-center p-2" colspan="{{ count($allKriteria) }}">Kriteria</th>
            <th class="text-center p-2" rowspan="2">Aksi</th>
          </tr>
          <tr>
            @foreach ($allKriteria as $kriteria)
              <th class="text-center p-2">{{ strtoupper($kriteria->name) }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($nilaiBobotGroupByAlternatifId as $alternatif)
            <tr>
              <td>{{ $alternatif->name_saham }} ({{ $alternatif->code_saham }})</td>
              @foreach ($allKriteria as $kriteria)
                @foreach ($allNilaiBobot as $nilaiBobot)
                  @if ($alternatif->id == $nilaiBobot->alternatif_id && $kriteria->id == $nilaiBobot->kriteria_id)
                    <td>{{ $nilaiBobot->nilai }}</td>
                  @endif
                @endforeach
              @endforeach
              <td>
                <a href="{{ route('nilai-bobot.edit', ['alternatif_id' => $alternatif->id]) }}" class="me-3">
                  <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="edit"></i>Ubah
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
