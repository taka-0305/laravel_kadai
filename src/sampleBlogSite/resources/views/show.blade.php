{{-- layputsのhomeを読み込み --}}
@extends('layouts.home')

@section('title')
    <title>{{$articles[0]->title}} | {{config('app.name')}}</title>
@endsection


@include('layouts.head')

@include('layouts.header')

@section('content')
<div class="article">
  <div class="article-container">
    <div id="show">
      <section class="thumbnail">
        <img src="{{asset('/img/'.$articles[0]->file_name)}}" alt="">
      </section>
      <section class="text">
        <h1>{{$articles[0]->title}}</h1>
          {!! Str::markdown($articles[0]->content) !!}
      </section>
    </div>
  </div>
</div>
<div class="sidebar">
  @include('layouts.sidebar')
</div>
@endsection


@include('layouts.footer')