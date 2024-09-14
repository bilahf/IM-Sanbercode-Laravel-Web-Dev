@extends('layout.master')

@section('judul')
Edit kategori

@endsection

@section('content')
<form action="/category/{{$categories->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label >Nama Kategori</label>
        <input type="text"  name="name"  value="{{$categories->name}}" class="form-control">
    </div>
    @error('name')
    <div class="alert alert-danger">{{$message}}</div>

    @enderror
    <div class="form-group">
        <label >Deskripsi Kategori</label>
        <textarea name="desc" class="form-control" cols="30" rows="10">{{$categories->desc}}</textarea>
    </div>
    @error('desc')
    <div class="alert alert-danger">{{$message}}</div>

    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection

