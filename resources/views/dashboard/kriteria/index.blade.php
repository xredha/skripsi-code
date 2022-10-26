@extends('layouts.dashboard.master')

@section('notification')
  @include('layouts.partial.notification')
@endsection

@section('title')
  <h4>Kriteria</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border border-bottom-0 shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Halaman Kriteria</p>
        <a href="{{ route('kriteria.create') }}"><button class="btn btn-success">Tambah Kriteria</button></a>
      </div>
    </div>
  </section>
  <!-- table bordered -->
  <div class="table-responsive">
    <table class="table table-bordered table-hover mb-0">
      <thead>
        <tr>
          <th class="text-center">Kriteria</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Keterangan</th>
          <th class="text-center">Tipe</th>
          <th class="text-center">Bobot</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($allKriteria as $kriteria)
          <tr>
            <td>C{{ $kriteria->code }}</td>
            <td>{{ strtoupper($kriteria->name) }}</td>
            <td>{{ ucwords($kriteria->description) }}</td>
            <td>{{ ucwords($kriteria->type) }}</td>
            <td>{{ $kriteria->bobot }}</td>
            <td>
              <div class="d-flex justify-content-around">
                {{-- Update --}}
                <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="me-3">
                  <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="edit"></i>Ubah
                </a>
                {{-- Delete --}}
                <form onsubmit="return confirm('Ingin Menghapus Kriteria {{ strtoupper($kriteria->name) }} ?');"
                  action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="bg-transparent border-0 text-danger">
                    <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash"></i>Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
