@extends('print.print_layout')
@section('content')
  <div id="printPreview">
    <center>
    <h1>Student Information List </h1>
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
          @foreach ($students as $res)
            <tr>
              <th scope="row">{{$res->id}}</th>
              <td><img src="{{asset('Upload/student/'.$res->photo)}}" alt="Photo" width="30" height="30"></td>
              <td>{{$res->nis}}</td>
              <td>{{$res->name}}</td>
              <td>{{$res->class}}</td>
              <td>
                <a href="" class="btn btn-warning btn-sm edit" id="{{$res->id}}" data-id="{{$res->id}}">Edit</a> 
                <a href="" class="btn btn-danger btn-sm delete" id="{{$res->id}}" data-id="{{$res->id}}">Del</a>
              </td>
            </tr>
          @endforeach          
        </tbody>
      </table>
    </center>
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $(document).ready(function(){
      // $('.btnprn').printPage();
      $('.btnprn').click(function(e){
        e.preventDefault();
        $("#printPreview").printThis({
          debug: false,               // show the iframe for debugging
          importCSS: true,            // import parent page css
          importStyle: false,         // import style tags
          printContainer: true,       // print outer container/$.selector
          loadCSS: "",                // path to additional css file - use an array [] for multiple
          pageTitle: "",              // add title to print page
          removeInline: false,        // remove inline styles from print elements
          removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
          printDelay: 333,            // variable print delay
          header: null,               // prefix to html
          footer: null,               // postfix to html
          base: false,                // preserve the BASE tag or accept a string for the URL
          formValues: true,           // preserve input/form values
          canvas: false,              // copy canvas content
          doctypeString: '...',       // enter a different doctype for older markup
          removeScripts: false,       // remove script tags from print content
          copyTagClasses: false,      // copy classes from the html & body tag
          beforePrintEvent: null,     // function for printEvent in iframe
          beforePrint: null,          // function called before iframe is filled
          afterPrint: null            // function called before iframe is removed
        });        
      })
    });
  </script>    
@endpush