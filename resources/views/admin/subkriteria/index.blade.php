@extends('layouts.voler.master')

@section('notification')
  @include('layouts.partial.notification')
@endsection

@section('title')
  <h4>Subkriteria</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border border-bottom-0 shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Halaman Subkriteria</p>
        <a href="{{ route('subkriteria.create') }}"><button class="btn btn-success">Tambah Subkriteria</button></a>
      </div>
    </div>
  </section>
  <!-- table bordered -->
  <div class="table-responsive">
    <table class="table table-bordered table-hover mb-0">
      <thead>
        <tr>
          <th class="text-center">Kriteria</th>
          <th class="text-center">Range</th>
          <th class="text-center">Nilai</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($allSubkriteria as $subkriteria)
          <tr>
            <td>{{ strtoupper($subkriteria->name) }}</td>
            <td>{{ $subkriteria->range }}</td>
            <td>{{ $subkriteria->nilai }}</td>
            <td>
              <div class="d-flex justify-content-around">
                <a href="{{ route('subkriteria.edit', $subkriteria->kriteria_id) }}" class="me-3">
                  <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="settings"></i>Ubah /
                  Hapus
                </a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
