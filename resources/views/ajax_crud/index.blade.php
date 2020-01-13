@extends('ajax_crud.layout')

@push('css')
    
@endpush

@section('content')
  <div class="row">
    <div class="col-md-12">
      <center>
        <h1>Laravel Ajax Crud</h1>
      </center>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add New</button>
  </div><br>
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
  <div class="row">
    <div class="table table-responsive">
      <table class="table table-bordered" id="crud-list">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $row)
          <tr class="post-{{$row->id}}">
              <td>{{++$key}}</td>
              <td>{{$row->title}}</td>
              <td>{{$row->body}}</td>
              <td>{{date_format($row->created_at,'d-m-Y')}}</td>
              <td>
                <a href="#" class="show-modal btn btn-info btn-xs" data-id="{{$row->id}}" data-title="{{$row->title}}" data-body="{{$row->body}}">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="#" class="edit-modal btn btn-warning btn-xs" data-id="{{$row->id}}" data-title="{{$row->title}}" data-body="{{$row->body}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="delete-modal btn btn-danger btn-xs" data-id="{{$row->id}}" data-title="{{$row->title}}" data-body="{{$row->body}}">
                  <i class="fa fa-trash"></i>
                </a>                            
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @include('ajax_crud.includes.addModal')
  @include('ajax_crud.includes.showModal')
  @include('ajax_crud.includes.editModal')
@endsection

@push('js')
  <script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });      
    });
    //function add (Save Data)
    $('#add').click(function(e){
      var title = $('#title ').val();
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "cruds/saveData",
        data: {
          '_token' : $('#_token').val(),
          'title':$('#title').val(),
          'body':$('#body').val(),
        },
        success: function (response) {
          if((response.errors)){
            $('.error').removeClass('hidden');
            $('.error').text(response.errors.title);
            $('.error').text(response.errors.body);
          } else {
            var create_date = moment(response.created_at).format('DD-MM-YYYY');
            $('.error').remove();
            $('#crud-list').append("<tr class='post-"+response.id+"'>"+
            "<td>"+response.id+"</td>"+
            "<td>"+response.title+"</td>"+
            "<td>"+response.body+"</td>"+
            "<td>"+create_date+"</td>"+
            "<td>"+
            "<a href='#' class='show-modal btn btn-info btn-xs' data-id='"+response.id+"' data-title='"+response.title+"' data-body='"+response.body+"'>"+
              "<i class='fa fa-eye'></i>"+
            "</a>"+
            "<a href='#' class='edit-modal btn btn-warning btn-xs' data-id='"+response.id+"' data-title='"+response.title+"' data-body='"+response.body+"'>"+
              "<i class='fa fa-edit'></i>"+
            "</a>"+
            "<a href='#' class='delete-modal btn btn-danger btn-xs' data-id='"+response.id+"' data-title='"+response.title+"' data-body='"+response.body+"'>"+
              "<i class='fa fa-trash'></i>"+
            "</a>"+                                  
            "</td>"+
            "</tr>");
          }
        }
      });
      $('#title').val('');
      $('#body').val('');
    });
    //show Detail
    $(document).on('click','.show-modal',function(e){
      e.preventDefault();
      $('#modalShow').modal('show');
      $('.modal-title').text('Show Detail');
    })
    //edit Modal
    $(document).on('click','.edit-modal',function(e){
      e.preventDefault();
      $('#modaledit').modal('show');
      $('#modaledit').find('#title').val($(this).data('title'));
      $('#modaledit').find('#body').val($(this).data('body'));
    });
  </script>
@endpush