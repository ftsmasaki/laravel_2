<div class="row">
    <div class="col-md-8">
        <!-- エラーメッセージ -->
        @include('license/message')

        <!-- 2個分のタブ -->
        <ul class="nav nav-tabs mb-2">
            <li class="nav-item">
                <a href="#tab-edit" class="nav-link active" data-toggle="tab">編集</a>
            </li>
            <li class="nav-item">
                <a href="#tab-seats" class="nav-link" data-toggle="tab">割り当て</a>
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
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="product_name">製品名</label></div>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_name" value="{{ $license->product_name }}"></div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="product_key">プロダクトキー</label></div>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_key" value="{{ $license->product_key }}"></div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="expire_date">有効期限</label></div>
                            <div class="col-md-6"><input type="date" class="form-control" name="expire_date" value="{{ $license->expire_date }}"></div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="purchase_date">購入日</label></div>
                            <div class="col-md-6"><input type="date" class="form-control" name="purchase_date" value="{{ $license->purchase_date }}"></div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="seats">割当数</label></div>
                            <div class="col-md-6"><input type="number" class="form-control" name="seats" value="{{ $license->seats }}"></div>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="is_notify">メール通知</label></div>
                            <div class="col-md-6">
                                <input type="hidden" class="form-check-input" name="is_notify" value="0">
                                <input type="checkbox" class="form-check-input" name="is_notify" {{ $license->is_notify == '1' ? ' checked="checked"' : '' }} value="1">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 text-end">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="/license" class="btn btn-primary">戻る</a>
                    </div>
                </form>
            </div>
            <div id="tab-seats" class="tab-pane">
                割り当てタブ
            </div>
        </div>
    </div>
</div>