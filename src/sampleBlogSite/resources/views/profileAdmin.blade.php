{{-- layputsのhomeを読み込み --}}
@extends('layouts.home')

@section('title')
    <title>プロフィール {{config('app.name')}}</title>
@endsection

@include('layouts.head')

@include('layouts.header')

@section('content')
<div class="admin">
  <div class="admin-container">
    <section class="title">
      <h2>プロフィール作成</h2>
    </section>
    <form action="{{route('profile.store')}}" method="post" name="createform" enctype="multipart/form-dat">
        @csrf
        <ul>
            <li>
              <h3>アカウント名</h3>
              <input type="text" name="name" id="name" placeholder="アカウント名" value="{{isset($profile[0]->name) ? $profile[0]->name : ''}}" autofocus>
            </li>
            <li>
              <h3>説明文</h3>
              <input type="text" name="description" id="description" placeholder="説明文" value="{{isset($profile[0]->description) ? $profile[0]->description : ''}}"required autofocus>
            </li>
            <li>
              <h3>サムネイル画像</h3>
              <select name="image" id="image">
                @foreach ($items as $item)
                @if(isset($profile[0]->image_id))
                  @if($item->id === $profile[0]->image_id)
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
                  @if(isset($profile[0]->id))
                    <button type="submit" name="subbtn" id="subbtn">更新</button><br>
                    @else
                    <button type="submit" name="subbtn" id="subbtn">登録</button><br>
                    @endif
                    <button type="button" onclick="location.href='{{route('profile.index')}}'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
  </div>
</div>
@endsection


@include('layouts.footer')