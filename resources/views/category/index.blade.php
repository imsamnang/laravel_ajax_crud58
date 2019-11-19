<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
    <style>
      @media (min-width: 1200px){
        .modal-xlg {
          max-width: 95%;
        }
      }
    </style>
</head>
<body>

<div class="container">
  <h2 class="text-center text-success">Ajax Crud with image upload.</h2>
  <br>
    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd">New Post</a>
  <br>
  <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="getdataTable">
    </tbody>
  </table>
</div>

<!-- Modal Add New Student -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddTitle">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmSave" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <input type="hidden" name="old_image" id="old_image" value="">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="frmAddClose">Close</button>
          <input type="hidden" name="cat_id" id="cat_id" value="">
          <input type="hidden" name="button_action" id="button_action" value="insert">
          <button type="submit" class="btn btn-primary" id="action">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Student -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="ModalEditLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditTitle">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEdit" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <input type="hidden" name="old_image" id="old_image" value="">
            <input type="hidden" name="cat_id" id="cat_id" value="">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <img src="" alt="" id="img_edit" width="40" height="40">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="frmEditClose">Close</button>
          <input type="hidden" name="button_action" id="button_action" value="insert">
          <button type="submit" class="btn btn-primary" id="action">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javaScript">
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function getData() {
      $.ajax({
        type: "get",
        url: "{{route('category.get')}}",
        success: function (data) {
          $('#getdataTable').html(data)
        }
      });
    }
    getData();
    //  save data to database with ajax
    $('#frmSave').on('submit',function (e) {
      e.preventDefault();
      var request = new FormData(this);
      $.ajax({
        type: "post",
        url: "{{route('category.store')}}",
        data: request,
        contentType:false,
        cache:false,
        processData:false,
        success: function (data) {
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your Data has been saved',
            showConfirmButton: false,
            timer: 1500
          })
          $('#frmSave')[0].reset();
          $('#frmAddClose').click();
          $('#cat_id').val(data.id);  
          $('#old_image').val(data.image);
          getData();
        }
      });
    });

    //  show edit form for update
    $(document).on('click','.edit',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      $.get("{{route('category.edit')}}", {id:id},
        function (data) {
          console.log(data);
         $('#ModalEdit').modal('show');
         $('#frmEdit').find('#name').val(data.name); 
         $('#frmEdit').find('#old_image').val(data.image);         
         $('#frmEdit').find('#cat_id').val(data.id);
         $('#frmEdit').find('#img_edit').attr('src','{{asset("upload/category")}}/'+data.image);
        }
      );
    });

    //update data to database
    $('#frmEdit').on('submit',function(e){
      e.preventDefault();
      var request = new FormData(this);
      $.ajax({
        type: "POST",
        url: "{{route('category.update')}}",
        data: request,
        contentType: false,
        cache:false,
        processData:false,
        success: function (data) {
          $('#frmEdit').trigger('reset');
          $('#frmEditClose').click();
          getData();
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your Data has been updated Successfully',
            showConfirmButton: false,
            timer: 1500
          })
        }
      });
    });

    // delete data from database
    $(document).on('click','.delete',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "POST",
            url: "{{route('category.destroy')}}",
            data: {id:id},
            dataType: "JSON",
            success: function (data) {
              getData();
            }
          });          
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your Data has been deleted',
            showConfirmButton: false,
            timer: 1500
          })
        }
      })      

    });
  });
</script>
</body>
</html>