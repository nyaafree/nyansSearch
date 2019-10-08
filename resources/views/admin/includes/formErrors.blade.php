@if(!$errors->isEmpty())
    <div>
        <div class="u-validate">
            <strong>エラー発生！フォーム入力に誤りがあります。</strong>
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
