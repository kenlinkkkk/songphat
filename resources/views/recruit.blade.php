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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"
          type="text/css">
</head>
<body>
@include('layouts.content.nav')
<body>
<section id="banner-content">
    <div class="w-100 p-0 d-block intro-bg">
        <div class="position-relative w-50 m-auto pt-100 pb-100">
            <div>
                <h1 class="fs-1 text-white text-center mt-20">TUYỂN DỤNG</h1>
            </div>
        </div>
    </div>
</section>
<section id="giai-phap">
    <div class="w-100 mt-20">
        <div class="container">
            <div class="row">
                <p class="w-50 text-center ms-auto me-auto">
                    Tại Song Phát, chúng tôi cam kết tạo ra một nền văn hóa lãnh đạo đa dạng và sôi động cho các bạn trẻ
                    phát huy được hết các kỹ năng và năng lực của bản thân; là nơi bạn có thể bứt phá và tạo ra những
                    điều tưởng chừng như không thể.
                </p>
            </div>
            <div class="row">
                <div class="w-50 ms-auto me-auto">
                    <img src="{{ asset('assets/home/images/background/bg-3.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 mt-25">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h3 class="fs-3">Đứng trên những thách thức lớn</h3>
                    <p class="text-justify">Trong suốt lịch sử hình thành & phát triển, Song Phát đã thực hiện những
                        thách thức lớn và luôn cố gắng hoàn thành tốt nhất những gì chúng tôi làm. Tinh thần này là động
                        lực để chúng tôi tiến về phía trước và duy trì những tham vọng của mình: phát triển các công
                        nghệ tiên tiến thúc đẩy cuộc sống tốt đẹp hơn. Hãy tham gia cùng chúng tôi cho những thách thức
                        lớn tiếp theo của tương lai.</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h3 class="fs-3">Định hình tương lai</h3>
                    <p class="text-justify">Sự sáng tạo và tính đa dạng của những người làm việc tại Song Phát đã làm
                        cho chúng tôi trở thành một trong những công ty sáng tạo nhất Việt Nam, và nhân viên của chúng
                        tôi vẫn tiếp tục thúc đẩy sự đổi mới mỗi ngày. Đây là nơi bạn có thể làm việc với những người
                        tuyệt vời và những ý tưởng của bạn có thể mang lại cho cuộc sống những sản phẩm và giải pháp mới
                        đang hình thành tương lai của chúng ta.</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h3 class="fs-3">Sức ảnh hưởng</h3>
                    <p class="text-justify">Điều làm cho việc làm việc tại Song Phát có ý nghĩa là bạn biết rằng mình
                        đang đóng một vai trò quan trọng trong việc đưa công nghệ mới đến với thế giới để cải thiện cuộc
                        sống. Chúng tôi đang cố gắng sử dụng công nghệ của mình để đóng góp cho sự tăng trưởng và phát
                        triển trong cộng đồng. Đồng hành cùng chúng tôi, bạn sẽ có cơ hội thực hiện công việc thực sự có
                        ý nghĩa và có tác động tích cực đến cộng đồng.</p>
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
