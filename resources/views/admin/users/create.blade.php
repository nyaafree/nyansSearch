@extends('layouts.admin')
@section('content')


    @component('admin.includes.main')
    @component('admin.includes.title')
       ユーザー登録
    @endcomponent
    <form action="/admin/users" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" name="name" class="form-control" placeholder="名前を入力">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="aaa@b.com">
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" class="form-control" placeholder="12345678">
        </div>
        <div class="form-group">
            <label for="password_re">パスワード（再入力）</label>
            <input type="password" name="password_re" class="form-control" placeholder="12345678">
        </div>
        <div class="form-group">
            <label for="role_id">管理者権限</label>
            <select name="role_id" class="form-control">
                <option value="" disabled selected>ユーザーの権限を選択</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id}}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="active">会員属性</label>
            <select name="active" class="form-control">
                <option value="" disabled selected>アクティブかどうかを選択</option>
                <option value="1">アクティブ</option>
                <option value="2">退会済</option>
            </select>
         </div>

         @component('admin.includes.formErrors')

         @endcomponent

         <button class="btn btn-primary" type="submit">送信</button>
    </form>
    @endcomponent

@endsection
