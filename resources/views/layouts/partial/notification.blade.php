@if (session('success'))
  <div class="alert alert-success mx-4">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-error mx-4">
    {{ session('error') }}
  </div>
@endif
