$(document).ready(function(){
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') }
    });
  
   
        // (!$request->session()->exists('user'))
        // if($request->input('user')<20)
        // if($request->input(Session::get('key')==true))
        // (!$request->session()->exists('user'))
        // if($request->input('user')<20)
        // if($request->input(Session::get('key')==true))
   
   });  