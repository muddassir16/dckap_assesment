<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/plugins/images/logo.png')}}">
<!-- <title>Abc</title> -->
<!-- Bootstrap Core CSS -->
<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{ asset('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/dan.css') }}" rel="stylesheet">
<!--alerts CSS -->
<link href="{{ asset('assets/plugins/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
<!-- color CSS you can use different color css from css/colors folder -->
<link href="{{ asset('assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog modal-sm" style="padding-top:50px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">You are trying without login. Session Expired! Login Again</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="loginform">  
          @csrf
          <input type="text" name="username" placeholder="Enter Username" class="form-control" required /><br />  
          <input type="password" name="password" placeholder="Enter Password" class="form-control" required /><br />  
          <input type="submit" name="submit" id="submit" class="btn btn-info" value="Login" />  
        </form>
      </div>
    </div>
  </div>
</div>

