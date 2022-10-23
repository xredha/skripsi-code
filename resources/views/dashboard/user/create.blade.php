@extends('layouts.dashboard.master')

@section('title')
  <h4>User</h4>
@endsection

@section('content')
  <section class="header-menu">
    <div class="card m-0 border border-bottom-0 shadow-none">
      <div class="card-body d-flex align-items-center justify-content-between">
        <p class="m-0">Tambah User</p>
        <a href="{{ route('user.index') }}"><button class="btn btn-secondary">Kembali</button></a>
      </div>
    </div>
  </section>

  <section id="basic-vertical-layouts">
    <div class="row match-height">
      <div class="col-12">
        <div class="card m-0 border shadow-none">
          <div class="card-content">
            <div class="card-body">
              <form class="form form-vertical" action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Nama"
                          required>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="E-mail"
                          required>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="password">Password</label>
                      <div class="form-group position-relative has-icon-right">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                          required>
                        <div id="icon-password" class="form-control-icon" onclick="togglePassword()">
                          <i data-feather="eye"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select" id="role" name="role" required>
                          <option value='' selected>Pilih Role...</option>
                          <option value='anggota'>Anggota</option>
                          <option value='staff'>Staff</option>
                          <option value='admin'>Admin</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Tambah Data</button>
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

@section('custom-javascript')
  <script>
    const password = document.getElementById('password');
    const passwordIcon = document.getElementById('icon-password');

    function togglePassword() {
      if (password.type === 'password') {
        password.type = 'text';
        passwordIcon.innerHTML = '<i data-feather="eye-off"></i>';
      } else {
        password.type = 'password';
        passwordIcon.innerHTML = '<i data-feather="eye"></i>';
      }

      feather.replace();
    }
  </script>
@endsection
