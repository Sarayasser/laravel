@extends('layouts.app')
@section('content')
<body>
  <div class="card m-3" style="width: 18rem;">
    <div class="card-header bg-info">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title : {{$post->title}}</h5>
    <p class="card-text">Description : {{$post->description}}</p>
  </div>
</div>
 <div class="card m-3" style="width: 18rem;">
  <div class="card-header bg-info">
    Post Creator
  </div>
  <div class="card-body">
    <p class="card-text">Name : {{$user->name}}</p>
    <p class="card-text">Email : {{$user->email}}</p>
  </div>
</div>
</body>
@endsection