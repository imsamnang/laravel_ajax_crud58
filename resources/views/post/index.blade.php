<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
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
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="getdataTable">
    </tbody>
  </table>
</div>

<!-- Modal Add New Student -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAddTitle">Create Student</h5>
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
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <input type="text" class="form-control" id="body" name="body">
          </div>                     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="frmAddClose">Close</button>
          <input type="hidden" name="post_id" id="post_id" value="">
          <input type="hidden" name="button_action" id="button_action" value="insert">
          <button type="submit" class="btn btn-primary" id="action">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javaScript">
  $(document).ready(function () {
    // load data from database
    function getDataTable() {
      $.ajax({
        type: "GET",
        url: "{{route('posts.getPost')}}",
        success: function (response) {
          $('#getdataTable').html(response);
        }
      });
    }
    getDataTable();

    // insert or update data
    $('#frmSave').on('submit',function(e){
      e.preventDefault();
      var request = new FormData(this);
      $.ajax({
        type: "POST",
        url: "{{route('posts.store')}}",
        data: request,
        dataType: "JSON",
        contentType:false,
        cache:false,
        processData:false,
        success: function (data) {
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
          $('#frmSave')[0].reset();
          $('#frmAddClose').click();
          $('.modal-title').text('Create Post');
          $('#button_action').val('insert');
          $('#action').text('Save');
          $('#post_id').val(data.id);
          getDataTable();
        }
      });
    });

    $(document).on('click','.edit',function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: "{{route('posts.edit')}}",
        data: {id:id},
        dataType: "JSON",
        success: function (data) {
          $('#title').val(data.title);
          $('#body').val(data.body);
          $('#old_image').val(data.image);
          $('#ModalAdd').modal('show');
          $('.modal-title').text('Edit Post');
          $('#button_action').val('update');
          $('#action').text('Update');
          $('#post_id').val(data.id);
        }
      });
    });

    $(document).on('click','.delete',function (e) {
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
            type: "get",
            url: "{{route('posts.destroy')}}",
            data: {id:id},
            success: function (response) {
              getDataTable();
            }
          });
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your Data has been Deleted',
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