<header>
  <div class="container-fluid p-0 bg-custom-primary">
    <div class="container d-flex flex-row-reverse">
      <a href="#" class="nav-link text-white"><span><i class="fa-solid fa-envelope"></i></span> cskh.songphat@gmail.com</a>
    </div>
  </div>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets/home/images/logo.png') }}" class="img-fluid" alt="Logo songphat"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.intro') }}">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.intro') }}">Giải pháp - Dịch vụ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.recruit') }}">Tuyển dụng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tin tức - Sự kiện</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liên hệ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
