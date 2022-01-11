<!doctype html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trang chủ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{ asset('assets/home/css/style.css') }}" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css" >
</head>
<body>
@include('layouts.content.nav')
<body>
<section id="banner-content">
  <div class="w-100 p-0 d-block header-bg">
    <div class="position-relative w-50 m-auto pt-100 pb-100">
      <div>
        <img src="{{ asset('assets/home/images/name.png') }}" class="img-responsive d-block ms-auto me-auto" alt=""/>
        <p class="text-white text-center mt-20">
          Là công ty hàng đầu hoạt động trong lĩnh vực công nghệ thông tin, viễn thông và nội dung số.
          Trải qua chặng đường hình thành & phát triển, hiện nay Song Phát được biết đến như một doanh nghiệp trẻ,
          năng động và đang dần khẳng định vị thế của mình trong thị trường giải trí và truyền thông hiện nay.
        </p>
      </div>
      <div class="position-relative">
        <a href="#" class="btn bg-custom-primary m-auto">Tìm hiểu thêm</a>
      </div>
    </div>
  </div>
</section>
<section id="giai-phap">
  <div class="w-100 mt-20">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <p>Làm việc, phối hợp với Đối tác trong và ngoài nước để triển khai các sản phẩm, giải pháp viễn thông cho Nhà
            mạng</p>
        </div>
        <div class="col-sm-12 col-md-6">
          <img src="{{ asset('assets/home/images/background/partner.png') }}" class="img-fluid" alt=""/>
        </div>
      </div>
    </div>
  </div>
  <div class="w-100">
    <div class="container">
      <img src="{{ asset('assets/home/images/background/giai-phap.png') }}" class="img-fluid" alt=""/>
    </div>
  </div>
</section>
<section id="sanpham">
  <div class="w-100 sp-bg">
    <div class="container pt-70 pb-70">
      <div class="row">
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center font-weight-bold">Bóng Đá HOT</h2>
              <p class="d-flex align-items-stretch">Bóng đá HOT là chương trình tập trung đi sâu cung cấp những thông tin về các giải
                đấu, các trận đầu nhanh nhất hot nhất, giúp cho khách hàng có những thông tin bổ ích về chiến thuật,
                lịch thi đấu sơ đồ và các thông tin về cầu thủ trong các trân đấ Ngoài ra dịch vụ này cũng cung cấp một
                cách nhanh nhất kết quả các trận đấu, các bình luận chuyên sâu và nhận định phân tích của các chuyên gia
                bóng đá Việt Nam và thế giới.</p>
            </div>
            <div class="m-auto pt-40 pb-40">
              <a href="#" class="btn btn-outline-dark">Xem thêm</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center font-weight-bold">Cơn Mưa Vàng</h2>
              <p class="d-flex align-items-stretch">Dịch vụ Cơn mưa Vàng phù hợp với các đối tượng khách hàng đang dùng di động hiện nay. Tham gia dịch vụ
                Cơn mưa Vàng, bạn sẽ được cung cấp các kho nội dung giải trí phong phú, hấp dẫn nhiều thể loại như hình
                ảnh, clip video hot, tử vi, phong thủy,… Cổng Cơn mưa Vàng hướng đến đối tượng đa phần là các bạn học
                sinh sinh viên, nhằm cung cấp thêm sân chơi giải trí trên mobile cho thuê bao nhà mạng VinaPhone.</p>
            </div>
            <div class="m-auto pt-40 pb-40">
              <a href="#" class="btn btn-outline-dark">Xem thêm</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center font-weight-bold">Lịch Vạn Niên</h2>
              <p class="d-flex align-items-stretch">Lịch vạn niên là dịch vụ cung cấp trực quan và chi tiết thông tin về ngày tháng âm dương, giờ tốt xấu,
                tra cứu theo ngày âm dương.</p>
            </div>
            <div class="m-auto pt-40 pb-40">
              <a href="#" class="btn btn-outline-dark">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="tuyendung">
  <div class="w-100 mt-30 mb-30">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <img src="{{ asset('assets/home/images/background/bg-3.png') }}" class="img-fluid" alt=""/>
        </div>
        <div class="col-sm-12 col-md-6">
          <h2>Tuyển dụng</h2>
          <p>Tại Song Phát, chúng tôi cam kết tạo ra một nền văn hóa lãnh đạo đa dạng và sôi động cho các bạn trẻ phát
            huy được hết các kỹ năng và năng lực của bản thân; là nơi bạn có thể bứt phá và tạo ra những điều tưởng
            chừng như không thể.</p>
          <a href="#" class="btn btn-outline-dark">Tìm hiểu thêm</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="lienlac">
  <div class="w-100 mt-50 mb-50">
    <div class="container rounded ll-background text-center text-dark mt-50 mb-50 pt-100 pb-100">
      <p>Liên hệ</p>
      <h2>Bạn cần liên hệ với chúng tôi?</h2>
      <h4>Vui lòng điền email liên lạc dưới đây để nhận được thông tin mới nhất.</h4>
      <div class="w-50 m-auto mt-20">
        <div class="btn-toolbar mb-3 d-flex">
          <div class="input-group flex-grow-1">
            <input type="email" class="form-control" placeholder="email@email.com">
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-outline-dark">Gửi</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
@include('layouts.content.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
