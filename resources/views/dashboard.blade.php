@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Jumlah Kelas -->
    <div class="col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Kelas</h5>
                <p class="card-text display-4">{{ $jumlahKelas }}</p>
            </div>
        </div>
    </div>

    <!-- Terakhir Ditambahkan -->
    <div class="col-md-8 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Kelas Terakhir Ditambahkan</h5>
                @if($terakhirKelas)
                    <p class="mb-0"><strong>Nama:</strong> {{ $terakhirKelas->nama_kelas }}</p>
                    <p class="mb-0"><strong>Ditambahkan:</strong> {{ \Carbon\Carbon::parse($terakhirKelas->created_at)->translatedFormat('d F Y H:i') }}</p>
                @else
                    <p class="text-muted">Belum ada data kelas.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
