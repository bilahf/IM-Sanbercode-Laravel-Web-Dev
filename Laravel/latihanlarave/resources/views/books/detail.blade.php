@extends('layout.master')

@section('judul')
Halaman detail Buku
@endsection

@section('content')

    <img src="{{ asset('images/' . $books->image) }}" class="card-img-top" alt="{{ $books->title }}">

        <h3 class="card-title">{{ $books->title }}</h3>
        <p class="card-text">{{ $books->summary}}</p>
        <!-- Ganti href dengan URL detail buku -->
        <a href="/books" class="btn btn-primary btn-block btn-sm">kembali</a>
        @auth

        <h4 class="mt-4">Tambah Peminjaman</h4>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('peminjaman.store', $books->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
            <input type="date" name="tanggal_peminjaman" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Pinjam</button>
    </form>
        @endauth



    <!-- List Peminjaman -->
    <h4 class="mt-4">List Peminjaman</h4>
    @if ($borrow->isEmpty())
        <p>Belum ada peminjaman untuk buku ini.</p>
    @else
        <ul class="list-group">
            @foreach ($borrow as $peminjaman)
                <li class="list-group-item">
                    {{ $peminjaman->user->name }} - {{ $peminjaman->tanggal_peminjaman }} - {{ $peminjaman->tanggal_pengembalian }}
                </li>
            @endforeach
        </ul>
    @endif

@endsection
