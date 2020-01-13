<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/bootstrap/favicon.ico') }}">
    <title>Fixed Top Navbar Example for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('css')
  </head>

  <body>
    <div class="container">
      <div class="col-md-12">
        @yield('content')
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.printPage.js') }}"></script> --}}
    <script src="{{ asset('js/printThis.js') }}"></script>    
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // $('.btnprn').printPage();
        $('.btnprn').click(function(e){
          e.preventDefault();
          $("#printPreview").printThis({
            debug: false,               // show the iframe for debugging
            importCSS: false,            // import parent page css
            importStyle: false,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "{{ asset('assets/bootstrap/css/bootstrap.min.css') }}",  // path to additional css file - use an array [] for multiple
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
    @stack('js')
  </body>
</html>
