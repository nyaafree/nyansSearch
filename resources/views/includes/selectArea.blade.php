<form method="GET" action="/posts/area/">
        @csrf
        <select name="area" onchange="submit(this.form)" class="select-box">
            <option disabled selected>選択してください</option>
            @foreach ($areas as $area )
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
</form>
