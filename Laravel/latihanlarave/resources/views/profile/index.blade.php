@extends('layout.master')

@section('judul')
Update Profile

@endsection

@section('content')
@extends('layout.master')

@section('judul')
Buat kategori

@endsection

@section('content')
<form action="/profile/{{$detailProfile->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label >Nama User</label>
        <input type="text"    value="{{$detailProfile->user->name}}" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label >Email User</label>
        <input type="text"   value="{{$detailProfile->user->email}}" class="form-control" disabled>
    </div>




    <div class="form-group">
        <label >Age</label>
        <input type="number"  name="age"  value="{{$detailProfile->age}}" class="form-control">
    </div>
    @error('age')
    <div class="alert alert-danger">{{$message}}</div>

    @enderror
    <div class="form-group">
        <label >bio</label>
        <textarea name="bio" class="form-control" cols="30" rows="10"  value="{{$detailProfile->bio}}"></textarea>
    </div>
    @error('bio')
    <div class="alert alert-danger">{{$message}}</div>

    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>







@endsection
