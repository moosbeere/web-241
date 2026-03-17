@extends('layout')
@section('content')
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">ShortDesc</th>
      <th scope="col">Desc</th>
      <th scope="col">Preview_image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <td scope="row">{{$article->date}}</td>
      <td>{{$article->name}}</td>
      <td>{{$article->desc}}</td>
      <td>{{$article->shortDesc}}</td>
      <td><a href="/gallery/{{$article->full_image}}"><img src="{{URL::asset($article->preview_image)}}" alt="{{$article->preview_image}}" width=100 height=100></a></td>
    </tr>
    @endforeach
  </tbody>
</table> 
@endsection