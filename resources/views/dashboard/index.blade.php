@extends('layouts.dashboard.master')

@section('page-title', 'Dashboard Admin')

@section('title')
  <h4 class="text-center mb-3">Mulai Perhitungan</h4>
@endsection

@section('content')
  <div id="dashboard-content" class="d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('images/dashboard-tutorial.svg') }}" alt="Dashboard Admin" style="height: 300px" class="img-fluid">
    @can('is_staff_or_admin')
      <a href="{{ route('kriteria.index') }}"><button class="btn btn-warning mt-4">Lanjut <i
        class="badge-circle badge-circle-light-secondary font-medium-1"
        data-feather="arrow-right"></i></button></a>
    @else
      <a href="{{ route('alternatif.index') }}"><button class="btn btn-warning mt-4">Lanjut <i
        class="badge-circle badge-circle-light-secondary font-medium-1"
        data-feather="arrow-right"></i></button></a>
    @endcan
  </div>
@endsection