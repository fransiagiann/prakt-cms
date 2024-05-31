@extends('layouts.main')
@section('konten')
<div class="col-md-8">
    <form method="POST" action="/dashboard/profile">
      @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('namabarang')
                {{ $message }}
            @enderror

        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="mb-3">
            <label for="skils" class="form-label">Skils</label>
            <input type="text" class="form-control" id="skils" name="skils">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    
@endsection