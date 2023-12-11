    @extends('Landing.nav')
   
    @section('content')
    
    <a class="btn btn-primary " href="{{route('posts.create')}}"> create post </a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th> slug </th>
            <th>body</th>
            <th> vergion </th>
             <th>image</th>
            <th>show</th>
            @can("is-admin")
             <th>delete</th>
             
             @endcan
              <th>     edit</th>
        </tr>
        {{-- @dump($students) --}}

        @foreach ($data as $pos)
            <tr>
                <td>
                    {{$pos['id']}}
                </td>
                <td>
                    {{$pos['title']}}
                </td>
                <td>
                    {{$pos['sulg']}}
                </td>
                <td>
                    {{$pos['body']}}
                </td>
                <td>
                    {{$pos['version']}}
                </td>
                <td>
                    <img src="{{ asset('images/'.$pos['image']) }}" 
                    class="d-block w-100 h-20 " width="50" height="50" alt="...">
                </td>

                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-warning" 
        href="{{route('posts.show2',$pos['id'] )}}"> Show post</a>
                </td>
                <td>
                  
<!-- Delete button -->
@can("is-admin")
<a class="btn btn-danger delete-btn" data-id="{{ $pos['id'] }}"
 href="{{ route('posts.delete', $pos['id']) }}">Delete</a>
@endcan
<!-- Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" id="confirmDeleteButton" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to trigger the modal -->
<script>
  $(document).ready(function () {
    $('.delete-btn').click(function (e) {
      e.preventDefault(); // Prevent the default link behavior
      var postId = $(this).data('id');
      $('#confirmDeleteButton').attr('href', "{{ route('posts.delete', ':id') }}".replace(':id', postId));
      $('#deleteConfirmationModal').modal('show');
    });
  });
</script>


                </td>

               
                <td>
                  
                   <a class="btn btn-info " 
        href="{{route('posts.edit',$pos['id'] )}}"> edit</a>
                </td>
                
            </tr>
        @endforeach

    </table>
    @endsection


    @section("title")
        All posts
    @endsection
     {{-- @extends('Landing.slider') --}}