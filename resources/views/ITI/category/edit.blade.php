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


<form action="{{ route('categories.update', ['category' => $data->id]) }}" method="post">

@method("put")


  {{-- 419 page expired -- csrf --}}
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" name="name" value="{{ old('name', $data->name)}}">
      @error("name")
        <div class="text-danger"> {{$message}} </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">logo</label>
    <input type="file" class="form-control" id="exampleInputPassword1" 
    name="logo" value="{{ old('logo', $data->logo)}}">
    @error("logo")
      <div class="text-danger"> {{$message}} </div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


@section("title")
  edit category
@endsection