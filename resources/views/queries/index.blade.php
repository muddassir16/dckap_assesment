@extends('layouts.mainlayout')
@section('title', 'Queries')
@section('content')
@php use App\Http\Controllers\Controller; @endphp
@php
$controllerObj = new Controller();
$users = $controllerObj->userRole();
$user_role = $users[0]->user_role;
@endphp
<input type="hidden" id="queries_list_url" value="{{ route('queries.queriesList') }}"/>
<input type="hidden" id="queries_add_url" value="{{ route('queries.store') }}"/>
<input type="hidden" id="view_url" value="{{ route('queries.view') }}"/>
<!-- Preloader -->
<!-- <div class="preloader">
   <div class="cssload-speeding-wheel"></div>
</div> -->
<div id="wrapper">
   <!-- Top Navigation -->
   <?php //include("header.php"); ?>
   <!-- Left navbar-header end -->
   <!-- Page Content -->
   <div id="page-wrapper">
      <div class="container-fluid">
         <div class="clearfix"></div>
         @if($user_role == 1)
         <div class="row">
            <div class="col-sm-12">
               <div class="white-box">
                  <div class="row mana-top">
                     <div class="col-sm-3 sp-row">
                        <span class="head-title">Queries/Complaints</span>
                     </div>
                  </div>
                  <form id="queriesform" method="post" action="javascript:void(0);">
                  <div class="row bx-shd">
                     <div class="col-sm-3">
                        <label>Product/Services</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Name">  
                     </div>
                     <div class="col-sm-3">    
                        <label>Comments</label>    
                        <textarea class="form-control" name="description" placeholder="Write Something..."></textarea>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-sm-12 text-right m-t-10">
                        <input type="hidden" name="queries_id" id="queries_id" value="0">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                     </div>
                  </div>
                  </form>
                  <!--end-->                         
               </div>
            </div>
         </div>
         @endif
         @if($user_role == 2)
         <div class="row bx-shd m-t-10">
            <div class="col-sm-12 p-t-scope">
               <div class="white-box">
                  <div class="col-sm-12 m-b-10">
                     <label>Manage Queries</label>         
                  </div>
                  <div class="table-responsive m-t-split">
                     <table id="queries_table" class="table table-striped table-bordered act-adjust act-adjust1">
                        <thead>
                              <tr>
                                 <th style="width:30px;text-align:center;">Sl.No</th>
                                 <th>Customers</th>
                                 <th>Product/Services</th>
                                 <th class="text-nowrap"  style="width:90px;text-align:center;">Comments</th>  
                              </tr>
                        </thead>
                        <tbody class="rit" id="scopetable_tbody">  
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>    
         </div>
         @endif
         <div class="clearfix"></div>
         <!-- .right-sidebar -->
         <!-- /.right-sidebar -->
      </div>
      <!-- /.container-fluid -->
      <!-- <footer class="footer text-center">  </footer> -->
   </div>
   <!-- /#page-wrapper -->
   <?php //include("footer.php"); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog p-t-8" role="document" style="padding-top:50px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="desc"></P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
   <link href="{{ asset('assets/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('js')
   <script src="{{ asset('assets/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('js/queries/queries.js') }}"></script>   
@endpush