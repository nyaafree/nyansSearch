@extends('layouts.admin')
@section('content')


    @component('admin.includes.main')
    @component('admin.includes.title')
       口コミ編集
    @endcomponent


    @if (!empty($post))
    <form action="/admin/posts/{{ $post->id}}" method="POST" style="text-align:right">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning js-click-delete" id="u-btn-warning" >口コミ削除</button>

    </form>
    <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-3">
               <div class="form-group">
                   <label for="file" class="u-label-img">画像</label>
                   <div>
                       <img src="{{ url('/images/posts/'.$post->photo['filename']) }}" alt="" class="u-img-preview" width="50%">
                   </div>
                   <input type="file" name="file" id="u-image-input" >
               </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="name">店舗名</label>
                    <input type="text" name="name" class="form-control" value="{{$post->name}}">
                </div>
                <div class="form-group">
                    <label for="category_id">カテゴリー</label>
                    <select name="category_id" class="form-control">
                        <option disabled selected>カテゴリを選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{$post->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="area_id">地域</label>
                    <select name="area_id" class="form-control">
                        <option disabled selected>地域を選択してください</option>
                        @foreach ($areas as $area)
                           <option value="{{$area->id}}" {{ $post->area_id === $area->id ? 'selected' : ''}}>
                           {{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" placeholder="URLを入力" value="{{ $post->url}}">
                </div>
                <div class="form-group">
                        <label for="detail">詳細欄</label>
                        <textarea name="detail" rows="3" class="form-control">
                            {{ $post->detail }}
                        </textarea>
                    </div>
                <div class="form-group">
                    <label for="review">レビュー</label>
                    <textarea name="review" rows="5" class="form-control" id="article-ckeditor">
                        {{ $post->review }}
                    </textarea>
                </div>
                <button class="btn btn-primary" type="submit">送信</button>
            </div>
        </div>



         @component('admin.includes.formErrors')

         @endcomponent


    </form>
    @else
        <div class="u-edit-error">編集対象のデータが見つかりませんでした。URLをお確かめ下さい。</div>
    @endif

    @endcomponent

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>


        var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
        };

        CKEDITOR.replace( 'article-ckeditor', options);

        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('.u-img-preview').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#u-image-input').change(function(){
            readURL(this);
        });

        $('.js-click-delete').on('click', function(e){
            if(!confirm('本当にレビューを削除しますか？')){
                return false;
            }else{
                return true;
            }
        });
    </script>
@endsection

