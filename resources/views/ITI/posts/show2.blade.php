

@extends("Landing.nav")

@section("footer")
    copyright@ITI
@endsection

@section("title")
    Show day 2 post
@endsection


@section("content")
<div class="card" style="width: 18rem;">
<h5 class="card-title">{{$data["id"]}}</h5>
    <h5 class="card-title">{{$data["title"]}}</h5>
    
        <h5 class="card-title">category:<a href="{{route('categories.show',$data->category->id)}}">
        {{$data->category->name}}</a></h5>
  

    <div class="card-body">
      <h5 class="card-title">{{$data["sulg"]}}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    
     <img src="{{ asset('images/'.$data['image']) }}" 
                    class="d-block w-100 h-20 " width="80" height="80" alt="...">
    </div>
  </div>

@endsection