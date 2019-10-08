@extends('layouts.admin')
@section('content')


    @component('admin.includes.main')
    @component('admin.includes.title')
       ユーザー編集
    @endcomponent

    @if (!empty($user))
    <form action="/admin/users/{{ $user->id }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" name="name" class="form-control" placeholder="名前を入力" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="aaa@b.com" value="{{$user->email}}">
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
                <option value="" >ユーザーの権限を選択</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id}}" {{ $user->role_id === $role->id ? 'selected' : ''}}>
                        {{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="active">会員属性</label>
            <select name="active" class="form-control">
                <option value="">アクティブかどうかを選択</option>
                <option value="1" {{ $user->active === 1 ? 'selected' : '' }}>アクティブ</option>
                <option value="2" {{ $user->active === 2 ? 'selected' : '' }}>退会済</option>
            </select>
         </div>

         @component('admin.includes.formErrors')

         @endcomponent

         <button class="btn btn-primary" type="submit">送信</button>
    </form>
    @else
      <div>ユーザーが見つかりませんでした。</div>
    @endif

    @endcomponent

@endsection
