

@extends("Landing.nav")

@section("footer")
    copyright@ITI
@endsection

@section("title")
    Show category
@endsection


@section("content")
<div class="card" style="width: 18rem;">
<h5 class="card-title">{{$data["id"]}}</h5>
    <h5 class="card-title">{{$data["name"]}}</h5>
    <h5 class="card-title">created at:{{$data["created_at"]}}</h5>
    <h5 class="card-title">updated at{{$data["updated_at"]}}</h5>
    <div class="card-body">
      
      
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
    <ul>
    @foreach ($data->post as $pos )
        <li> <a href="{{route('posts.show2',$pos->id)}}" >{{$pos->title}}</a>   </li>
    @endforeach
    
    </ul>
     <img src="{{asset('Images/category_images/'.$data["logo"])}}" 
                    class="d-block w-100 h-20 " width="80" height="80" alt="...">
    </div>
  </div>

@endsection