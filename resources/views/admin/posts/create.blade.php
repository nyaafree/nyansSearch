@extends('layouts.admin')
@section('content')


    @component('admin.includes.main')
    @component('admin.includes.title')
       クチコミ投稿
    @endcomponent
    <form action="/admin/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3">
               <div class="form-group">
                   <label for="file" class="u-label-img">画像</label>
                   <div>
                       <img src="{{ url('/images/noimage.png') }}" alt="" class="u-img-preview" width="50%">
                   </div>
                   <input type="file" name="file" id="u-image-input">
               </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="name">店舗名</label>
                    <input type="text" name="name" class="form-control" placeholder="店舗名を入力" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="category_id">カテゴリー</label>
                    <select name="category_id" class="form-control">
                        <option disabled selected>カテゴリを選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                              @if ($category->id == old('category_id'))
                                selected
                              @endif
                            >
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="area_id">地域</label>
                    <select name="area_id" class="form-control">
                        <option disabled selected>地域を選択してください</option>
                        @foreach ($areas as $area)
                           <option value="{{$area->id}}"
                            @if ($area->id == old('area_id'))
                              selected
                            @endif
                            >
                           {{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" placeholder="URLを入力" value="{{ old('url') }}">
                </div>
                <div class="form-group">
                     <label for="detail">詳細欄</label>
                     <textarea name="detail" rows="3" class="form-control">
                        {{ old('detail') }}
                     </textarea>
                </div>

                <div class="form-group">
                    <label for="review">口コミ</label>
                    <textarea name="review" rows="5" class="form-control" id="article-ckeditor">
                      {{ old('review') }}
                    </textarea>
                </div>
                <button class="btn btn-primary" type="submit">送信</button>
            </div>
        </div>



         @component('admin.includes.formErrors')

         @endcomponent


    </form>
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
    </script>
@endsection

