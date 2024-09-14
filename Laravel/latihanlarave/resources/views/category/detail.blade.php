@extends('layout.master')

@section('judul')
Buat kategori

@endsection

@section('content')
<h1>{{$categories->name}}</h1>
<p>{{$categories->desc}}</p>
<div class="row">

    @forelse ($categories->books as $item)
    <div class="col-4">
       
            <div class="card">
                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->title }}</h3>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($item->summary, 60) }}</p>
                    <!-- Ganti href dengan URL detail buku -->
                    <a href="/books/{{ $item->id }}" class="btn btn-secondary btn-block btn-sm">Lihat Detail</a>

                </div>
            </div>

    </div>

    @empty
    <h3>Tidak ada postingan</h3>

    @endforelse
</div>
<a href="/category" class="btn btn-secondary btn-sm">Kembali</a>




@endsection
