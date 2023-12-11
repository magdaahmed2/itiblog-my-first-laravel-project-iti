

@extends("Landing.nav")

@section("footer")
    copyright@ITI
@endsection

@section("title")
    Show post
@endsection


@section("content")
<div class="card" style="width: 18rem;">
<h5 class="card-title">{{$pos["id"]}}</h5>
    <h5 class="card-title">{{$pos["title"]}}</h5>
    <div class="card-body">
      <h5 class="card-title">{{$pos["description"]}}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    <img src="{{ asset('images/im1.jpg') }}" class="d-block w-100 h-20" alt="...">
    </div>
  </div>

@endsection