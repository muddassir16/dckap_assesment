<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\customer\CustomersModel;
use DataTables;

class CustomersController extends Controller
{
    public function index()
    {
        $user_role = $this->userRole()[0]->user_role;
        if($user_role == 2){
            return view('customers.index');
        } else {
            return abort(404);
        }
    }

    public function addEditCustomer(Request $request)
    {
        $id = $request->id;
        if($id==""){
            return view('customers.add_edit_customer');
        } else {
            $edit_id = base64_decode($id);
            $this->data['customer_datas'] = CustomersModel::where('id','=',$edit_id)->where('record_status','=',1)->first();
            return view('customers.add_edit_customer',$this->data);
        }
    }

    public function customersList(Request $request)
    {
        if ($request->ajax()) { 
            $gender_fltr = $request->input('gender_fltr');
            $zipcode_fltr = $request->input('search_zipcode_value');
            if (!empty($gender_fltr) || !empty($zipcode_fltr)) {
                $data = CustomersModel::latest()
                    ->where('user_role','!=',2)
                    ->where('record_status', 1)
                    ->when($gender_fltr, function ($query, $gender_fltr) {
                        if ($gender_fltr != '') {
                            return  $query->where(function ($query) use ($gender_fltr) {
                                    $query->where('gender','=',$gender_fltr);
                            });
                        }
                    })
                    ->when($zipcode_fltr, function ($query, $zipcode_fltr) {
                        if ($zipcode_fltr != '') {
                            return  $query->where(function ($query) use ($zipcode_fltr) {
                                    $query->where('zipcode', 'like', '%' . $zipcode_fltr . '%');
                            });
                        }
                    })
                    ->get(); 
            } else { 
                $data = CustomersModel::latest()->where('user_role','!=',2)->where('record_status', 1)->get(); 
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href=" '.route("customer.edit").'/'.base64_encode($data->id).'" class="customersupdate" data-id="'.$data->id.'" data-customers="'.$data->client_name.'" data-toggle="tooltip" data-original-title="Edit"><span class="label-edit"><i class="ti-pencil"></i></span> </a>';
                        $btn = $btn. '<a href="javascript:void(0)" data-id="'.base64_encode($data->id).'" class="single_delete" data-toggle="tooltip" data-original-title="Delete"><span class="label-delete own-alert1" alt="alert" class="img-responsive model_img"><i class="ti-trash"></i></span></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('CustomersModel');
    }

    public function store(Request $request){
        $returnValue = array();
        $customers_id = $request->input('customers_id');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $username = $request->input('username');
        $password = $request->input('password');
        if($customers_id == 0){
            $customer = new CustomersModel;
            $customer->fname = $request->input('fname');
            $customer->lname = $request->input('lname');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->gender = $request->input('gender');
            $customer->address = $request->input('address');
            $customer->zipcode = $request->input('zipcode');
            $customer->username = $request->input('username');
            $customer->password = $request->input('password');
            $customer->created_at = now();
            $customer->save();
            if(!empty($customer)){
                $returnValue['status'] = 'success';
                $returnValue['msg'] = "Customers Details Added Successfully";
            }else{
                $returnValue['status'] = 'error';
                $returnValue['msg'] = 'Customers Details Add failed';
            }
        } else {
            $customer = CustomersModel::find($customers_id);
            $customer->fname = $request->input('fname');
            $customer->lname = $request->input('lname');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->gender = $request->input('gender');
            $customer->address = $request->input('address');
            $customer->zipcode = $request->input('zipcode');
            $customer->username = $request->input('username');
            $customer->password = $request->input('password');
            $customer->modified_at = now();
            $customer->save();
            if(!empty($customer)){
                $returnValue['status'] = 'success';
                $returnValue['msg'] = 'Customers Details Updated Successfully';
            } else {
                $returnValue['status'] = 'error';
                $returnValue['msg'] = 'Customers Details Update Failed';
            }
        }
        return $returnValue;  
    }

    public function delete(Request $request)
    {
        $returnValue = array();
        $customers_id = base64_decode($request->id);
        $customers = CustomersModel::find($customers_id);
        $customers->record_status = '0';
        $customers->deleted_at = now(); 
        $customers->save();
        if($customers != ''){
            $returnValue['status'] = 'success';
            $returnValue['msg'] = 'Customer Deleted Successfully';
        } else {
            $returnValue['status'] = 'error';
            $returnValue['msg'] = 'Customer Delete Failed';
        }
        return $returnValue;
    }

    public function isExistEmail(Request $request)
    {
        $emailcount = CustomersModel::where('record_status',1)
            ->where('email',$request->email)
            ->where('id','!=', $request->customers_id)
            ->count();
        if($emailcount>0){
            echo "false";
        } else {
            echo "true";
        }
    }
}
