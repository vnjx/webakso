@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Divisi Baru</h1>
</div>

<div>
    <form method="post" action="/dashboard/origins">
        @csrf
        <div class="mb-3">
            <label for="divisi" class="form-label">Nama Divisi</label>
            <input type="text" class="form-control @error('divisi') is-invalid @enderror" id="divisi" name="divisi" required autofocus value="{{ old('divisi') }}">
            @error('divisi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}" readonly>
          </div>
          
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    const divisi = document.querySelector('#divisi')
    const slug = document.querySelector('#slug')
  
    divisi.addEventListener('change', function() {
      fetch('/dashboard/origins/checkSlug?divisi=' + divisi.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });
</script>

@endsection