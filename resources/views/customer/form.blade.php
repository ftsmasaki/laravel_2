<div class="row">
    <div class="ms-2 mt-2">
        <!-- エラーメッセージ -->
        @include('customer/message')

        <!-- 2個分のタブ -->
        <ul class="nav nav-tabs mb-2 col-md-8">
            <li class="nav-item">
                <a href="#tab-edit" class="nav-link active" data-toggle="tab">編集</a>
            </li>
            <!-- 現状、非表示 -->
            <li class="nav-item d-none">
                <a href="#tab-seats" class="nav-link" data-toggle="tab">割り当て</a>
            </li>
        </ul>
        
        <!-- コンテンツ部分 -->
        <div class="tab-content">
            <div id="tab-edit" class="tab-pane active">
                @if($target == 'store')
                <form action="/customer" method="post">
                @elseif($target == 'update')
                <form action="/customer/{{ $customer->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-4">
                        <div class="form-group d-md-flex mb-2">
                            <div class="col-md-2 d-flex align-items-center"><label for="product_name">顧客名</label></div>
                            @if($target == 'store')
                            <div class="col-md-6"><input type="text" class="form-control" name="customer_name" value=""></div>
                            @elseif($target == 'update')
                            <div class="col-md-6"><input type="text" class="form-control" name="customer_name" value="{{ $customer->customer_name }}"></div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8 mb-4 text-end">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="/customer" class="btn btn-primary">戻る</a>
                    </div>
                </form>
            </div>

            <!-- 現状、非表示 -->
            <div id="tab-seats" class="tab-pane d-none">
                割り当てタブ
            </div>

        </div>

        <!-- 1個分のタブ -->
        <ul class="nav nav-tabs mb-2 col-md-8">
            <li class="nav-item">
                <a href="#tab-seats" class="nav-link active" data-toggle="tab">割当て先</a>
            </li>
        </ul>

        <!-- コンテンツ部分 -->
        <div class="tab-content">
           <div id="tab-seats" class="tab-pane active">
            </div>
        </div>
    </div>
</div>