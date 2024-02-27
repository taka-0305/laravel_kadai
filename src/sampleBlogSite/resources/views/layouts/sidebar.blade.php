<div class="sidebar-container">
  <section class="profile">
    <div class="image">
      @foreach ($profile as $row)
      <div class="image-container">
        <img src="{{asset('/img/'.$row->file_name)}}" alt="プロフィール画像">
      </div>
      <div class="name">
        <h3>{{ $row->name }}</h3>
      </div>
      <div class="description">
        <p>{{ $row->description }}</p>
      </div>
      @endforeach
    </div>
  </section>
</div>