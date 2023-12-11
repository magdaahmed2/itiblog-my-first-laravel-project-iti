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


<form action="{{route('posts.store')}}" method="post">
  {{-- 419 page expired -- csrf --}}
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" 

    aria-describedby="emailHelp" name="title" value="{{old('title')}}">
      @error("title")
        <div class="text-danger"> {{$message}} </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">slug</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
     name="sulg" value="{{old('sulg')}}">
    @error("sulg")
      <div class="text-danger"> {{$message}} </div>
    @enderror
  </div>
 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">body</label>
    <input type="text" class="form-control" id="exampleInputPassword1" 
    name="body"  value="{{old('body')}}">
     @error("body")
      <div class="text-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">version</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
     name="version" value="{{old('version')}}">
     @error("version")
      <div class="text-danger"> {{$message}} </div>
    @enderror
 <label for="exampleInputPassword1" class="form-label">category</label>
    <select class="form-select" aria-label="Default select example" name="category_id">
      <option selected>Open this select menu</option>
      @foreach ($data as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>


  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
     name="image" value="{{old('image')}}">

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


@section("title")
  create new post
@endsection