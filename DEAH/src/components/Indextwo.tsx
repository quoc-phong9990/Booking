
import "../assets/js/main.js"

import React, { useEffect, useState } from 'react'
import axios from 'axios'
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import Header from "./Header.js";
import Footer from "./Footer.js";
import CurrencyFormatter from "../FunctionComponentContext/CurrencyFormatter.js";
import { Link } from "react-router-dom";
import '../App.css'



const Indextwo = () => {
  const [tourFeature, setToursFeature] = useState<any>([]);
  const [tourNew, setToursNew] = useState<any>([]);
  const [postsNew, setPostsNew] = useState<any>([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        let tours_new = 'http://127.0.0.1:8000/api/client/get-tours-new';
        let tours_lists = 'http://127.0.0.1:8000/api/client/get-tours-feature';
        let posts = 'http://127.0.0.1:8000/api/client/get-posts-new';

        const [tourNew, tourFeature, postsNew] = await Promise.all([
          axios.get(tours_new),
          axios.get(tours_lists),
          axios.get(posts)
        ]);
        // console.log(response1.data.data);

        setToursNew(tourNew.data.data);
        setToursFeature(tourFeature.data.data);
        setPostsNew(postsNew.data.data);
      } catch (error) {
        if (error) return <div>loi...</div>
      }
    };
    fetchData();

  }, []);

  return (

    <div>

      <div>
        <Header />
        <main>
          {/* Hero area S t a r t*/}
          <section className="hero-padding-two hero-bg-two position-relative">
            <div className="container">
              <div className="row  g-4 align-items-center justify-content-between position-relative">
                <div className="col-xl-7 col-lg-6">
                  <div className="hero-caption-two position-relative">
                    <span className="highlights wow fadeInUp d-block p-1" data-wow-delay="0.0s">Khám phá từ này</span>
                    <h4 className="title wow fadeInUp fs-1 p-1 " data-wow-delay="0.1s">  Kế  hoạch  chuyến  tham  quan  đến  các  địa  điểm  mơ  ước  chỉ  bằng  một  cú  nhấp  chuột ! </h4>
                    <p className="pera wow fadeInUp" data-wow-delay="0.3s">
                      Tận hưởng từng khoảnh khắc tại các địa điểm mơ ước, tham gia các hoạt động thú vị và lưu giữ những kỷ niệm đẹp.<br />
                    </p>
                    <div className="button-section wow fadeInUp" data-wow-delay="0.5s">
                      <a href="payment" className="btn-secondary-sm hero-book-btn">Bắt đầu đặt phòng</a>
                    </div>
                  </div>
                </div>
                <div className="col-xl-5 col-lg-6">
                  <div className="search-tour-card sidenav-active">
                    <div className="section-title text-center">
                      <h4 className="title">Các tour du lịch tìm kiếm</h4>
                      <p className="pera">Hãy nhập những thông tin dưới đây .</p>
                    </div>
                    <div className="plan-section-two">
                      <div className="select-dropdown-section">
                        <div className="d-flex gap-10 align-items-center">
                          <i className="ri-map-pin-line" />
                          <h4 className="select2-title">Điểm đến</h4>
                        </div>
                        <select className="destination-dropdown">
                          <option value={1}>Sydney, Australia</option>
                          <option value={2}>USA, Turkish </option>
                          <option value={3}>Chittagong, Turkish </option>
                        </select>
                      </div>
                      <div className="select-dropdown-section">
                        <div className="d-flex gap-10 align-items-center">
                          <i className="ri-flight-takeoff-fill" />
                          <h4 className="select2-title">Tour Type</h4>
                        </div>
                        <select className="destination-dropdown">
                          <option value={1}>Booking Type</option>
                          <option value={2}>Advance Type</option>
                          <option value={3}>Pre-book Type</option>
                        </select>
                      </div>

                      <div className="dropdown-section">
                        <i className="ri-time-line" />
                        <div className="z-index">

                          <div className="custom-dropdown custom-date">
                            <div>
                              <label htmlFor="">Ngày bắt đầu </label>
                              <input type="date" />

                            </div>
                            <div>
                              <label htmlFor="">Ngày kết thúc </label>
                              <input type="date" />
                            </div>
                          </div>
                        </div>

                      </div>


                      <div className="dropdown-section position-relative user-picker-dropdown">
                        <div className="d-flex gap-10 align-items-center">
                        </div>

                        <div className="user-picker dropdown-shadow">
                          <div className="user-category">
                            <div className="category-name">
                              <h4 className="title">Người lớn</h4>
                              <p className="pera">12 năm trở lên</p>
                            </div>
                            <div className="qty-container">
                              <button className="qty-btn-minus mr-1" type="button">
                                <i className="ri-subtract-fill" />
                              </button>
                              <input type="text" name="qty" defaultValue={0} className="input-qty input-rounded" />
                              <button className="qty-btn-plus ml-1" type="button">
                                <i className="ri-add-fill" />
                              </button>
                            </div>
                          </div>
                          <div className="user-category">
                            <div className="category-name">
                              <h4 className="title">Những đứa trẻ</h4>
                              <p className="pera">2-11 years</p>
                            </div>
                            <div className="qty-container">
                              <button className="qty-btn-minus mr-1" type="button">
                                <i className="ri-subtract-fill" />
                              </button>
                              <input type="text" name="qty" defaultValue={0} className="input-qty input-rounded" />
                              <button className="qty-btn-plus ml-1" type="button">
                                <i className="ri-add-fill" />
                              </button>
                            </div>
                          </div>
                          <div className="user-category">
                            <div className="category-name">
                              <h4 className="title">Trẻ sơ sinh</h4>
                              <p className="pera">Belwo 2 năm </p>
                            </div>
                            <div className="qty-container">
                              <button className="qty-btn-minus mr-1" type="button">
                                <i className="ri-subtract-fill" />
                              </button>
                              <input type="text" name="qty" defaultValue={0} className="input-qty input-rounded" />
                              <button className="qty-btn-plus ml-1" type="button">
                                <i className="ri-add-fill" />
                              </button>
                            </div>
                          </div>
                          <div className="btn-section">
                            <a href="javascript:void(0)" className="done-btn">Xong</a>
                          </div>
                        </div>
                      </div>
                      <div className="sign-btn">
                        <a href="tour-list" className="btn-secondary-lg">Kế hoạch tìm kiếm</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {/* shape 01 */}
            <div className="shape-one d-none d-lg-block p-5  pt-2" >
              {/* <img  height="400px"  width={650}   src="/src/assets/category_tour/tamdao.jpg" alt="travello" /> */}
            </div>
            {/* shape 02 */}
            <div className="shape-two d-none d-lg-block">
              {/* <img className='' src="/src/assets/category_tour/taxua.jpg" alt="travello" /> */}
            </div>
          </section>
          {/*/ End-of Hero*/}
          {/* Brand S t a r t */}
          <section className="why-area">

            {/*  */}
            <div className="container">
              <div className="row">
                <div className="col-lg-12">
                  <div className="border-section-title">
                    <h4 className="title">Tại sao bạn lại thích chúng tôi</h4>
                  </div>
                </div>
              </div>
              <div className="row">
                <div className="col-lg-12">
                  <div className="swiper whySwiper-active">
                    <div className="swiper-wrapper">
                      <div className="swiper-slide">
                        <div className="why-points">
                          <div className="why-point">
                            <div className="why-icon">
                              <span>$</span>
                            </div>
                            <div className="why-content">
                              <h4 className="title line-clamp-1">Đảm bảo giá tốt nhất</h4>
                              <p className="pera line-clamp-3">
                                Tiết kiệm chi phí: Khách hàng có thể yên tâm không phải tốn thời gian và công sức để so sánh giá giữa các nơi khác nhau.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="why-points">
                          <div className="why-point">
                            <div className="why-icon">
                              <span>$</span>
                            </div>
                            <div className="why-content">
                              <h4 className="title line-clamp-1">Easy &amp; Quick Booking</h4>
                              <p className="pera line-clamp-3">
                                A "Đảm bảo giá tốt nhất" is a commitment offered by
                                businesses, typically in the retail or hospitality
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="why-points">
                          <div className="why-point">
                            <div className="why-icon">
                              <span>$</span>
                            </div>
                            <div className="why-content">
                              <h4 className="title line-clamp-1">Hướng dẫn viên du lịch</h4>
                              <p className="pera line-clamp-3">
                                A "Đảm bảo giá tốt nhất" is a commitment offered by
                                businesses, typically in the retail or hospitality
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="why-points">
                          <div className="why-point">
                            <div className="why-icon">
                              <span>$</span>
                            </div>
                            <div className="why-content">
                              <h4 className="title line-clamp-1">Đảm bảo giá tốt nhất</h4>
                              <p className="pera line-clamp-3">
                                Một "đảm bảo giá tốt nhất" là một cam kết được cung cấp bởi
                                các doanh nghiệp, thường là trong bán lẻ hoặc khách sạn
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          {/*/ End of Brand */}
          {/* Special area S t a r t */}
          <section className="special-area top-padding">
            <div className="container">
              <div className="row justify-content-center">
                <div className="col-xl-7 col-lg-7">
                  <div className="section-title mx-430 mx-auto text-center">
                    <span className="highlights fancy-font font-400 text-center">Ưu đãi đặc biệt</span>
                    <h4 className="title">
                      Mùa đông những lời đề nghị lớn của chúng tôi để truyền cảm hứng cho bạn
                    </h4>
                  </div>
                </div>
              </div>
              <div className="row g-4">
                <div className="col-lg-6 col-md-6">
                  <a href="tour-list" className="offer-banner imgEffect4 wow fadeInLeft" data-wow-delay="0.0s">
                    <img src="/src/assets/category_tour/tour miền tây.jpg" alt="travello" />

                    <div className="offer-content">
                      <p className="highlights-text">Tiết kiệm lên đến</p>
                      <h4 className="title">50%</h4>
                      <p className="pera">Hãy cùng khám phá thế giới</p>
                      <div className="location">
                        <i className="ri-map-pin-line" />
                        <p className="name">Tây Hồ , Hà Nội </p>
                      </div>
                      <div className="btn-secondary-sm radius-30 ">Đặt phòng ngay</div>
                    </div>
                  </a>
                </div>
                <div className="col-lg-6 col-md-6">
                  <a href="tour-list" className="offer-banner imgEffect4 wow fadeInRight" data-wow-delay="0.0s">
                    <img src="/src/assets/category_tour/Sapa.jpg" alt="travello" />
                    <div className="offer-content-two">
                      <h4 className="title">Khách sạn gần đó</h4>
                      <p className="pera">
                        Up to <span className="highlights-text">50%</span> Tắt tốt nhất
                        Khách sạn gần
                      </p>
                      <div className="location">
                        <i className="ri-map-pin-line" />
                        <p className="name">Tây Hồ , Hà Nội </p>
                      </div>
                      <div className="btn-secondary-sm radius-30">Đặt phòng ngay</div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          {/*/ End-of Special*/}
          {/* About Us area S t a r t */}
          <section className="about-area bottom-padding1 position-relative">
            <div className="container">
              <div className="row g-4">
                <div className="col-xl-5 col-lg-5">
                  <div className="section-title mx-430 mb-30">
                    <span className="highlights fancy-font font-400">Đặt phòng tham quan </span>
                    <h4 className="title">Sẵn sàng kiểm tra</h4>
                    <p className="pera">
                      Lorem Ipsum Dolor ngồi ampe, lãnh sự.Thuận tiện tại Diam Smart
                      đội.Động cơ Mauris chính thống cho đau cho.Nếu có
                      Mauris ngày mai xin vui lòng hoặc vui lòng cuối tuần.EU và
                      Phim hoạt hình lập kế hoạch xấu xí.
                    </p>
                    <div className="about-imp-link">
                      <div className="icon">
                        <i className="ri-phone-line" />
                      </div>
                      <div className="content">
                        <p className="pera">Gọi bất cứ lúc nào</p>
                        <h4 className="title">00 (888) +123456</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="col-xl-7 col-lg-7">
                  <div className="available-card">
                    {/* Open Calender */}
                    <form action="#" className="mb-20">
                      <input type="text" name="daterange" className="custom-form" defaultValue="03/12/2023 - 4/15/2023" />
                    </form>
                    {/* / Open Calender */}
                    {/* user qty card */}
                    <div className="user-qty-card">
                      <div className="user-quantity">
                        <div className="user-category">
                          <div className="category-name">
                            <h4 className="title">Người lớn</h4>
                            <p className="pera">Ages 18+</p>
                          </div>
                          <div className="qty-container">
                            <button className="qty-btn-minus-two mr-1" type="button">
                              <i className="ri-subtract-fill" />
                            </button>
                            <input type="text" name="qty" defaultValue={0} className="input-qty-two input-rounded" />
                            <button className="qty-btn-plus-two ml-1" type="button">
                              <i className="ri-add-fill" />
                            </button>
                          </div>
                        </div>
                        <div className="user-category">
                          <div className="category-name">
                            <h4 className="title">Những đứa trẻ</h4>
                            <p className="pera">Ages 5-18</p>
                          </div>
                          <div className="qty-container">
                            <button className="qty-btn-minus-two mr-1" type="button">
                              <i className="ri-subtract-fill" />
                            </button>
                            <input type="text" name="qty" defaultValue={0} className="input-qty-two input-rounded" />
                            <button className="qty-btn-plus-two ml-1" type="button">
                              <i className="ri-add-fill" />
                            </button>
                          </div>
                        </div>
                      </div>
                      <div className="count-guest">
                        <h4 className="title">
                          Khách <span className="calc-user">0</span>
                        </h4>
                      </div>
                      <div className="mt-30">
                        <button type="submit" className="btn-primary-fill w-100">
                          Sẵn sàng kiểm tra
                        </button>
                      </div>
                    </div>
                    {/* / user qty card */}
                  </div>
                </div>
              </div>
            </div>
            <div className="shape-about-two p3">
              {/* <img width={400} src="/src/assets/category_tour/Phu Quoc Island - Vietnams Trauminsel + Highlights.jpg" alt="travello" /> */}
            </div>
          </section>
          {/*/ End-of About US*/}
          {/* Destination area S t a r t */}
          <section className="destination-section-two bottom-padding1">
            <div className="destination-area-two position-relative">
              <div className="container">
                <div className="row justify-content-center">
                  <div className="col-xl-7 col-lg-7">
                    <div className="section-title text-center mx-430 mx-auto position-relative">
                      <span className="highlights">Danh sách tour mới nhất</span>
                      <h4 className="title">
                        Chúng tôi cung cấp các điểm đến du lịch hàng đầu
                      </h4>
                    </div>
                  </div>
                </div>

                <div className="row g-4">

                  {tourNew?.map((tours: any, index: any) => {
                    return (
                      <div className="col-xl-3 col-lg-4 col-sm-6" key={index}>
                        <a href={`/tour-details/${tours.slug}`} className="destination-banner-two h-calc wow fadeInUp" data-wow-delay="0.s">
                          <img src={'http://127.0.0.1:8000/' + (tours.images ? tours.images : '')} alt="travello" />
                          <div className="destination-content-two">

                            <div className="destination-info-two">
                              <div className="destination-name line-clamp-2">

                                <Link className="pera" to={`/tour-details/${tours.slug}`}>{tours.title}</Link>
                              </div>
                              <div className="button-section">
                                <div className="arrow"><i className="ri-arrow-right-line" /></div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    )
                  })}
                </div>
              </div>
            </div>
          </section>
          {/*/ End-of Destination */}
          {/* About Us area S t a r t */}
          <section className="about-area-two about-bg-before section-padding2">
            <div className="container">
              <div className="row align-items-center position-relative">
                <div className="col-lg-8">
                  <div className="section-title mx-526 mb-30">
                    <span className="highlights">về chúng tôi</span>
                    <h4 className="title"> Trải nghiệm thế giới với công ty của chúng tôiy</h4>
                    <p className="pera">
                      Du lịch là một trải nghiệm biến đổi và phong phú
                      cho phép các cá nhân khám phá các điểm đến, văn hóa mới và
                      Phong cảnh
                    </p>
                    <p className="pera">
                      Đó là một hoạt động cơ bản của con người đã được thực hành cho
                      hàng thế kỷ và tiếp tục là một nguồn vui, học tập và
                      phát triển cá nhân
                    </p>
                  </div>
                </div>
                <div className="col-lg-4">
                  <div className="discover-circle ">
                    <a href="about" className="discover-btn">Khám phá nhiều hơn<i className="ri-arrow-right-up-line" /></a>
                  </div>
                </div>
              </div>
              <div className="about-banner-two">
                <h4 className="watermark-text  p-4">Hơn 15 năm kinh nghiệm </h4>
                <div className="video-section">
                  {/* Video */}
                  <div className="hero-bg-video">
                    <video className="hero-slider-video video-cover radius-30" poster="/src/assets/images/gallery/about-curve-banner.png" loop autoPlay muted>
                      <source src="/src/assets/images/videos/travel4.mp4" type="video/mp4" />
                      Trình duyệt của bạn không hỗ trợ thẻ video.
                    </video>
                  </div>
                  <img src="/src/assets/images/gallery/about-curve-banner.png" alt="travello" />
                  <div className="rectangle-shape d-none d-sm-block">
                    <div className="sticky-corner right-corner">
                      <svg xmlns="http://www.w3.org/2000/svg" width={35} height={35} viewBox="0 0 35 35" fill="none">
                        <path fillRule="evenodd" clipRule="evenodd" d="M35 0V35C35 15.67 19.33 0 -1.53184e-05 0H35Z" fill="#daedef" />
                      </svg>
                    </div>
                    <div className="sticky-corner bottom-corner">
                      <svg xmlns="http://www.w3.org/2000/svg" width={35} height={35} viewBox="0 0 35 35" fill="none">
                        <path fillRule="evenodd" clipRule="evenodd" d="M35 0V35C35 15.67 19.33 0 -1.53184e-05 0H35Z" fill="#daedef" />
                      </svg>
                    </div>
                  </div>
                  <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" className="d-none d-sm-block " data-fancybox="video-gallery">
                    <div className="video-player">
                      <i className="ri-play-fill" />
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          {/*/ End-of About US*/}
          {/* Packages S t a r t */}
          <section className="package-area section-padding2">
            <div className="container">
              <div className="row justify-content-center">
                <div className="col-xl-7 col-lg-7">
                  <div className="section-title mx-430 mx-auto text-center">
                    <span className="highlights"> Gói phổ biến</span>
                    <h4 className="title">
                      Địa điểm du lịch yêu thích nhất ở Việt Nam
                    </h4>
                  </div>
                </div>
              </div>

              <div className="tab-content" id="pills-tabContent">
                <div className="tab-pane fade show active" id="pills-london" role="tabpanel" aria-labelledby="pills-london-tab">
                  <div className="row g-4">
                    {tourFeature?.map((tour: any, index: any) => {
                      return (
                        <div className="col-xl-3 col-lg-4 col-sm-6" key={index}>
                          <div className="package-card">
                            <div className="package-img imgEffect4">
                              <a href={`/tour-details/${tour.slug}`}>
                                <img src={'http://127.0.0.1:8000/' + (tour.images ? tour.images : '')} alt="travello" />
                              </a>
                            </div>
                            <div className="package-content">
                              <h4 className="area-name line-clamp-1">
                                <Link to={`/tour-details/${tour.slug}`}>{tour.title}</Link>
                              </h4>
                              <div className="location">
                                <i className="ri-map-pin-line" />
                                {tour.location.province}
                              </div>
                              <div className="packages-person">
                                <div className="count">
                                  <i className="ri-time-line" />
                                  <p className="pera mt-3 ml-2">{tour.day} Ngày {(tour.day - 1) == 0 ? '' : tour.day - 1 + ' Đêm'}</p>
                                </div>

                              </div>
                              <div className="price-review">
                                <div className="d-flex gap-10">
                                  <p className="light-pera">Từ</p>
                                  <p className="pera text-danger" ><CurrencyFormatter amount={tour.price} /></p>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      )



                    })}
                    {/*  */}
                  </div>
                </div>
                <div className="tab-pane fade" id="pills-bangkok" role="tabpanel" aria-labelledby="pills-bangkok-tab">


                </div>



              </div>
              <div className="row">
                <div className="col-12 text-center ">
                  <div className="section-button d-inline-block ">
                    <a href="tour-list ">
                      <div className="btn-primary-icon-sm pt-3">
                        <p className="pera  ">Xem tất cả các tour du lịch</p>
                        {/* <i className="ri-arrow-right-up-line" /> */}
                      </div>

                    </a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          {/*/ End of Packages */}
          {/* Promotion S t a r t */}
          <div className="container">
            <div className="row justify-content-center">
              <div className="col-xl-7 col-lg-7">
                <div className="section-title text-center mx-605 mx-auto position-relative mb-60">


                </div>
              </div>
            </div>
            <div className="row g-4">
            </div>
          </div>
          {/*/ End of Brand */}
          {/* News S t a r t */}
          <section className="news-area section-padding2">
            <div className="container">
              <div className="row justify-content-center">
                <div className="col-xl-7 col-lg-7">
                  <div className="section-title text-center mx-605 mx-auto position-relative mb-60">
                    <span className="highlights">News &amp; Bài báo</span>
                    <h4 className="title">
                      Latest News &amp; Bài viết Từ  Blog Bài viết
                    </h4>
                  </div>
                </div>
              </div>
              <div className="row g-4">
                {postsNew?.map((post: any, index: any) => {
                  return (
                    <div className="col-xl-3 col-lg-3 col-sm-6" key={index}>
                      <a href={"news-details/" + post.slug}>
                        <article className="news-card-two wow fadeInUp" data-wow-delay="0.0s">
                          <figure className="news-banner-two imgEffect">
                            <img className="images" src={'http://127.0.0.1:8000/' + post.thumbnail} alt="travello" />
                          </figure>
                          <div className="news-content">
                            <div className="heading line-clamp-1">
                              <span className="heading-pera"> {post.title}</span>
                            </div>
                            <h4 className="title line-clamp-2">

                              <Link to={`/news-details/${post.slug}`}>{post.body} </Link>
                            </h4>
                            <div className="news-info">
                              <div className="d-flex gap-10 align-items-center">
                                <div className="all-user">
                                  <div className="happy-user">
                                    <img src="/src/assets/images/hero/user-1.jpeg" alt="travello" />
                                  </div>
                                  <div className="happy-user">
                                    <img src="/src/assets/images/hero/user-2.png" alt="travello" />
                                  </div>
                                  <div className="happy-user">
                                    <img src="/src/assets/images/hero/user-3.png" alt="travello" />
                                  </div>
                                  <div className="happy-user">
                                    <img src="/src/assets/images/hero/user-4.jpeg" alt="travello" />
                                  </div>
                                </div>
                              </div>
                              <p className="time">10 phút đọc</p>
                            </div>
                          </div>
                        </article>
                      </a>
                    </div>

                  )
                })}

              </div>
              <div className="col-12 text-center">
                <div className="section-button d-inline-block wow fadeInUp" data-wow-delay="0.3s">
                  <a href="news">
                    <div className="btn-primary-icon-sm pt-3">
                      <p className="pera">Xem tất cả các tin tức</p>
                      {/* <i className="ri-arrow-right-up-line" /> */}
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          {/*/ End of News */}
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

    </div>
  )
}

export default Indextwo
