<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Customer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function index()
    {
        // DBよりAssetテーブルの値を全て取得
        $assets = Asset::all();
        $assets = Asset::sortable()->paginate(10);//1ページに10件表示
              
        // 取得した値をビュー「asset/index」に渡す
        return view('asset/index', compact('assets'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つAssetの情報を取得
        $asset = Asset::findOrFail($id);

        // 取得した値をビュー「asset/edit」に渡す
        $customers = Customer::all();
        return view('asset/edit', compact('asset','customers'));
    }

    public function update(AssetRequest $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->customer_id = Customer::where('customer_name', $request->customer_name_choice)->value('id');
        $asset->asset_name = $request->asset_name;
        $asset->asset_user_name = $request->asset_user_name;
        $asset->save();

        return redirect("/asset");
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect("/asset");
    }

    public function create()
    {
        $asset = new Asset();
        $customers = Customer::select('id', 'customer_name')->get();
        return view('asset/create', compact('asset','customers'));
    }

    public function store(AssetRequest $request)
    {
        $asset = new Asset();

        $asset->customer_id = $request->selected->id;
        $asset->asset_name = $request->asset_name;
        $asset->asset_user_name = $request->asset_user_name;
        $asset->save();

        return redirect("/asset");
    }

    public function show($id)
    {
        return view('asset', ['asset' => Asset::findOrFail($id)]);
    }

}