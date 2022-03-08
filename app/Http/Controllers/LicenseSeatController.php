<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseSeatRequest;
use App\Http\Controllers\Controller;
use App\Models\LicenseSeat;
use Illuminate\Pagination\Paginator;

class LicenseSeatController extends Controller
{
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $license_seats = LicenseSeat::all();
        $license_seats = LicenseSeat::sortable()->paginate(10);//1ページに10件表示
       
        // 取得した値をビュー「book/license」に渡す
        return view('license/index')->with('license_seats', $license_seats);
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $license_seat = LicenseSeat::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('license/edit', compact('license_seat'));
        
    }

    public function update(LicenseSeatRequest $request, $id)
    {
        $license_seat = LicenseSeat::findOrFail($id);
        $license_seat->product_name = $request->product_name;
        $license_seat->product_key = $request->product_key;
        $license_seat->expire_date = $request->expire_date;
        $license_seat->purchase_date = $request->purchase_date;
        $license_seat->is_notify = $request->is_notify;
        $license_seat->save();

        return redirect("/license");
    }

    public function destroy($id)
    {
        $license_seat = LicenseSeat::findOrFail($id);
        $license_seat->delete();

        return redirect("/license");
    }

    public function create()
    {
        // 空の$license_seatを渡す
        $license_seat = new LicenseSeat();
        return view('license/create', compact('license_seat'));
    }

    public function store(LicenseSeatRequest $request)
    {
        $license_seat = new LicenseSeat();
        $license_seat->product_name = $request->product_name;
        $license_seat->product_key = $request->product_key;
        $license_seat->expire_date = $request->expire_date;
        $license_seat->purchase_date = $request->purchase_date;
        $license_seat->is_notify = $request->is_notify;
        $license_seat->save();

        return redirect("/license");
    }

    public function show($id)
    {
        return view('license', ['license_seat' => LicenseSeat::findOrFail($id)]);
    }
}