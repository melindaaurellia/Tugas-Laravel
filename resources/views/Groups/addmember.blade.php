@extends('layouts.app')

@section('title', 'groups')

@section('content')

<form action="/groups/addmember/{{$group->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Teman :</label>
    <select class="form-select" aria-label="Default select example" name="friend_id">
    <option selected>Pilih Teman Untuk Dimasukan Ke Groups</option>

    @foreach ($friend as $f)
        <option value="{{$f->id}}">{{$f->nama}}</options>
    @endforeach

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Tambah ke Group</button>
</form>
    

@endsection

