@extends('layouts.admin')
@section('content')




    @component('admin.includes.main')

        @component('admin.includes.title')
             エリア名 編集
        @endcomponent
        <div class="row">
            <div class="col-sm-5">

                <form action="/admin/areas/{{ $area->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">エリア名</label>
                        <input type="text" class="form-control" name="name"
                        value="{{ $area->name }}">

                        <button class="btn btn-primary u-btn-category" type="submit">エリア名を変更</button>
                    </div>

                    @component('admin.includes.formErrors')

                    @endcomponent
                </form>
                <form action="/admin/areas/{{ $area->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning js-click-delete" id="u-btn-warning">エリアを削除</button>
                </form>
            </div>
        </div>




    @endcomponent

    <script>
        $('.js-click-delete').on('click', function(e){
            if(!confirm('本当にエリアを削除しますか？')){
                return false;
            }else{
                return true;
            }
        });
    </script>



@endsection
