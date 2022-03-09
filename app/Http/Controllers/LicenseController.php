<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseRequest;
use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
    public function index()
    {
        // DBよりLicenseテーブルの値を全て取得
        $licenses = License::all();
        $licenses = License::sortable()->paginate(10);//1ページに10件表示
       
        //現在のページを変数に格納
        //$current_page = 'license';
        
        // 取得した値をビュー「license/index」に渡す
        return view('license/index', compact('licenses'));
        //return view('license/index')->with('licenses', $licenses); //withメソッドで渡す

    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つLicenseの情報を取得
        $license = License::findOrFail($id);

        // 取得した値をビュー「license/edit」に渡す
        $products = Product::all();
        return view('license/edit', compact('license','products'));
        
    }

    public function update(LicenseRequest $request, $id)
    {
        $license = License::findOrFail($id);
        $license->product_id = DB::table('products')->where('product_name', $request->product_name_choice)->value('id');
        $license->product_key = $request->product_key;
        $license->expire_date = $request->expire_date;
        $license->purchase_date = $request->purchase_date;
        $license->seats = $request->seats;
        $license->is_notify = $request->is_notify;
        $license->save();

        return redirect("/license");
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();

        return redirect("/license");
    }

    public function create()
    {
        $license = new License();
        $products = Product::all();
        return view('license/create', compact('license','products'));
    }

    public function store(LicenseRequest $request)
    {
        $license = new License();
        $license->product_id = DB::table('products')->where('product_name', $request->product_name_choice)->value('id');
        $license->product_key = $request->product_key;
        $license->expire_date = $request->expire_date;
        $license->purchase_date = $request->purchase_date;
        $license->seats = $request->seats;
        $license->is_notify = $request->is_notify;
        $license->save();

        return redirect("/license");
    }

    public function show($id)
    {
        return view('license', ['license' => License::findOrFail($id)]);
    }
}