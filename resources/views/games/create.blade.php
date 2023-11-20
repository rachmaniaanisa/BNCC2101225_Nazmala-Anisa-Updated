@extends('layouts/app')
@section('title', 'Create Game')

@section('content')
    <div class="container">
        <div class="col-md-8 bg-light manage-wrapper">
            <h3><i class="uil uil-plus-circle me-1"></i>Manage Game</h3>
            <p>Manage the games and don't forget to recheck it</p>
            <hr>

            <form action="{{ url('games/create') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Game</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                        placeholder="Masukkan Judul Game" name="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <input type="text" class="form-control" placeholder="Masukkan Publisher" name="publisher"
                        value="{{ old('publisher') }}">
                    @error('publisher')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Game" rows="5">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Rilis</label>
                    <input type="number" class="form-control" placeholder="Masukkan Tahun Rilis" name="tahun_rilis"
                        value="{{ old('tahun_rilis') }}">
                </div>
                @error('tahun_rilis')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
