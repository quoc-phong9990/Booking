import { useQuery } from '@tanstack/react-query';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import '../App.css'
import '../App1.css'
import Footer from './Footer';
import Header from './Header';
import TourSbar from '../FunctionComponentContext/TourSbar';
import { Slide } from 'react-slideshow-image';
import { useState, useEffect } from 'react';

const TourDetails = () => {

  const { slug } = useParams();
  const [mainImage, setMainImage] = useState(null)
  console.log(slug);


  const { data, isLoading, error } = useQuery({
    queryKey: ['KEY_POST', slug],
    queryFn: async () => {
      const { data } = await axios.get(`http://127.0.0.1:8000/api/client/get-tour-detail/${slug}`);
      console.log(data.data.tour.images);
      localStorage.setItem('tour', JSON.stringify(data.data))
      return data.data;
    }
  });

  useEffect(() => {
    if (data && data.tour.images.length > 0 && !mainImage) {
      setMainImage(data.tour.images[0].image);
    }
  }, [data, mainImage]);

  if (isLoading) return
  <div className="spinner">
    <div className="blob blob-0" />
  </div>;
  if (error) return <div>Error: {error.message}</div>;

  const handleImageClick = (image: any) => {
    setMainImage(image);
  }

  return (
    <div>
      <Header />
      <main>
        <section className="breadcrumbs-area breadcrumb-bg">
          <div className="container">
            <h1 className="title wow fadeInUp" data-wow-delay="0.0s">Chi tiết tour du lịch</h1>
            <div className="breadcrumb-text">
              <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                <ul className="breadcrumb listing">

                  <li className="breadcrumb-item single-list"><Link to="/" className="single">Trang chủ</Link></li>
                  <li className="breadcrumb-item single-list" aria-current="page">
                    <a href="javascript:void(0)" className="single active">Chi tiết tour du lịch</a>

                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </section>

        {/*/ End-of Breadcrumbs*/}
        {/* Destination area S t a r t */}
        <section className="tour-details-section section-padding2">
          <div className="tour-details-area">
            {/* Details Banner Slider */}
            {data.tour.images && data.tour.images.length > 0 && (
              <>
                <Slide>
                  <div className="main-image">
                    <img className='images' src={`http://127.0.0.1:8000/${mainImage}`} alt="Main" />
                  </div>
                </Slide>
                <div className="thumbnail-images">
                  {data.tour.images.map((imageObj: any, index: any) => (
                    <img
                      key={index}
                      src={`http://127.0.0.1:8000/${imageObj.image}`}
                      alt={`Thumbnail ${index}`}
                      onClick={() => handleImageClick(imageObj.image)}
                      className="thumbnail"
                    />
                  ))}
                </div>
              </>
            )}
          </div>
          <div className="tour-details-banner ">
          </div>
          {/* / Slider*/}
          <div className="tour-details-container">
            <div className="container">
              {/* Details Heading */}
              <div className="details-heading" key={data.tour.id}>
                <div className="d-flex flex-column">
                  <h4 className="title">{data.tour.title}</h4>
                  <div className="d-flex flex-wrap align-items-center gap-30 mt-16">
                    <div className="location">
                      <i className="ri-map-pin-line" />
                      <div className="name">{data.tour.location.province}</div>
                    </div>
                    <div className="divider" />
                    <div className="d-flex align-items-center flex-wrap gap-20">
                      <div className="count">
                        <i className="ri-time-line" />
                        <p className="pera mt-3">{data.tour.day} Ngày {data.tour.day - 1} Đêm</p>
                      </div>
                      <div className="count">
                        <i className="ri-user-line" />
                        <p className="pera"></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="price-review">
                  <div className="d-flex gap-10 align-items-end">

                    <p className="light-pera">Chỉ từ :</p>
                    <div className="price mb-3 d-flex justify-content-center ml-4">
                      <h6 className="text-danger fw-bold mr-2">Giá mới: {data.tour.promotion}VND</h6>
                      <h6 className="text-muted text-decoration-line-through">Giá cũ: {data.tour.price}VND</h6>
                    </div>

                  </div>
                  <div className="rating">
                    <p className="pera mr-5">Đánh giá: {data.rates ? data.rates.qty : 0}</p>
                    <p className="pera">{data.rates ? data.rates.rate : 0}</p>
                    <i className="ri-star-s-fill mb-3"></i>
                  </div>
                </div>
              </div>


              <div className="mt-30">
                <div className="row g-4">
                  <div className="col-xl-8 col-lg-7">
                    <div className="tour-details-content">
                      <h4 className="title">Về</h4>
                      <p className="pera">
                        <div dangerouslySetInnerHTML={{ __html: data.tour.description }} />
                      </p>
                    </div>

                    <div className="tour-include-exclude radius-6">
                      <div className="includ-exclude-point">
                        <h4 className="title">Thuộc tính</h4>
                        {data.tour.attributes?.map((attr: any) => (
                          <li key={attr.id}>
                            {attr.attribute}<br />
                          </li>
                        ))}
                      </div>
                      <div className="divider" />
                    </div>


                    <div className="tour-details-content mb-30">
                      <h4 className="title">Kế hoạch du lịch</h4>
                      <div className="accordion" id="accordionExample">
                        {data.tour.itineraries?.length > 0 ? (
                          data.tour.itineraries.map((day: any, index: any) => (
                            <div key={index}>
                              <h2 className="accordion-header">
                                <button className="accordion-button text-black">
                                  Ngày {day.day}: {day.title}
                                </button>
                              </h2>
                              <div className='ml-4 text-black' dangerouslySetInnerHTML={{ __html: day.itinerary }} />
                              <div id={`collapse${index}`} className={`accordion-collapse collapse ${index === 1 ? "show" : ""}`} aria-labelledby={`heading${index}`} data-bs-parent="#accordionExample">
                                <div className="accordion-body"></div>
                              </div>
                            </div>


                          ))
                        ) : (
                          <p>Lịch trình không có sẵn.</p>
                        )}

                      </div>

                    </div>
                  </div>


                  {/* / Tour Plan accordion*/}
                  <div className="col-xl-4 col-lg-5">
                    <TourSbar />
                    <div className="row">
                      <hr className="mb-4" />
                      <div className="d-grid gap-2">
                        <a href={`/payment/${data.tour.slug}`} className="btn btn-primary btn-lg" type="button">
                          Đặt Lịch Ngay
                        </a>

                      </div>


                      <div />
                      {/* <p dangerouslySetInnerHTML={{ __html: hotel.description }}></p> */}

                    </div>
                  </div>
                  {/* Tour Privacy Policy */}


                </div>
                <div className="row justify-content-center">
                  <div className="col-xl-7 col-lg-7">
                    <div className="section-title text-center mx-605 mx-auto position-relative mb-60">
                      <span className="highlights">Khách Sạn</span>
                      <h4 className="title">
                        Hãy lựa chọn Khách sạn mà bạn yêu thích nhất
                      </h4>
                    </div>
                  </div>
                </div>
                <div className="row g-4 hotel">
                  {data.tour.hotels?.map((hotel: any, index: any) => {
                    return (
                      <div className="col-xl-6 col-lg-3 col-sm-6" key={index}>
                        <a href={"news-details/" + hotel.id} />
                        <article className="news-card-two wow fadeInUp" data-wow-delay="0.0s">
                          <figure className="news-banner-two imgEffect">
                            <img className='images' src={'http://127.0.0.1:8000/' + hotel.images} alt="travello" />
                          </figure>
                          <div className="price mb-2 d-flex justify-content-center ml-4 ">
                            <h6 className="text-danger fw-bold  mr-2 ">Giá mới: {hotel.promotion}VND</h6>  <h6 className="text-muted text-decoration-line-through">Giá cũ: {hotel.price}VND</h6>



                          </div>
                          <div className="news-content">


                            <h5>Khách Sạn</h5>
                            <div className="heading line-clamp-1">


                              <span className="heading-pera"> <h6>{hotel.name}</h6></span>

                            </div>

                          </div>
                        </article>

                      </div>
                    )
                  })}
                </div>

              </div>


              <div className="col-12 text-center">
                <div className="section-button d-inline-block wow fadeInUp" data-wow-delay="0.3s">
                  <a href="news">
                    <div className="btn-primary-icon-sm pt-3">
                      <p className="pera">Xem tất cả Các khách sạn </p>
                      {/* <i className="ri-arrow-right-up-line" /> */}

                    </div>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </section>
      </main>
      <Footer />

      <div className="progressParent" id="back-top">
        <svg className="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
      </div>
      <div className="search-overlay" />

    </div >
  )
};

export default TourDetails;
