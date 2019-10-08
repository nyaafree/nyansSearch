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
             登録エリア 一覧
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
                        @if ($areas)
                          @foreach ($areas as $area)
                              <tr>
                                  <td>{{ $area->id }}</td>
                                  <td>
                                      <a href="{{ url('admin/areas/'.$area->id.'/edit') }}" class="u-adlink">
                                      {{ $area->name }}</a>
                                  </td>
                              </tr>
                          @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-sm-7">
                <form action="/admin/areas" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">エリア名</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="エリア名を入力">

                        <button class="btn btn-primary u-btn-category" type="submit">エリアを追加</button>
                    </div>

                    @component('admin.includes.formErrors')

                    @endcomponent
                </form>
            </div>
        </div>

    </div>

    {{ $areas->links()}}

    @endcomponent




@endsection
