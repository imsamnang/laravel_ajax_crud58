@include('layouts.klorofil.partials.head')
<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
      @include('layouts.klorofil.partials.top_navbar')
    <!-- END NAVBAR -->

    <!-- LEFT SIDEBAR -->
      @include('layouts.klorofil.partials.sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="content-heading clearfix">
          <div class="heading-left">
            <h1 class="page-title">Blank Page</h1>
            <p class="page-subtitle">Create your new page based on this starter page.</p>
          </div>
          <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Blank Page</li>
          </ul>
        </div>
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <!-- END MAIN CONTENT -->
      <!-- RIGHT SIDEBAR -->
        @include('layouts.klorofil.partials.right_sidebar')
      <!-- END RIGHT SIDEBAR -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
      @include('layouts.klorofil.partials.footer')
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  @include('layouts.klorofil.partials.script')
  @stack('js')
</body>

</html>