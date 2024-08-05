import React, { useState, useEffect } from 'react';
import { useQuery } from '@tanstack/react-query';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import '../App.css';
import '../App1.css';
import Footer from './Footer';
import Header from './Header';
import TourSbar from '../FunctionComponentContext/TourSbar';
import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { Slide } from 'react-slideshow-image';
import Modal from 'react-bootstrap/Modal';
import Button from 'react-bootstrap/Button';



const TourDetails = () => {
  const { slug } = useParams();
  const [mainImage, setMainImage] = useState<string | null>(null);
  const [modalIsOpen, setModalIsOpen] = useState<boolean>(false);
  const [currentDay, setCurrentDay] = useState<any>(null);
  const [rating, setRating] = useState<number>(0);
  const [formData, setFormData] = useState({
    name: '',
    comments: '',
    rate: '',
    tour_id: ''
  });

  const { data, isLoading, error } = useQuery({
    queryKey: ['KEY_POST', slug],
    queryFn: async () => {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/client/get-tour-detail/${slug}`);
        console.log(response.data.data.tour.id); // Log dữ liệu API để kiểm tra
        return response.data.data;
      } catch (error) {
        console.error('Error fetching tour detail:', error);
        throw error; // Đẩy lỗi lên phía trên để xử lý
      }
    }
  });

  useEffect(() => {
    if (data?.tour?.images?.length > 0 && !mainImage) {
      setMainImage(data.tour.images[0].image);
    }
  }, [data, mainImage]);

  useEffect(() => {
    if (data?.tour?.id) {
      setFormData((prevFormData) => ({
        ...prevFormData,
        tour_id: data.tour.id
      }));
      console.log(`Updated formData.tour_id: ${data.tour.id}`); // Log khi formData được cập nhật
    }
  }, [data]);

  const handleRating = (rate: number) => {
    setRating(rate);
    setFormData((formData) => ({
      ...formData,
      rate: rate.toString()
    }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Submitting form data:', formData); // Log dữ liệu form trước khi gửi
    try {
      const response = await axios.post(`http://127.0.0.1:8000/api/client/review-tour`, formData);
      console.log('Success:', response.data);
      setFormData((prevFormData) => ({
        name: '',
        comments: '',
        rate: '',
        tour_id: prevFormData.tour_id // Giữ lại tour_id sau khi gửi thành công
      }));
      alert('Bình luận của bạn đã được gửi thành công!');
    } catch (error) {
      console.error('Error:', error);
      alert('Có lỗi xảy ra khi gửi bình luận!');
    }
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    const { name, value } = e.target;
    setFormData((prevFormData) => ({
      ...prevFormData,
      [name]: value
    }));
  };

  const openModal = (day: any) => {
    setCurrentDay(day);
    setModalIsOpen(true);
  };

  const closeModal = () => {
    setModalIsOpen(false);
    setCurrentDay(null);
  };

  const settings = {
    dots: true,
    infinite: true,
    speed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
  };

  if (isLoading) {
    return (
      <div className="spinner">
        <div className="blob blob-0" />
      </div>
    );
  }

  if (error) {
    return <div>Error: {error.message}</div>;
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

        <section className="tour-details-section section-padding2">
          <div className="tour-details-area">
            {data.tour.images && data.tour.images.length > 0 && (
              <>
                <Slide {...settings}>
                  {data.tour.images.map((imageObj: any, index: any) => (
                    <div key={index} className="main-image">
                      <img
                        src={`http://127.0.0.1:8000/${imageObj.image}`}
                        alt={`Slide ${index}`}
                        style={{ width: '90%' }}
                      />
                    </div>
                  ))}
                </Slide>
              </>
            )}
          </div>

          <div className="tour-details-container">
            <div className="container">
              <div className="details-heading" key={data.tour.id}>
                <div className="d-flex flex-column">
                  <h4 className="title">{data.tour.title}</h4>
                  <div className="d-flex flex-wrap align-items-center gap-30 mt-16">
                    <div className="location">
                      <i className="ri-map-pin-line" />
                      <div className="name"> {data.tour.location.district}, {data.tour.location.province}</div>
                    </div>
                    <div className="divider" />
                    <div className="d-flex align-items-center flex-wrap gap-20">
                      <div className="count">
                        <i className="ri-time-line" />
                        <p className="pera mt-3">{data.tour.day} Ngày {data.tour.day - 1} Đêm</p>
                      </div>
                      <div className="count">
                        <p className="pera"></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="price-review">
                  <div className="d-flex gap-10 align-items-end">
                    <p className="light-pera">Chỉ từ :</p>
                    <div className="price mb-3 d-flex justify-content-center ml-4">
                      <h6 className="text-danger fw-bold mr-2">Giá mới: <CurrencyFormatter amount={data.tour.promotion} /></h6>
                      <h6 className="text-muted text-decoration-line-through">Giá cũ: <CurrencyFormatter amount={data.tour.price} /></h6>
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
                        <ul>
                          {data.tour.attributes?.map((attr: any) => (
                            <li key={attr.id}>
                              <strong> - {attr.attribute}</strong>
                            </li>
                          ))}
                        </ul>
                      </div>
                      <div className="divider" />
                    </div>
                    {/* cmt tour */}
                    <div className="contact-card mt-40">
                      <h4 className="contact-heading">Viết bình luận của bạn</h4>
                      <form method="post" className="contact-form" onSubmit={handleSubmit}>
                        <div className="row g-4">
                          <div className="col-sm-12 text-center">

                            <input className="custom-form" type="text" placeholder="Nhập tên của bạn" value={formData.name} onChange={handleChange} name='name' />
                          </div>
                          <div className="col-sm-12">
                            <textarea className="custom-form-textarea" id="exampleFormControlTextarea1" rows={3} placeholder="Hãy để lại bình luận của bạn tại đây" defaultValue={""} value={formData.comments} onChange={handleChange} name='comments' />
                          </div>
                          {/* sao */}
                          <h4 className="contact-heading">Đánh giá về tour du lịch</h4>
                          <div className="rating-section d-flex">
                            {[1, 2, 3, 4, 5].map((star) => (

                              <div className="rating-checkbox" key={star}>

                                <input
                                  type="checkbox"
                                  id={`star${star}`}
                                  name="rate"
                                  value={formData.rate}
                                  checked={rating === star}
                                  onChange={() => handleRating(star)}
                                />
                                <label htmlFor={`star${star}`}>
                                  <svg xmlns="http://www.w3.org/2000/svg" width={14} height={13} viewBox="0 0 14 13" fill="none">
                                    <path
                                      d="M6.09749 0.891366C6.45972 0.132244 7.54028 0.132244 7.90251 0.891366L9.07038 3.33882C9.21616 3.64433 9.5066 3.85534 9.84221 3.89958L12.5308 4.25399C13.3647 4.36391 13.6986 5.39158 13.0885 5.97067L11.1218 7.83768C10.8763 8.07073 10.7653 8.41217 10.827 8.74502L11.3207 11.4115C11.4739 12.2386 10.5997 12.8737 9.86041 12.4725L7.47702 11.1789C7.1795 11.0174 6.8205 11.0174 6.52298 11.1789L4.13959 12.4725C3.40033 12.8737 2.52614 12.2386 2.67929 11.4115L3.17304 8.74502C3.23467 8.41217 3.12373 8.07073 2.87823 7.83768L0.911452 5.97067C0.301421 5.39158 0.635332 4.36391 1.46924 4.25399L4.15779 3.89958C4.4934 3.85534 4.78384 3.64433 4.92962 3.33882L6.09749 0.891366Z"
                                      fill={rating >= star ? "#FFB400" : "#ccc"}
                                    />
                                  </svg>
                                </label>
                              </div>
                            ))}
                          </div>
                          {/* sao */}
                        </div>
                        <div className="mt-40">
                          <button type="submit" className="send-btn"> Đăng bình luận </button>
                        </div>
                      </form>
                    </div>
                    {/* cmt_tour */}
                    <div className="tour-details-content mb-30 ">
                      <h4 className="title">Xem lịch trình của bạn tại đây</h4>
                      <div className="tour-details-content mb-30">


                        <div className="accordion" id="accordionExample">
                          {data.tour.itineraries?.map((day: any) => (
                            <div key={day.day}>
                              <a href="#" onClick={() => openModal(day)}>Ngày {day.day}:  {day.title}</a>
                            </div>
                          ))}

                          <Modal
                            show={modalIsOpen}
                            onHide={closeModal}
                            centered
                            dialogClassName="custom-modal-width"
                            size='xl'
                          >
                            <Modal.Header className='schedule-header' closeButton>
                              <Modal.Title>Lịch trình tour</Modal.Title>
                            </Modal.Header>
                            <Modal.Body className='schedule-body'>
                              {currentDay && (
                                <ul>
                                  <div className='text-black font-bold' dangerouslySetInnerHTML={{ __html: currentDay.itinerary }} />
                                  <li>Kết thúc tour</li>
                                </ul>
                              )}
                            </Modal.Body>
                            <Modal.Footer className='schedule-footer bg-white'>
                              <Button variant="secondary" onClick={closeModal}>Đóng</Button>
                            </Modal.Footer>
                          </Modal>
                        </div>
                      </div>

                    </div>
                    {/* cmt tour */}
                    <div className="contact-card mt-40">
                      <h4 className="contact-heading">Viết bình luận của bạn</h4>
                      <form method="post" className="contact-form" onSubmit={handleSubmit}>
                        <div className="row g-4">
                          <div className="col-sm-6">
                            <input className="custom-form" type="text" placeholder="Enter your name" value={formData.name} onChange={handleChange} name='name' />
                          </div>
                          <div className="col-sm-12">
                            <textarea className="custom-form-textarea" id="exampleFormControlTextarea1" rows={3} placeholder="Enter your message..." defaultValue={""} value={formData.comments} onChange={handleChange} name='comments' />
                          </div>
                        </div>
                        <div className="mt-40">
                          <button type="submit" className="send-btn"> Đăng bình luận </button>
                        </div>
                      </form>
                    </div>
                    
                  </div>


                  <div className="col-xl-4 col-lg-5">
                  <div className="row">
                      <hr className="mb-4" />
                      <div className="d-grid gap-2">
                        <a href={`/payment/${slug}`} className="btn btn-primary btn-lg" type="button">
                          Đặt Lịch Ngay
                        </a>
                      </div>
                    </div>
                    <TourSbar />
                    
                  </div>
                </div>

                <div className="row justify-content-center">
                  <div className="col-xl-7 col-lg-7">
                    <div className="section-title text-center mx-605 mx-auto position-relative mb-60">
                      <span className="highlights">Khách hàng của chúng tôi</span>
                      <h2 className="title">Nhận Xét Khách Hàng</h2>
                    </div>
                  </div>
                </div>

                <div className="row g-4">
                  {data.reviews && data.reviews.map((review: any) => (
                    <div key={review.id} className="col-lg-6">
                      <div className="review-card p-4 radius-10">
                        <div className="reviewer d-flex align-items-center">
                          <div className="thumb position-relative">
                            <img src={`http://127.0.0.1:8000/${review.user.avatar}`} alt="reviewer" />
                          </div>
                          <div className="name-desination ml-10">
                            <h6 className="name">{review.user.username}</h6>
                            <p className="pera">{review.created_at}</p>
                          </div>
                        </div>
                        <p className="pera mt-24">{review.content}</p>
                        <div className="review-stars d-flex align-items-center">
                          <ul className="star-list d-flex align-items-center mr-2">
                            {Array.from({ length: review.rate }, (_, index) => (
                              <li key={index}>
                                <i className="ri-star-s-fill" />
                              </li>
                            ))}
                          </ul>
                          <p className="pera">{review.rate}</p>
                        </div>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
};

export default TourDetails;
