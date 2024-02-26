<div class="sidebar-container">
  <section class="profile">
    <div class="image">
      <div class="image-container">
        <img src="{{asset('/img/'.$profile[0]->file_name)}}" alt="プロフィール画像">
      </div>
      <div class="name">
        <h3>{{ $profile[0]->name }}</h3>
      </div>
      <div class="description">
        <p>{{ $profile[0]->description }}</p>
      </div>
    </div>
  </section>
</div>