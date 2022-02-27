<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseRequest;
use App\Http\Controllers\Controller;
use App\Models\License;

class LicenseController extends Controller
{
  public function index()
  {
      // DBよりBookテーブルの値を全て取得
      $licenses = License::all();

      // 取得した値をビュー「book/license」に渡す
      return view('license/index', compact('licenses'));
  }

  public function edit($id)
  {
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $license = License::findOrFail($id);

      // 取得した値をビュー「book/edit」に渡す
      return view('license/edit', compact('license'));
  }

  public function update(LicenseRequest $request, $id)
  {
      $license = License::findOrFail($id);
      $license->product_name = $request->product_name;
      $license->product_key = $request->product_key;
      $license->expire_date = $request->expire_date;
      $license->purchase_date = $request->purchase_date;
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
      // 空の$licenseを渡す
      $license = new License();
      return view('license/create', compact('license'));
  }
  
  public function store(LicenseRequest $request)
  {
      $license = new License();
      $license->product_name = $request->product_name;
      $license->product_key = $request->product_key;
      $license->expire_date = $request->expire_date;
      $license->purchase_date = $request->purchase_date;
      $license->is_notify = $request->is_notify;
      $license->save();
  
      return redirect("/license");
  }

  public function show($id)
  {
      return view('license', ['license' => License::findOrFail($id)]);
  }
}