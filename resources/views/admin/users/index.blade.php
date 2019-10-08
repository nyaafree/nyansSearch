@extends('layouts.admin')
@section('content')

   @if (Session::has('flash_admin'))
   <div class="u-flash_message">
      {{ Session('flash_admin')}}
   </div>
   @endif


    @component('admin.includes.main')
    @component('admin.includes.title')
        ユーザー情報
    @endcomponent


        <table class="table table-striped u-admin-user u-scroll-box">
            <thead>
                <tr>
                    <th>#</th>
                    <th>氏名</th>
                    <th>E-mail</th>
                    <th class="u-sp-none">管理者権限</th>
                    <th class="u-sp-none">会員属性</th>
                    <th class="u-sp-none">ユーザー登録日</th>
                    <th class="u-sp-none">ユーザー情報更新日</th>
                </tr>
           </thead>
           <tbody>
               @if ($users)
                  @foreach($users as $user)
                      <tr>
                          <td>{{$user->id}}</td>
                          <td><a href="{{ url('/admin/users/'.$user->id.'/edit')}}" class="u-edit-user">{{$user->name}}</a></td>
                          <td>{{$user->email}}</td>
                          <td class="u-sp-none">{{$user->role_id === 1 ? '管理者' : 'ゲストユーザー'}}</td>
                          <td class="u-sp-none">{{$user->active === 1 ? 'アクティブ' : '退会済み'}}</td>
                          <td class="u-sp-none">{{$user->created_at->diffForHumans() }}</td>
                          <td class="u-sp-none">{{$user->updated_at->diffForHumans() }}</td>
                      </tr>
                  @endforeach
               @endif
           </tbody>
        </table>

        {{ $users->links()}}
    @endcomponent




@endsection
