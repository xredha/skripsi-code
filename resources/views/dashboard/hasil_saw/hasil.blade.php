@extends('layouts.dashboard.master')

@section('title')
  <h4>Hasil Perankingan</h4>
@endsection

@section('content')
  <section class="header-menu mb-3">
    <div class="card m-0 border shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Hasil Perangkingan</p>
        <a href="{{ route('saw.index') }}"><button class="btn btn-success">Lihat Matriks Ternormalisasi</button></a>
      </div>
    </div>
  </section>

  <section class="header-menu mb-3">
    <div class="card m-0 border shadow-none p-3">
      <h4 class="text-center mb-3">Hasil Perankingan</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Alternatif</th>
              <th class="text-center">Kode Saham</th>
              <th class="text-center">Hasil (V)</th>
              <th class="text-center">Ranking</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($hasilPerankingan as $index=>$item)
              <tr>
                <td class="text-center">{{ ($index + 1) }}</td>
                <td class="text-center">A{{ $item['alternatif_code'] }}</td>
                <td class="text-center">{{ strtoupper($item['code_saham']) }}</td>
                <td class="text-center">{{ $item['vektor_v'] }}</td>
                <td class="text-center">{{ ($index + 1) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
