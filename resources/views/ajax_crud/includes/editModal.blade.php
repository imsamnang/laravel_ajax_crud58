<form action="" method="POST">
  <!-- Modal -->
  <div class="modal fade" id="modaledit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Content</h4>
        </div>
        <div class="modal-body">
          @include('ajax_crud.includes.form',['formName'=>'edit'])
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
      
    </div>
  </div>
</form>