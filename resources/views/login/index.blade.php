<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/plugins/images/logo.png') }}">
<title>Login - dckap Co. Wll</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('assets/css/colors/blue.css') }}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
	.login-register {
    background: url("{{asset('assets/plugins/images/deer-bg.jpg') }}") center center/cover no-repeat !important;
    height: 100%;
    position: fixed;
}
</style>
</head>
<body>
<!-- Preloader -->
<!-- <div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div> -->
<section id="wrapper" class="login-register">
  <div class="login-box rown-dd">
    <div class="white-box">
    <span id="error_message"></span>
      <form class="form-horizontal form-material" id="loginform" method="post" action="javascript:void(0);">
        @csrf
        <input type="hidden" id="login_url" value="{{route('loginDckap')}}"/>
		  <div class="text-center"><img src="{{asset('assets/plugins/images/logo.png')}}" width='80px' height='80px' alt="home" /></div>
        <h3 class="box-title m-b-20">Sign In</h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div required class="col-xs-12">
            <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Log In</button>
          </div>
        </div>
        <!-- @if(Session::has('msg'))
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> {!!Session::get('msg')!!}
        </div>
    @endif -->
      </form>
      <form class="form-horizontal" id="recoverform">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('assets/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bower_components/jquery/dist/jquery.validate.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/bootstrap/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
  }
});
$('#loginform').validate({
  rules: {
    username: 'required', 
    password: {
      required: true,
      minlength: 4,
    }
  },
  messages: {
    username: 'This field is required',
    password: {
      minlength: 'Password must be at least 4 characters long'
    }
  },
  submitHandler: function(form) {
    var url = $('#login_url').val();
    var $form = $('#loginform');
    var values = $form.serialize();
    $.ajax({
      url: url,
      type: "post",
      data: values,
      dataType:'json',
      success: function(response) { 
        swal("", response.msg, (response.error == 1 ? 'success' : 'error'));
        if(response.error==1){
            if(response.url != '' ){
              window.location.href = response.url;
            }else{
              window.location.href = "{{ route('customers')}}";
            } 
        }
        else{
          $("#loginform")[0].reset();
        }
      }
    });
  }
});
</script>
</body>
</html>
