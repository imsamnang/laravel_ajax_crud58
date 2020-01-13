    <div id="sidebar-nav" class="sidebar">
      <nav>
        <ul class="nav" id="sidebar-nav-menu">
          <li class="menu-group">Main</li>
          <li class="panel">
            <a class="{!! request()->is('cpanel/*')?'active':'collapsed' !!}" href="#forms" data-toggle="collapse" data-parent="#sidebar-nav-menu">
              <i class="ti-receipt"></i> <span class="title">ELEMENTS</span> <i class="icon-submenu ti-angle-left"></i>
            </a>
            <div id="forms" class="{!! request()->is('cpanel/*')?'collapse in':'collapse' !!}">
              <ul class="submenu">
                <li><a href="{{url('/cpanel/form')}}" class="{!! request()->is('cpanel/form')?'active':'' !!}">Forms</a></li>
                <li><a href="{{url('/cpanel/table')}}" class="{!! request()->is('cpanel/table')?'active':'' !!}">Table</a></li>
                <li><a href="{{url('/cpanel/button')}}" class="{!! request()->is('cpanel/button')?'active':'' !!}">Button</a></li>
                <li><a href="{{url('/cpanel/select2')}}" class="{!! request()->is('cpanel/select2')?'active':'' !!}">Select2</a></li>
              </ul>
            </div>
          </li>
          <li class="panel">
            <a class="{!! request()->is('beer/*')?'active':'collapsed' !!}" href="#appViews" data-toggle="collapse" data-parent="#sidebar-nav-menu"><i class="ti-layout-tab-window"></i> <span class="title">BEER</span> <i class="icon-submenu ti-angle-left"></i></a>
            <div id="appViews" class="{!! request()->is('beer/*')?'collapse in':'collapse' !!}">
              <ul class="submenu">
                <li><a href="{{url('/beer/angkor')}}" class="{!! request()->is('beer/angkor')?'active':'' !!}">Angkor</a></li>
                <li><a href="{{url('/beer/tiger')}}" class="{!! request()->is('beer/tiger')?'active':'' !!}">Tiger</a></li>
                <li><a href="{{url('/beer/anchor')}}" class="{!! request()->is('beer/anchor')?'active':'' !!}">Anchor</a></li>
                <li><a href="{{url('/beer/abc')}}" class="{!! request()->is('beer/abc')?'active':'' !!}">ABC</a></li>
              </ul>
            </div>
          </li>
          <li class="panel">
            <a href="#tables" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed"><i class="ti-layout-grid2"></i> <span class="title">Tables</span> <i class="icon-submenu ti-angle-left"></i></a>
            <div id="tables" class="collapse ">
              <ul class="submenu">
                <li><a href="tables-static.html">Static Tables</a></li>
                <li><a href="tables-dynamic.html">Dynamic Tables</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <button type="button" class="btn-toggle-minified" title="Toggle Minified Menu"><i class="ti-arrows-horizontal"></i></button>
      </nav>
    </div>