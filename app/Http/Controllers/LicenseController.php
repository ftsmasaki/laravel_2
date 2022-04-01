<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseRequest;
use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\Product;
use App\Models\LicenseSeat;
use Illuminate\Pagination\Paginator;

class LicenseController extends Controller
{
    public function index()
    {
        // DBよりLicensesテーブルの値を全て取得
        $licenses = License::all();
        $licenses = License::sortable()->paginate(10);//1ページに10件表示

        // DBよりLicenseSeatsテーブルの値を全て取得
        $license_seats = LicenseSeat::all();
              
        // 取得した値をビュー「license/index」に渡す
        return view('license/index', compact('licenses', 'license_seats'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つLicensesの情報を取得
        $license = License::findOrFail($id);

        // DBよりURIパラメータと同じIDを持つLicenseSeatsの情報を取得
        $license_seats = LicenseSeat::where('license_id', $id)->get();

        return view('license/edit', compact('license', 'license_seats'));
        
    }

    public function update(LicenseRequest $request, $id)
    {
        $license = License::findOrFail($id);
        $license->product_id = $request->product_id;
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
        $products = Product::select('id', 'product_name')->get();
        return view('license/create', compact('license','products'));
    }

    public function store(LicenseRequest $request)
    {
        $license = new License();
        $license->product_id = $request->product_id;
        $license->product_key = $request->product_key;
        $license->expire_date = $request->expire_date;
        $license->purchase_date = $request->purchase_date;
        $license->seats = $request->seats;
        $license->is_notify = $request->is_notify;
        $license->save();

        return redirect("/license");
    }
}