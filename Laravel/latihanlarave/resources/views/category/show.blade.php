@extends('layout.master')

@section('judul')
list kategori

@endsection

@section('content')

<a href="/category/create" class="btn btn-primary btn-sm mb-3">tambah</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @forelse ( $categories as $key => $value )
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}</td>
            <td>
                <form action="/category/{{$value->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/category/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/category/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>
            </td>

        </tr>

        @empty
        <tr>
            <td>tidak ada data</td>
        </tr>

        @endforelse

    </tbody>
  </table>


@endsection

