@extends('layouts.mainlayout')
@section('title', 'Customers')
@section('content')
<input type="hidden" id="customers_view_url" value="{{ route('customer.customersList') }}"/>   
<input type="hidden" id="customers_delete_url" value="{{ route('customer.delete') }}"/>
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
            <div class="row mana-top">
                <div class="col-sm-3 sp-row">
                    <span class="head-title">Manage Customers</span>
                </div>            
            </div> 
            <div class="row j-details">
                <div class="col-md-6">
                    <span class="head-title">List of Customers</span> 
                </div>
                <div class="col-md-2">
                    <select class="form-control select2" id="gender_fltr" name="gender_fltr">
                        <option value="">Choose</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" id="srch_zipcode" name="srch_zipcode" class="form-control" placeholder="Search Zipcode" value="">
                </div>
                <div class="col-md-1">
                    <label style="padding-top:10px;">count : <span class="count_val"></span></label>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('customer.add') }}" class="btn btn-danger p-t-8 pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light add" >Add</a> 
                </div>
                <div class="col-sm-12 p-t-8">
                    <div class="white-box">
                        <div class="table-responsive bx-shd">
                            <table id="myTable" class="table table-striped table-bordered act-adjust">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>gender</th>
                                        <th>zipcode</th>
                                        <th class="text-nowrap"  style="width:90px;text-align:center;">Action</th>  
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                  </div> 
              </div>
                <!-- .right-sidebar -->
                <!-- /.right-sidebar -->
          </div>
          <!-- /.container-fluid -->
          <!--   <footer class="footer text-center">  </footer>  -->
      </div>
        <!-- /#page-wrapper -->
		<?php //include("footer.php"); ?>
</div>
@endsection
@push('css')
    <link href="{{ asset('assets/plugins/bower_components/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- <link href="{{ asset('https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/> -->
@endpush

@push('js')
    <script src="{{ asset('assets/plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/customers/list.js') }}"></script>
@endpush



