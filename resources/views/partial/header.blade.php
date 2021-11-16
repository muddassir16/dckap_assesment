@php use App\Http\Controllers\Controller; @endphp
@php
$controllerObj = new Controller();
$users = $controllerObj->userRole();
$user_role = $users[0]->user_role;
@endphp
<style>
#side-menu > li > a:hover{background: transparent !important;}
#side-menu > li > a:hover, #side-menu > li > a:focus, #side-menu > li > a:active {
    background-color: transparent !important;
}
</style>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header cuz"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="javascript:void(0)"><b><img src= "{{ asset('assets/plugins/images/logo.png') }}" alt="home" /></b><span class="hidden-xs"></span></a>
        </div>              
        <!--menu-->  
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> 
                        </div>
                        <!-- /input-group -->
                    </li>
                    @if($user_role == 2)
                    <li> <a href="{{ route('customers') }}" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw text-danger"></i> <span class="hide-menu text-danger"><i class="icon-people m-r-5"></i>Customers<span class="fa arrow"></span></span></a>                
                    </li>
                    @endif
                    <li> <a href="{{ route('queries') }}" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw text-danger"></i> <span class="hide-menu text-danger"><i class="icon-briefcase m-r-5"></i>Queries<span class="fa arrow"></span></span></a>                
                    </li>
                </ul>
            </div>
        </div>             
        <!--end-->
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>    
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right"> 
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{asset('assets/plugins/images/users/varun.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><span><?php echo (Session::get('loginuser')); ?></b></a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    <!-- <li><a href="{{url('login')}}"><i class="fa fa-power-off"></i> Logout</a></li> -->
                </ul>
                <!-- /.dropdown-user -->
            </li>
                    <!-- .Megamenu -->
                    <!-- /.Megamenu -->
                    <!-- /.dropdown -->
        </ul>
    </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
</nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->


