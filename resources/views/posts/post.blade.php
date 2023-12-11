    @extends('Landing.nav')
   
    @section('content')
    <table class="table">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th> description </th>
            <th>Show post</th>
            <th>delete post</th>
            <th>update  post</th>
        </tr>
        {{-- @dump($students) --}}

        @foreach ($posts as $pos)
            <tr>
                <td>
                    {{$pos['id']}}
                </td>
                <td>
                    {{$pos['title']}}
                </td>
                <td>
                    {{$pos['description']}}
                </td>

                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-warning" 
        href="{{route('posts.show',$pos['id'] )}}"> Show post</a>
                </td>
                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-danger" 
        href="{{route('posts.show',$pos['id'] )}}"> delete</a>
                </td>
                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-success" 
        href="{{route('posts.show',$pos['id'] )}}"> update</a>
                </td>
            </tr>
        @endforeach

    </table>
    @endsection


    @section("title")
        All posts
    @endsection
     {{-- @extends('Landing.slider') --}}