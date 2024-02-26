{{-- layputsのhomeを読み込み --}}
@extends('layouts.home')

@section('title')
    <title>{{config('app.name')}}</title>
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
<div class="main-contents">
  <div class="main-contents-container">
    <section class="article-list">
      <ul>
        @foreach ($articles as $article)
        <li>
          <section class="image">
            <a href="{{route('article.show', ['article' =>  $article->article_id])}}">
              <img src="{{asset('/img/'.$article->file_name)}}" alt="サムネイル画 像">
            </a>
          </section>
          <section class="text">
            <div class="title">
              <a href="{{route('article.show', ['article' =>  $article->article_id])}}">
                <h2>{{$article->title}}</h2>
              </a>
            </div>
            <div class="date">
              <time datetime="{{$article->created_at->format('Y.m.d')}}"> {{$article->created_at->format('Y.m.d')}}</time>
            </div>
          </section>
        </li>
        @endforeach
      </ul>
    </section>
  </div>
</div>
<div class="sidebar">
  @include('layouts.sidebar')
</div>
@endsection

{{-- @section('pageSub')
    <p>個別サイドバーの内容</p>
@endsection --}}

{{-- @section('pageJs')
<script src="/js/page.js"></script>
@endsection --}}

@include('layouts.footer')