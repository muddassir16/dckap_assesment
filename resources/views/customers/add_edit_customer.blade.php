@extends('layouts.mainlayout')
@section('title', 'Customers')
@section('content')
<input type="hidden" id="url_to_store" value="{{ route('customer.store') }}"/>
<input type="hidden" id="customers_redirect_url" value="{{ route('customers') }}"/>
<input type="hidden" id="route_email_exist" value="{{ route('customer.isExistEmail') }}"/>
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
                    <span class="head-title">{!! ((@$customer_datas->id != ''  && @$customer_datas->id != null) ? 'Edit New Customer' : 'Add New Customer') !!}</span>
                </div>            
            </div>
            <form action="javascript:void(0)" id="formCustomer" method="post" class="validate go-bottom" enctype="multipart/form-data">
            <div class="clearfix"></div>
                <div class="row j-details"> 
                    <div class="col-sm-12">
                        <div class="white-box">                   
                            <!--Set one -->                   
                            <div class="row bx-shd">
                                <div class="col-sm-12"><h3 class="box-title">Customer Info</h3> </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>First Name </label>
                                        <input type="text" id="fname" name="fname" class="form-control" autocomplete="nope" placeholder="First Name" value="{!! @$customer_datas->fname !!}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Last Name </label>
                                        <input type="text" id="lname" name="lname" class="form-control" autocomplete="nope" placeholder="Last Name" value="{!! @$customer_datas->lname !!}">
                                    </div>
                                </div>
                                <div class="col-sm-3">    
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" id="phone" name="phone" autocomplete="nope" placeholder="Phone" class="form-control" value="{!! @$customer_datas->phone !!}"> 
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" id="email" name="email" class="form-control" autocomplete="nope" placeholder="Email" value="{!! @$customer_datas->email !!}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="gender">Gender</label>    
                                    <select class="form-control select2" id="gender" name="gender">
                                        <option value="">Choose</option>
                                        <option value="male" {{((@$customer_datas->gender == 'male') ? 'selected' : '')}}>Male</option>
                                        <option value="female" {{((@$customer_datas->gender == 'female') ? 'selected' : '')}}>Female</option>
                                        <option value="others" {{((@$customer_datas->gender == 'others') ? 'selected' : '')}}>Others</option>
                                    </select>
                                </div>
                                <div class="col-sm-3"> 
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="address" name="address" class="form-control" autocomplete="off" placeholder="Address" value="{!! @$customer_datas->address !!}"> 
                                    </div>
                                </div>     
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" id="zipcode" name="zipcode" class="form-control" autocomplete="nope" placeholder="Zip Code" value="{!! @$customer_datas->zipcode !!}"> 
                                    </div>   
                                </div>
                            </div>              
                            <!--end-->                                                
                            <div class="row bx-shd m-t-10">
                                <div class="col-sm-12 ">    
                                    <h3 class="box-title">Login Info</h3> 
                                </div>    
                                <div class="col-sm-3"> 
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="username" id="username" name="username" class="form-control" autocomplete="off" placeholder="Username" value="{!! @$customer_datas->username !!}"> 
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{!! @$customer_datas->password !!}">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right m-t-20">
                                    <input type="hidden" id="customers_id" name="customers_id" value= "{!! ((@$customer_datas->id != ''  && @$customer_datas->id != null) ? @$customer_datas->id : '') !!}">
                                    <button id="btnclients" class="btn btn-success waves-effect waves-light m-r-10">{!! ((@$customer_datas->id != ''  && @$customer_datas->id != null) ? 'Update' : 'Save') !!}</button>
                                    <a href="{{ route('customers') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </div> 
                            </div>       
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
                <!-- .right-sidebar -->
                <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
        <!-- <footer class="footer text-center">  </footer> -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection

@push('css')
    <link href="{{ asset('assets/plugins/bower_components/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />       
@endpush

@push('js')
<script src="{{ asset('assets/plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script src="{{ asset('js/customers/add_edit.js') }}"></script>
@endpush
    
    
