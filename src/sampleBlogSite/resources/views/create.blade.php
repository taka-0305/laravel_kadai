{{-- layputsのhomeを読み込み --}}
@extends('layouts.home')

@section('title')
    <title>新規記事作成 {{config('app.name')}}</title>
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
<div class="admin">
  <div class="admin-container">
    <section class="title">
      <h2>新規記事作成</h2>
    </section>
    <form action="{{route('article.store')}}" method="post" name="createform" enctype="multipart/form-dat">
        @csrf
        <ul>
            <li>
              <h3>記事タイトル</h3>
              <input type="text" name="title" id="title" placeholder="記事タイトル" value="{{isset($article[0]->title) ? $article[0]->title : ''}}" required autofocus>
            </li>
            <li>
              <h3>記事本文</h3>
              <div id="quill-editor"></div>
              <input type="hidden" name="content">
            </li>
            <li>
              <h3>サムネイル画像</h3>
              <select name="image" id="image">
                @foreach ($items as $item)
                @if(isset($article[0]->image_id))
                  @if($item->id === $article[0]->image_id)
                  <option value="{{$item->id}}" selected>{{$item->file_name}}</option>
                  @endif
                @else
                <option value="{{$item->id}}">{{$item->file_name}}</option>
                @endif
                @endforeach
              </select>
            </li>
            <li>
                <div class="btn">
                    <button type="submit" name="subbtn" id="subbtn">投稿</button><br>
                    <button type="button" onclick="location.href='{{route('profile.index')}}'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
  </div>
</div>
@endsection


@include('layouts.footer')