@extends('layouts.app')
@section('content')
<body>
  @if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{route('posts.update',['post'=>$post->id])}}">
  @csrf
  <div class="form-group col-lg-3 m-3">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
  </div>
  <div class="form-group col-lg-3 m-3">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->description}}">
  </div>
  <div class="form-group col-lg-3 m-3">
  <label for="exampleInputEmail1">Post Creator</label>
  <select class="custom-select" name="id">
  <option value="{{$user->id}}">{{$user->name}}</option>
</select>
  </div>
  <button type="submit" class="btn btn-primary m-3">Update</button>
</form>
</body>
@endsection