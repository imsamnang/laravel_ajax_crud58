<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <br>
    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd">New Student</a>
  <br>
  <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">NIS</th>
        <th scope="col">Name</th>
        <th scope="col">Class</th>
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
        <form id="frmSave" action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
          </div>
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="class">Class</label>
            <input type="text" class="form-control" id="class" name="class">
          </div>                        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="frmAddClose">Close</button>
          <input type="hidden" name="student_id" id="student_id" value="">
          <input type="hidden" name="button_action" id="button_action" value="insert">
          <button type="submit" class="btn btn-primary" id="action">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javaScript">
  $(document).ready(function () {
    function getDataTable() {
      $.ajax({
        type: "GET",
        url: "{{route('students.get')}}",
        success: function (response) {
          $('#getdataTable').html(response);
        }
      });
    }
    getDataTable();
    $('#frmSave').submit(function (e) {
      e.preventDefault();
      var request = new FormData(this);
      $.ajax({
        type: "POST",
        url: "{{route('students.store')}}",
        data: request,
        contentType:false,
        cache:false,
        processData:false,
        success: function (response) {
          $('#frmAddClose').click();
          $('#frmSave')[0].reset();
          getDataTable();
        }
      });
    });

    $(document).on('click','.edit',function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: "{{url('students/edit')}}",
        data: {id:id},
        dataType: "JSON",
        success: function (data) {
          $('#nis').val(data.nis);
          $('#name').val(data.name);
          $('#class').val(data.class);
          $('#ModalAdd').modal('show');
          $('#action').text('Update');
          $('#student_id').val(data.id);
          $('.modal-title').text('Edit Data');
          $('#button_action').val('update');
        }
      });

    });

    $(document).on('click','.delete',function (e) {
      e.preventDefault();
      var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
          $.ajax({
              url:"{{route('students.destroy')}}",
              mehtod:"get",
              data:{id:id},
              success:function(data)
              {
                alert(data);
                getDataTable();
              }
          })
        } else {
          return false;
        }
    }); 
  });
</script>
</body>
</html>