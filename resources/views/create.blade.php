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

<form method="POST" action="{{route('posts.store')}}">
  @csrf
  <div class="form-group col-lg-3 m-3">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group col-lg-3 m-3">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">
  </div>
  <div class="form-group col-lg-3 m-3">
  <label for="exampleInputEmail1">Post Creator</label>
  <select class="custom-select" name="id">
  @foreach($users as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
</select>
  </div>
  <button type="submit" class="btn btn-primary m-3">Submit</button>
</form>
</body>
@endsection