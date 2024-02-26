@extends('layouts.app')

@section('content')
<div class="mypage-wrapper">
  <h1>マイページ</h1>
  <dl>
      <dt>名前</dt>
      <dd>{{ $user->name }}</dd>
      <dt>メールアドレス</dt>
      <dd>{{ $user->email }}</dd>
      <dt>登録日</dt>
      <dd>{{ $user->created_at }}</dd>
      <dt>更新日</dt>
      <dd>{{ $user->updated_at }}</dd>
  </dl>
  @if(isset($profile[0]->id))
  <dl>
      <dt>プロフィール名</dt>
      <dd>{{ $profile[0]->name }}</dd>
      <dt>説明文</dt>
      <dd>{{ $profile[0]->description }}</dd>
      <dt>登録日</dt>
      <dd>{{ $profile[0]->created_at }}</dd>
      <dt>更新日</dt>
      <dd>{{ $profile[0]->updated_at }}</dd>
  </dl>
  @endif
  <div class="btn-container">
    <a href="{{route('profile.create')}}" class="btn">プロフィール作成</a>
  </div>
  <div class="btn-container">
    <a href="{{route('article.create')}}" class="btn">新規投稿</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>タイトル</th>
        <th>作成日</th>
        <th>詳細</th>
        <th>編集</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
      <tr>
        <td>{{$article->id}}</td>
        <td>{{$article->title}}</td>
        <td>{{$article->created_at->format('Y.m.d')}}</td>
        <td><a href="{{route('article.show', ['article' =>  $article->article_id])}}" class="btn btn-primary">詳細</a></td>
        <td><a href="{{route('article.edit', ['article' =>  $article->article_id])}}" class="btn btn-info">編集</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
