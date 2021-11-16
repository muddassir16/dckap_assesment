<?php

namespace App\Http\Controllers\queries;

use App\Http\Controllers\Controller;
use App\model\queries\QueriesModel;
use Illuminate\Http\Request;
use DataTables;
use Session;
use DB;

class QueriesController extends Controller
{
    public function index(Request $request){
        return view('queries.index');
    }

    public function queriesList(Request $request)
    {
        if ($request->ajax()) {
            $data = QueriesModel::latest()->select('tbl_queries.*','tbl_customers.fname',DB::raw("CONCAT(tbl_customers.fname,' ',tbl_customers.lname) AS customer_name"))
                    ->leftJoin('tbl_customers', 'tbl_queries.customer_id', '=', 'tbl_customers.id')
                    ->where('tbl_queries.record_status', 1)
                    ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="javascript:void(0)" class="queries_view" data-id="'.$data->id.'" data-scope="'.$data->scope_name.'" data-toggle="tooltip" data-original-title="Edit"><span class="label-edit"><i class="ti-pencil"></i> View</span></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('QueriesModel');
    }

    public function store(Request $request)
    {
        $returnValue = array();
        $scope = $request->input('scope');
        $queries_id = $request->input('queries_id');
        /*Add Queries*/
        if($queries_id == 0){
            $queries = new QueriesModel;
            $queries->customer_id = Session::get('loginid');
            $queries->name = $request->name;
            $queries->description = $request->description;
            $queries->created_at = now();
            $queries->save();
            if (!empty($queries)) {
                $returnValue['status'] = 'success';
                $returnValue['msg'] = 'Queries Added Successfully';
            } else {
                $returnValue['status'] = 'error';
                $returnValue['msg'] = 'Queries add Failed';
            }
        }
        return $returnValue;
    }

    public function view(Request $request){
        $queriesdata = QueriesModel::select('id','name','description')
            ->where('id','=',$request->id)
            ->where('record_status','=',1)
            ->first();
        return response()->json($queriesdata); die(); 
    }
}
