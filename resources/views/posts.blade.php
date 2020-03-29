@extends('layouts.app')
@section('content')
<body>
	<a href="{{route('Post.create')}}" class="btn btn-info m-3">Create Post</a>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created_At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->slug}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->user->name}}</td>
      <td><time>{{$post->created_at->format('d/m/Y')}}</time></td>
      <td>
        <a href="{{route('posts.show',['slug'=>$post->slug])}}" class="btn btn-success">Post Details</a>
        <a href="{{route('posts.edit',['postId'=>$post->id])}}" class="btn btn-info">Edit</a>
        <a href="{{route('posts.delete',['id'=>$post->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> Delete </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
@endsection