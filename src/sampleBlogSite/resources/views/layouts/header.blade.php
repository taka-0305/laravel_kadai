@section('header')
@auth
<div class="admin-bar">
    <ul>
        <li class="btn"><a href="{{route('article.create')}}" class="btn">新規投稿</a></li>
        <li>
            <a href="{{route('myPage')}}">マイページ</a>
        </li>
    </ul>
</div>
@endauth
<header id="header">
    <div class="header-container">
        <section class="icon">
            <a href="{{ url('/') }}">Blog</a>
        </section>
    </div>
</header>
@endsection