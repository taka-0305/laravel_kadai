{{-- layputsのhomeを読み込み --}}
@extends('layouts.home')

@section('title')
    <title>記事を編集 {{config('app.name')}}</title>
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
<div class="admin">
  <div class="admin-container">
    <section class="title">
      <h2>記事を編集</h2>
    </section>
    <form action="{{ route('article.update', $articles[0]) }}" method="post" name="createform" enctype="multipart/form-dat">
        @csrf
        @method('patch')
        <ul>
            <li>
              <h3>記事タイトル</h3>
              <input type="text" name="title" id="title" placeholder="記事タイトル" value="{{isset($articles[0]->title) ? $articles[0]->title : ''}}" required autofocus>
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
                  @if(isset($articles[0]->image_id))
                    @if($item->id === $articles[0]->image_id)
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
                    <button type="submit" name="subbtn" id="subbtn">更新</button><br>
                    <button type="button" onclick="location.href='{{route('profile.index')}}'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
  </div>
</div>
@endsection


@include('layouts.footer')