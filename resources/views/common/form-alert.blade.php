@if (Session::has('flash_message'))
  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
@endif
    {{-- エラーの表示を追加 --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
