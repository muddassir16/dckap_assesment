<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>
      @yield('title')
    </title>
    @include('partial.head')
    @stack('css') 
  </head>
  <body>
    <div id="wrapper">
      @include('partial.nav')
      @include('partial.header')
      @yield('content')
    </div>  
    @include('partial.footer')
    @include('partial.footer-script')
    @stack('js')
    @stack('script')
    <script>
      var is_session_expired = 'no';
      function check_session(){
          $.ajax({
            url:"{{ route('checksession') }}",
            method:"get",
          //  data: {"_token": "{{ csrf_token() }}"},
            success:function(data){
              if(data == '1')
              {
                $('#loginModal').modal({
                backdrop: 'static',
                keyboard: false,
                });
                is_session_expired = 'yes';
              }
            }
          });
        }
    
      var count_interval = setInterval(function(){
        check_session();
        if(is_session_expired == 'yes')
          {
            clearInterval(count_interval);
          }
      }, 10000);
      
      $('#loginform').on('submit', function(event){
        event.preventDefault();
        $.ajax({
          url:"{{ route('loginDckap') }}",
          method:"get",
          data:$(this).serialize(),
          success:function(response){
          if(response.error==0)
          {
            window.location.href = "{{ route('login') }}";
          }
          else
          {
            location.reload();
          }
          }
        });
      });
    </script>
  </body>
</html>
