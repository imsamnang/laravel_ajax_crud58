  <div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title" required>
    <p class="error text-center alert alert-danger hidden"></p>
  </div>
  <div class="form-group">
    <label for="body">Body:</label>
    <input type="text" class="form-control" id="body" placeholder="Enter Body" required>
    <p class="error text-center alert alert-danger hidden"></p>
  </div>
  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-success pull-right" id="{{$formName=='create'?'add':'edit'}}">
    {{$formName=='create'?'Submit':'Update'}}
  </button>
