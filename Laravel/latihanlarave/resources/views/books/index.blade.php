@extends('layout.master')

@section('judul')
Halaman Buku
@endsection

@section('content')
@auth

<a href="/books/create" class="btn btn-primary btn-sm mb-4">Tambah Post</a>
@endauth
<div class="row">
    @forelse ($books as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
            <div class="card-body">
                <h3 class="card-title">{{ $item->title }}</h3><br>
                <span class="badge badge-info">{{ $item->category->name }}</span>
                <span class="badge badge-warning">{{ $item->stock }}</span>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->summary, 60) }}</p>
                <!-- Ganti href dengan URL detail buku -->
                <a href="/books/{{ $item->id }}" class="btn btn-secondary btn-block btn-sm">Lihat Detail</a>
                @auth

                <div class="row my-2">
                    <div class="col">
                        <a href="/books/{{ $item->id }}/edit" class="btn btn-info btn-block btn-sm">Edit</a>

                    </div>
                    <div class="col">
                        <form action="/books/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block btn-sm">Hapus</button>
                    </div>

                </div>
                @endauth
            </div>
        </div>
    </div>
    @empty
    <h2>Tidak ada postingan</h2>
    @endforelse
</div>
@endsection
