<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use App\Customer;
use Illuminate\Http\Request;

class DateRangeController extends Controller
{
	function index()
	{
		$customers = Customer::select('id','name')->get();
		// return $customers;
		return view('date_range',compact('customers'));
	}

	public function getInvoice(Request $request)
	{
		if($request->ajax()){
			$customer = Customer::findOrFail($request->customer_id);
			$invoices = $customer->invoices;
			$total = $invoices->sum('total');
			return response(['invoices'=>$invoices,'total'=>$total]);
		}
	}

	function fetch_data(Request $request)
	{
		if($request->ajax())
		{
		if($request->from_date != '' && $request->to_date != '')
		{
			// $data = DB::table('post')
			$data = Invoice::whereBetween('due_date', array($request->from_date, $request->to_date))->get();
		}
		else
		{
			// $data = DB::table('post')->orderBy('date', 'desc')->get();
			$data =Invoice::orderBy('due_date', 'desc')->get();
		}
		echo json_encode($data);
		}
	}
}

?>
