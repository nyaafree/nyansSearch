@extends('layouts.admin')
@section('content')

    @if (Session::has('flash_admin'))
    <div class="u-flash_message">
       {{ Session('flash_admin')}}
    </div>
    @endif


    @component('admin.includes.main')
    <div class="col-sm-11">
        @component('admin.includes.title')
             登録カテゴリ 一覧
        @endcomponent

        <div class="row">
            <div class="col-sm-5">
                <table class="table table-striped u-admin-category">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>カテゴリー名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories)
                          @foreach ($categories as $category)
                              <tr>
                                  <td>{{ $category->id }}</td>
                                  <td>
                                      <a href="{{ url('admin/categories/'.$category->id.'/edit') }}" class="u-adlink">
                                      {{ $category->name }}</a>
                                  </td>
                              </tr>
                          @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-sm-7">
                <form action="/admin/categories" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">カテゴリー名</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="カテゴリー名を入力">

                        <button class="btn btn-primary u-btn-category" type="submit">カテゴリーを追加</button>
                    </div>

                    @component('admin.includes.formErrors')

                    @endcomponent
                </form>
            </div>
        </div>

    </div>

   

    @endcomponent




@endsection
