<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Pagination\Paginator;

class CustomerController extends Controller
{
    public function index()
    {
        // DBよりCustomerテーブルの値を全て取得
        $customers = Customer::all();
        $customers = Customer::sortable()->paginate(10);//1ページに10件表示
              
        // 取得した値をビュー「customer/index」に渡す
        return view('customer/index', compact('customers'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つCustomerの情報を取得
        $customer = Customer::findOrFail($id);

        // 取得した値をビュー「customer/edit」に渡す
        return view('customer/edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->customer_name = $request->customer_name;
        $customer->save();

        return redirect("/customer");
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect("/customer");
    }

    public function create()
    {
        $customer = new Customer();
        return view('customer/create', compact('customer'));
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->save();

        return redirect("/customer");
    }

    public function show($id)
    {
        return view('customer', ['customer' => Customer::findOrFail($id)]);
    }

    public function search_customer()
    {
        return Customer::all();
    }
}