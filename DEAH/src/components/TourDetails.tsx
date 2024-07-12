import { useQuery } from '@tanstack/react-query';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import '../App.css'
import Footer from './Footer';
import Header from './Header';
import TourSbar from '../FunctionComponentContext/TourSbar';
import { Slide } from 'react-slideshow-image';


const TourDetails = () => {
  const { id } = useParams();
  console.log(id);

  const { data, isLoading, error } = useQuery({
    queryKey: ['KEY_POST', id],
    queryFn: async () => {
      const { data } = await axios.get(`http://127.0.0.1:8000/api/client/get-tour-detail/${id}`);
      console.log(data.data.tour.images);
      localStorage.setItem('tour', JSON.stringify(data.data))
      return data.data;
    }
  });

  if (isLoading) return <div>Loading.....</div>;
  if (error) return <div>Error: {error.message}</div>;

  // Ensure data is defined and is an array
  const tourDetail = data ? (Array.isArray(data) ? data : [data]) : [];
  console.log(tourDetail);

  return (
    <div>
      <div>
        <Header />
        <main>
          {/* Breadcrumbs S t a r t */}
          <section className="breadcrumbs-area breadcrumb-bg">
            <div className="container">
              <h1 className="title wow fadeInUp" data-wow-delay="0.0s">Chi tiết tour du lịch</h1>
              <div className="breadcrumb-text">
                <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                  <ul className="breadcrumb listing">
                    <li className="breadcrumb-item single-list"><a href="index" className="single">Trang chủ</a></li>
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

              <Slide>
                <div className="each-slide-effect mr-3">
                  <div className="image-group">
                    {data.tour.images && data.tour.images.length > 0 && (
                      <div className="image-item">
                        <img
                          src={'http://127.0.0.1:8000/' + (data.tour.images[0] ? data.tour.images[0].image : '')}
                          alt="travello"
                        />
                      </div>
                    )}
                  </div>
                </div>
              </Slide>
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
                        <p className="light-pera ">Từ</p>
                        <p className="pera mt-2 text-danger">{data.tour.price} VND</p>
                      </div>
                      <div className="rating">
                        <p className="pera mr-5">Đánh giá: {data.rates ? data.rates.qty : 0}</p> <p className="pera"> {data.rates ? data.rates.rate : 0}   </p> <i className="ri-star-s-fill  mb-3"></i>

                      </div>
                    </div>
                  </div>


                  {/* / Details Heading */}
                  <div className="mt-30">
                    <div className="row g-4">
                      {/* Left content */}
                      <div className="col-xl-8 col-lg-7">
                        {/* About tour */}
                        <div className="tour-details-content">
                          <h4 className="title">Về</h4>
                          <p className="pera">Lorem rất cà rốt, nhà phát triển đại học cà chua, nhưng làm
                            inique
                            sự cố
                            để làm việc hoặc đau đớn.Làm thế nào để bạn làm một sự tha thứ kỳ lạ, người đã
                            Tập thể dục Ullamco
                            thuê người làm
                            Ngoại trừ việc yêu cầu từ cô ấy xin vui lòng công thức.Bài tập về nhà tự động trong một irre
                            bị chỉ trích trong niềm vui xin vui lòng
                            được
                            Cura Pain Football không chạy nữa.Ngoại trừ là người da đen
                            Không ủng hộ
                            lỗi
                            Các dịch vụ đó từ bỏ việc làm mềm là một món ăn nhẹ. "</p>
                          <p className="pera">Nhưng tôi phải gặp phải sai lầm rằng mọi người đều là một niềm vui
                            Công tố viên
                            nỗi đau
                            Ca ngợi, toàn bộ điều cần mở, và những điều từ người phát minh ra sự thật đó
                            Và là một kiến ​​trúc sư
                            Hạnh phúc
                            Cuộc sống đã được nói để giải thích.Không ai là niềm vui của niềm vui
                            từ chối hoặc ghét hoặc
                            chạy trốn,
                            Nhưng bởi vì họ dẫn đến những nỗi đau lớn, những người có niềm vui để theo dõi
                            không biết.Hoặc hơn nữa
                            bất cứ ai;
                            Chính nỗi đau vì cà rốt, cà chua muốn, nhưng bởi vì
                            Tôi chưa bao giờ có chế độ của nó
                            Thời gian sự cố để làm việc và đau đớn để tìm kiếm một số niềm vui.ĐẾN
                            Đối với người nhỏ bé tôi sẽ đến
                            Ai
                            Việc đào tạo của chúng tôi là một sự nhạy cảm về thể chất của một sự dữ dội trừ khi họ làm điều gì đó
                            của lợi thế
                            hậu quả?
                            Một hoặc quyền của cô ấy để chỉ trích niềm vui là nhiều hơn
                            Không khó chịu
                            Hậu quả
                            Hay đó là nỗi đau của anh ta để chạy trốn mà niềm vui của số 0 được chuẩn bị?"</p>
                        </div>
                        {/* / About tour */}
                        {/* Tour Include Loại trừ */}
                        <div className="tour-include-exclude radius-6">
                          <div className="includ-exclude-point">
                            <h4 className="title">Thuộc tính</h4>
                            <ul>

                              {data.tour.attributes?.map((attr: any) => {
                                return (
                                  <li className='' key={attr.id}>
                                    {attr.attribute}<br />
                                    {attr.created_at}<br />
                                    {attr.updated_at}<br />
                                    {attr.deleted_at}<br />
                                  </li>
                                )
                              })}
                            </ul>
                          </div>
                          <div className="divider" />

                        </div>
                        {/* / Tour Include Loại trừ */}
                        {/* Tour Plan accordion*/}
                        <div className="tour-details-content mb-30">
                          <h4 className="title">Kế hoạch du lịch</h4>
                          <div className="accordion" id="accordionExample">
                            {data.tour.itineraries?.map((day: any, index: any) => (
                              <div className="accordion-item" key={index}>
                                <h2 className="accordion-header" id={`heading${index}`}>
                                  <button
                                    className="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target={`#collapse${index}`}
                                    aria-expanded={index === 0 ? "true" : "false"}
                                    aria-controls={`collapse${index}`}
                                  >
                                    Ngày {day.day}: {day.title}
                                  </button>
                                </h2>
                                <div
                                  id={`collapse${index}`}
                                  className={`accordion-collapse collapse ${index === 0 ? "show" : ""}`}
                                  aria-labelledby={`heading${index}`}
                                  data-bs-parent="#accordionExample"
                                >
                                  {/* <div className="accordion-body">
                                    <div dangerouslySetInnerHTML={{ __html: day.itinerary }} />
                                    <p>{day.itinerary}</p>
                                  </div> */}

                                </div>
                                <p>{day.itinerary}</p>
                              </div>
                            ))}
                          </div>
                        </div>


                        {/* / Tour Plan accordion*/}
                        {/* Tour Privacy Policy */}
                        <div className="tour-details-content">
                          <h4 className="title">Khách Sạn</h4>
                          <div className="tab-content" id="pills-tabContent">
                            <div className="tab-pane fade show active" id="pills-london" role="tabpanel" aria-labelledby="pills-london-tab">
                              <div className="row g-4">
                                {data.tour.hotels?.map((hotel: any, index: any) => (
                                  <div className="" key={index}>
                                    <div className="package-card">
                                      <div className="package-img">
                                        <a href="tour-details">
                                          <img className='image' src={'http://127.0.0.1:8000/' + (hotel.images ? hotel.images : '')} alt="travello" />
                                        </a>
                                      </div>
                                      <div className="package-content">
                                        <h1 className="area-name line-clamp-1">
                                          <Link to={`/tour-details/${hotel.id}`}>{hotel.name}</Link>  <i className="ri-map-pin-line" />

                                        </h1>

                                        <p>{hotel.address}</p>

                                        <div className="location">

                                          <p>{hotel.description}</p>
                                        </div>
                                        <div className="packages-person">
                                          <div className="count">
                                            <i className="ri-time-line" />
                                            {/* Thêm thông tin về số ngày và đêm nếu cần */}
                                          </div>
                                        </div>
                                        <div className="price-review">
                                          <div className="d-flex gap-10">
                                            <p>
                                              Giá khuyến mãi : <span className="text-danger">{hotel.promotion}</span>.VND   -{'     '}
                                              Giá cũ : <span className="text-decoration-line-through text-danger">{hotel.price}</span>.VND
                                            </p>



                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                ))}
                              </div>
                            </div>
                          </div>

                          <div className="container">
                            <div className="row">
                              <hr className="mb-4" />
                              <div className="d-grid gap-2">
                                <a href={`/payment/${id}`} className="btn btn-primary btn-lg" type="button">
                                  Đặt Lịch Ngay
                                </a>
                              </div>


                            </div>
                            <div className="tab-pane fade" id="pills-bangkok" role="tabpanel" aria-labelledby="pills-bangkok-tab">


                            </div>



                          </div>


                        </div>
                        {/* / Tour Privacy Policy */}
                      </div>
                      {/* Right content */}

                      <div className="col-xl-4 col-lg-5">
                        <TourSbar />
                      </div>


                      {/* <TravelCard /> */}

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          {/*/ End-of Destination */}
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

export default TourDetails