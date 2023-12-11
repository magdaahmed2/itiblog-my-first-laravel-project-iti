@extends('Landing.nav')
   
@section('content')

  @if ($errors->any())
    <div class="alert alert-danger" > 
        <ul @foreach ($errors->all() as $error)>
            <li> {{$error}} </li>
        </ul>
        @endforeach
    </div>
  @endif
{{-- @dump($data); --}}


<form action="{{route('posts.update',$data['id'])}}" method="post">
@method("put")
  {{-- 419 page expired -- csrf --}}
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" name="title" value="{{ old('title', $data->title)}}">
      @error("title")
        <div class="text-danger"> {{$message}} </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">slug</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="sulg" value="{{ old('sulg', $data->sulg)}}">
    @error("sulg")
      <div class="text-danger"> {{$message}} </div>
    @enderror
  </div>
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">body</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="body" value="{{ old('body', $data->body)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">version</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="version" value="{{ old('version', $data->version)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="image" value="{{ old('image', $data->image)}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


@section("title")
  edit post
@endsection