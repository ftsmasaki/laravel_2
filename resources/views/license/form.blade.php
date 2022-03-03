<div class="row">
    <div class="col-md-8">
        @include('license/message')
        
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

            <div class="col-md-8 mb-4 text-end">
                <button type="submit" class="btn btn-primary">登録</button>
                <a href="/license" class="btn btn-primary">戻る</a>
            </div>
        </form>
    </div>
</div>