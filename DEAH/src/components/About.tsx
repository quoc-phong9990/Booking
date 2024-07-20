
import "../assets/js/main.js"
import 'react-slideshow-image/dist/styles.css';
import '../App.css';
import Header from './Header.js';
import Footer from './Footer.js';
const About = () => {

  return (
    <div>
      <Header />
      <main>
        <section className="breadcrumbs-area breadcrumb-bg">
          <div className="container">
            <h1 className="title wow fadeInUp" data-wow-delay="0.0s">Về Chúng Tôi</h1>
            <div className="breadcrumb-text">
              <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                <ul className="breadcrumb listing">
                  <li className="breadcrumb-item single-list"><a href="index" className="single">Trang chủ</a></li>
                  <li className="breadcrumb-item single-list" aria-current="page">
                    <a href="javascript:void(0)" className="single active">Về Chúng Tôi</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </section>

        {/*/ End-of Breadcrumbs*/}
        {/* Về Us area S t a r t */}
        <section className="about-area">
          <div className="container">
            <div className="row g-4">
              <div className="col-xl-5 col-lg-6">
                <div className="section-title mx-430 mb-30 w-md-100">
                  <span className="highlights fancy-font font-400">Về Chúng Tôi</span>
                  <h4 className="title">
                    Nhận trải nghiệm du lịch tốt nhất với Travello
                  </h4>
                  <p className="pera">
                    Du lịch là một trải nghiệm biến đổi và phong phú
                    cho phép các cá nhân khám phá các điểm đến, văn hóa mới và
                    Phong cảnh.Đó là một hoạt động cơ bản của con người đã được
                    thực hành trong nhiều thế kỷ và tiếp tục là một nguồn vui,
                    học tập, và tăng trưởng cá nhân.
                  </p>
                  <p className="pera">
                    Du lịch là một trải nghiệm biến đổi và phong phú
                    Cho phép các cá nhân khám phá các điểm đến mới, văn hóa.
                  </p>

                  <div className="mt-30">
                    <button type="submit" className="btn-primary-fill w-100">
                      Tìm hiểu thêm
                    </button>
                  </div>
                  <div className="about-imp-link mt-40">
                    <div className="icon">
                      <i className="ri-user-line" />
                    </div>
                    <div className="content">
                      <p className="pera font-16">
                        <span className="font-700">2,500</span> Mọi Người Đã Đặt Trước Ngày Mai
                        sự Kiện Đất Đai Trong 24 Giờ Qua
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div className="col-xl-7 col-lg-6">
                <div className="about-count-section about-count-before-bg">
                  <div className="banner">
                    <img src="/src/assets/category_tour/Sapa.jpg" alt="travello" />
                  </div>
                  <div className="all-count-list">
                    <div className="details">
                      <h4 className="count">150k</h4>
                      <p className="pera">Du Khách Thích</p>
                    </div>
                    <div className="divider" />
                    <div className="details">
                      <h4 className="count">95.7%</h4>
                      <p className="pera">Tỷ Lệ Hài Lòng</p>
                    </div>
                    <div className="divider" />
                    <div className="details">
                      <h4 className="count">5000+</h4>
                      <p className="pera">Chuyến DuLịch Hoàn Thành</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

   
     
        {/*/ End of Testimonial */}
        {/* Special area S t a r t */}
        <section className="special-area bottom-padding1">
          <div className="container">
            <div className="row justify-content-center">
              <div className="col-xl-7 col-lg-7">
                <div className="section-title mx-430 mx-auto text-center">
                  <span className="highlights fancy-font font-400">Ưu đãi đặc biệt</span>
                  <h4 className="title">
                    mùa Đông Những Lời Đề Nghị Lớn Của Chúng Tôi Để Truyền Cảm Hứng Cho Bạn
                  </h4>
                </div>
              </div>
            </div>
            <div className="row g-4">
              <div className="col-lg-6 col-md-6">
                <a href="tour-list" className="offer-banner imgEffect4 wow fadeInLeft" data-wow-delay="0.0s">
                  <img src="/src/assets/images/gallery/offercard-1.jpg" alt="travello" />
                  <div className="offer-content">
                    <p className="highlights-text">TiếtKiệmLênĐến</p>
                    <h4 className="title">50%</h4>
                    <p className="pera">Hãy Cùng Khám Phá Thế Giới</p>
                    <div className="location">
                      <i className="ri-map-pin-line" />
                      <p className="name">Bangkok, Thailand</p>
                    </div>
                    <div className="btn-secondary-sm radius-30"> Đặt Phòng Ngay </div>
                  </div>
                </a>
              </div>
              <div className="col-lg-6 col-md-6">
                <a href="tour-list" className="offer-banner imgEffect4 wow fadeInLeft" data-wow-delay="0.0s">
                  <img src="/src/assets/images/gallery/offercard-2.jpg" alt="travello" />
                  <div className="offer-content-two">
                    <h4 className="title">Khách sạn gần đó</h4>
                    <p className="pera">
                      Up to <span className="highlights-text">50%</span> Tắt tốt nhất
                      Khách sạn gần
                    </p>
                    <div className="location">
                      <i className="ri-map-pin-line" />
                      <p className="name">Bangkok, Thailand</p>
                    </div>
                    <div className="btn-secondary-sm radius-30"> Đặt Phòng Ngay</div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
        {/*/ End-of special*/}
      </main>
      {/* Footer S t a r t */}
      <Footer />
      <div className="progressParent" id="back-top">
        <svg className="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
      </div>
      <div className="search-overlay" />
    </div>


  )
}

export default About
