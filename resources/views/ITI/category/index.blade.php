    @extends('Landing.nav')
   
    @section('content')
    @can("is-admin")
    <a class="btn btn-primary " href="{{route('categories.create')}}"> create category </a>
    @endcan
    <table class="table">
   
        <tr>
            <th>ID</th>
            <th>name</th>
            <th> logo </th>
            
            <th>show</th>
             <th>delete</th>
              <th>edit</th>
        </tr>
        {{-- @dump($students) --}}

        @foreach ($data as $cat)
            <tr>
                <td>
                    {{$cat['id']}}
                </td>
                <td>
                    {{$cat['name']}}
                </td>
               
                
                <td>
                   <img src="{{asset('Images/category_images/'.$cat["logo"])}}"
                    class="d-block w-100 h-20 " width="50" height="80" alt="...">
                </td>

                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-warning" 
        href="{{route('categories.show',$cat)}}"> Show Categories</a>
                </td>
                <td>
                  
<!-- Delete button -->

   
<form method="post" action={{ route('categories.destroy', $cat->id) }}>@method("delete") @csrf
    {{-- <input class="btn btn-danger delete-btn" type="submit" value="Delete"> --}}
    <input class="btn btn-danger delete-btn" data-id="{{ $cat->id }}" type="submit" value="Delete">
    

</form>


<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form method="post" id="deleteForm" action="">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $('.delete-btn').click(function (e) {
      e.preventDefault(); // Prevent the default form submission
      var categoryId = $(this).data('id'); // Get the ID from the clicked button
      var deleteUrl = "{{ route('categories.destroy', ':id') }}".replace(':id', categoryId);
      $('#deleteForm').attr('action', deleteUrl); // Set the form action
      $('#deleteConfirmationModal').modal('show'); // Show the modal
    });
  });
</script>





                </td>
                <td>
                   {{-- <a class="btn btn-warning" 
                   href="/iti/students/{{$std['id']}}"> Show </a> --}}
                   <a class="btn btn-info" 
        href="{{route('categories.edit',$cat)}}"> edit</a>
                </td>
            </tr>
        @endforeach

    </table>
    @endsection


    @section("title")
        category page
    @endsection
     {{-- @extends('Landing.slider') --}}