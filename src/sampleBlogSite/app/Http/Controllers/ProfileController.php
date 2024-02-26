<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Images;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::get();
        $articles = Article::get();
        // ビューを表示
        return view('myPage', compact('user','profile','articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Images::get();
        $profile = Profile::get();
        return view('profileAdmin', compact('items','profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        // フォームに入力された内容を変数に取得
        $form = $request->only('name', 'description');
        $form["images_id"] = $request->only('image')["image"];
        // フォームに入力された内容をデータベースへ登録
        $profile = new Profile();
        $profile->fill($form)->save();

        // 記事一覧画面を表示
        return redirect()->route('myPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $member=Profile::find($profile);
    
        $member->name=$request->input('name');
        $member->discription=$request->input('discription');
        $member->image_id=$request->input('image');
    
        //DBに保存
        $member->save();
    
        //処理が終わったらmember/indexにリダイレクト
        return redirect('myPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
