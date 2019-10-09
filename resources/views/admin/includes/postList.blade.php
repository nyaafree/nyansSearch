<table class="table table-striped u-admin-user u-scroll-box">
        <thead>
            <tr>
                <th>#</th>
                <th>画像</th>
                <th>店舗名</th>
                <th class="u-sp-none">エリア</th>
                <th class="u-sp-none">カテゴリー</th>
                <th class="u-sp-none">投稿ユーザー</th>
                <th class="u-sp-none">クチコミ登録日</th>
                <th class="u-sp-none">クチコミ情報更新日</th>
            </tr>
       </thead>
       <tbody>
           @if ($posts)
              @foreach($posts as $post)
                  <tr>
                      <td>{{$post->id}}</td>
                      <td>
                          <img src="{{ url('/images/posts/'.$post->photo['filename']) }}" id="u-post-img">
                      </td>
                      <td><a href="{{ url('/admin/posts/'.$post->id.'/edit')}}" class="u-edit-user">{{$post->name}}</a></td>
                      <td class="u-sp-none">{{ $post->area->name }}</td>
                      <td class="u-sp-none">{{ $post->category->name }}</td>
                      <td class="u-sp-none">{{ $post->user->name }}</td>
                      <td class="u-sp-none">{{ $post->created_at->diffForHumans() }}</td>
                      <td class="u-sp-none">{{ $post->updated_at->diffForHumans() }}</td>
                  </tr>
              @endforeach
           @endif
       </tbody>
    </table>
