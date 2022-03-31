<div class="row">
    <div class="ms-2 mt-2">
        <!-- エラーメッセージ -->
        @include('license/message')

        <!-- 2個分のタブ -->
        <ul class="nav nav-tabs mb-2 col-md-8">
            <li class="nav-item">
                <a href="#tab-edit" class="nav-link active" data-toggle="tab">編集</a>
            </li>
            <!-- 現状、非表示 -->
            <li class="nav-item d-none">
                <a href="#tab-2" class="nav-link" data-toggle="tab">割り当て</a>
            </li>
        </ul>
        
        <!-- コンテンツ部分 -->
        <div class="tab-content">
            <div id="tab-edit" class="tab-pane active">
                @if($target == 'store')
                <form action="/license" method="post">
                @elseif($target == 'update')
                <form action="/license/{{ $license->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-4">
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="product_name">製品名</label></div>
                            <div class="col-md-6">
                                @if($target == 'store')
                                <vue-select-component></vue-select-component>
                                @elseif($target == 'update')
                                <vue-select-component :laravel-objects="{{ $license }}"></vue-select-component>
                                @endif
                            </div>
                        </div>
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="product_key">プロダクトキー</label></div>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_key" value="{{ $license->product_key }}"></div>
                        </div>
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="expire_date">有効期限</label></div>
                            <div class="col-md-6"><input type="date" class="form-control" name="expire_date" value="{{ $license->expire_date }}"></div>
                        </div>
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="purchase_date">購入日</label></div>
                            <div class="col-md-6"><input type="date" class="form-control" name="purchase_date" value="{{ $license->purchase_date }}"></div>
                        </div>
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="seats">割当数</label></div>
                            <div class="col-md-6"><input type="number" class="form-control" name="seats" value="{{ $license->seats }}"></div>
                        </div>
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="is_notify">メール通知</label></div>
                            <div class="col-md-6">
                                <input type="hidden" class="form-check-input" name="is_notify" value="0">
                                <input type="checkbox" class="form-check-input" name="is_notify" {{ $license->is_notify == '1' ? ' checked="checked"' : '' }} value="1">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mb-4 text-end">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="/license" class="btn btn-primary">戻る</a>
                    </div>
                </form>
            </div>

            <!-- 現状、非表示 -->
            <div id="tab-2" class="tab-pane d-none">
                割り当てタブ
            </div>

        </div>

        @if($target == 'update')
            <!-- 1個分のタブ -->
            <ul class="nav nav-tabs mb-2 col-md-8">
                <li class="nav-item">
                    <a href="#tab-seats" class="nav-link active" data-toggle="tab">割当て先</a>
                </li>
            </ul>

            <!-- コンテンツ部分 -->
            <div class="tab-content col-md-8">
                <div id="tab-seats" class="tab-pane active">
                    <div class="table-responsive mb-4">
                        <table class="table text-center align-middle">
                            <thead class="table-dark align-middle">
                                <tr>
                                    <th>顧客名</th>
                                    <th>資産名</th>
                                    <th>ユーザー名</th>
                                    <th>削除</th>
                                </tr>
                        </thead>
                        @foreach($license_seats as $license_seat)
                        <tr>
                            <td>{{ $license_seat->asset->customer->customer_name }}</td>
                            <td>{{ $license_seat->asset->asset_name }}</td>
                            <td>{{ $license_seat->asset->asset_user_name }}</td>
                            <td>
                            <form action="/license/{{ $license_seat->id }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>