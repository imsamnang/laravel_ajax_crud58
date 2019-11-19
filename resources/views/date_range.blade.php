<!DOCTYPE html>
<html>
 <head>
  <title>Date Range Fiter Data in Laravel using Ajax</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
    <div class="form-group">
      <select name="invid" id="invid" class="form-control">
      <option value="0">Select Customer</option>
        @foreach ($customers as $customer)            
          <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
      </select>
    </div>
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
      <div class="col-md-5">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th width="10%" style="text-align: center">InvID:</th>
         <th width="30%" style="text-align: center">Customer Name</th>
         <th width="25%" style="text-align: center">Issue Date</th>
         <th width="25%" style="text-align: center">Due Date</th>
         <th width="10%" style="text-align: center">Price</th>
        </tr>
       </thead>
       <tbody>
       
       </tbody>
       <tfoot>

       </tfoot>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var date = new Date();

  $('#invid').on('change',function(){
    var invid = $(this).val();    
    getInvoice(invid);
  });

  $('.input-daterange').datepicker({
    todayBtn: 'linked',
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  var _token = $('input[name="_token"]').val();

  // fetch_data();

  function fetch_data(from_date = '', to_date = '')
  {
    $.ajax({
    url:"{{ route('daterange.fetch_data') }}",
    method:"POST",
    data:{from_date:from_date, to_date:to_date, _token:_token},
    dataType:"json",
    success:function(data)
    {
      var output = '';
      $('#total_records').text(data.length);
      for(var count = 0; count < data.length; count++)
      {
      output += '<tr>';
      output += '<td>' + data[count].post_title + '</td>';
      output += '<td>' + data[count].post_description + '</td>';
      output += '<td>' + data[count].date + '</td></tr>';
      }
      $('tbody').html(output);
    }
    })
  }

  $('#filter').click(function()
  {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date != '' &&  to_date != '')
    {
    fetch_data(from_date, to_date);
    }
    else
    {
    alert('Both Date is required');
    }
  });

  $('#refresh').click(function()
  {
    $('#from_date').val('');
    $('#to_date').val('');
    fetch_data();
  });

});

function getInvoice(customer_id) {
  $.ajax({
    type: "get",
    url: "{{url('getInvoice')}}",
    data:{customer_id:customer_id}, 
    dataType: "json",
    success: function (response) {
      console.log(response);
      $('tbody').empty();
        $('tfoot').empty();
      $.each(response.invoices,function(i,inv) {
        // show table
        var row = $('<tr/>');
        row.append($('<td/>',{
          text:inv.id
        })).append($('<td/>',{
          text:inv.customer.name
        })).append($('<td/>',{
          text:inv.issue_date
        })).append($('<td/>',{
          text:inv.due_date
        })).append($('<td/>',{
          text:inv.total
        }))
        // append to tbody
        $('tbody').append(row);
      });
      // appley total 
      $('tfoot').append($('<tr/>',{

      })).append($('<td/>',{
        text : 'Total Price',
        colspan:4,
        style : ['background-color:#ccc;font-weight:bold;text-align:center']
      })).append($('<td/>',{
        text:response.total,
        style : ['font-weight:bold;text-align:center']
      }))
    }
  });
};
  

</script>