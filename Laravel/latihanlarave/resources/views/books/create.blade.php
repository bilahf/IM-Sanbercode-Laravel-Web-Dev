@extends('layout.master')

@section('judul')
Buat buku
@endsection

@section('content')
<form action="/books" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control">
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label>Summary</label>
        <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
    </div>
    @error('summary')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label>Stock</label>
        <input type="text" name="stock" class="form-control">
    </div>
    @error('stock')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    @error('image')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">--pilih kategori--</option>
            @forelse ($category as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
            <option value="">Tidak ada kategori</option>
            @endforelse
        </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <!-- Tombol submit -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
