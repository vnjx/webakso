@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Daftar Akun Webakso</h1>
      <small class="d-block text-center mt-3">Mohon lengkapi dan isi sesuai dengan data diri Anda</small>
      <form action="/register" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
          <label for="name">Nama</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('name')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="phone" name="phone" class="form-control @error('phone')is-invalid @enderror" id="phone" placeholder="name@example.com" required value="{{ old('phone') }}">
          <label for="phone">No. Telepon</label>
          @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="address" name="address" class="form-control @error('address')is-invalid @enderror" id="address" placeholder="name@example.com" required value="{{ old('address') }}">
          <label for="address">Alamat Rumah</label>
          @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
          <label for="password">Kata Sandi</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password_confirmation" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
          <label for="password">Konfirmasi Kata Sandi</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
      </form>
      <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login" class="text-decoration-none">Login disini!<a></small>
    </main>

  </div>
</div>

@endsection