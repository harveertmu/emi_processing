<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
    </div>
    <div class="clearfix"></div>

    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
      </div>
    </div>

    <br>

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section active">
        <!-- <h3>General</h3> -->
        <ul class="nav side-menu" style="">
          <li class="{{ Route::is('home.*') || Route::is('home.*')  ? 'active' : '' }}"><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu child_menu_active" >
              <li class="current-page"><a href="{{url('/home')}}">Dashboard</a></li>
              <!-- <li><a href="index2.html">Dashboard2</a></li>
              <li><a href="index3.html">Dashboard3</a></li> -->
            </ul>
          </li>
          <li class="{{ request()->path()==='users' || request()->path()==='users/create' || request()->path()==='users/*/edit'  ? 'active' : '' }}"><a><i class="fa fa-users"></i> User Managment <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu child_menu_active">
              <li><a href="{{url('/users')}}">User List</a></li>
              <li><a href="{{url('/loan-details')}}">Loan Details</a></li>
             
            </ul>
          </li>
        
       
        </ul>
      </div>
      <div class="menu_section">
        <!-- <h3>Live On</h3> -->
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Additional Settings <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{url('roles')}}">Role</a></li>
             
            </ul>
          </li>
          </ul>
      </div>
    </div>


    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      
      <a data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>

  </div>
</div>

<style>
  .child_menu_active{
    display: block !important;
  }
</style>  