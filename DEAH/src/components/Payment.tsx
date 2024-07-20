import React, { useEffect, useState } from 'react'
import Header from './Header'
import Footer from './Footer'
import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter';
import axios from 'axios';
import '../App1.css'
import DateStar from '../FunctionComponentContext/FunctionApp';
import You from './You';


const Payment = () => {


  const [username, setUserName] = useState<string>('');
  const [phone, setPhone] = useState<string>('');
  const [email, setEmail] = useState<string>('');
  const [hotel, setHotel] = useState<any>();
  const tourString = localStorage.getItem('tour');
  const tour = tourString ? JSON.parse(tourString) : null;
  // const [searchTerm, setSearchTerm] = useState('');
  const [filteredOptions, setFilteredOptions] = useState(tour.tour.hotels);

  console.log(tour);

  const [startDate, setStartDate] = useState<string>('');
  const [endDate, setEndDate] = useState<string>('');
  const Payment = async () => {
    const user_payment_info = {
      'user_name': username,
      'email': email,
      'phone': phone,
      'start': startDate,
      'end': endDate,
    }
    sessionStorage.setItem('user_payment_info', JSON.stringify(user_payment_info))
    const response = await axios.post('http://127.0.0.1:8000/api/client/create-payment', {
      'booking_code': '',
      'user_name': username,
      'email': email,
      'tour_name': tour.tour.title,
      'tour_price': tour.tour.price,
      'tour_address': tour.tour.address + ', ' + tour.tour.location.ward + ', ' + tour.tour.location.district + ', ' + tour.tour.location.province,
      'hotel_name': hotel.name,
      'hotel_price': hotel.promotion ? Number(hotel.promotion) : hotel.price,
      'hotel_address': hotel.address + ', ' + tour.tour.location.province,
      'book_price': tour.tour.price + hotel.promotion ? Number(hotel.promotion) : hotel.price,
      'promotion_price': 1,
      'total_price': (tour.tour.price + (hotel.promotion ? Number(hotel.promotion) : hotel.price)) * 1,
      'people': 1,
      'start': startDate,
      'end': endDate,
      'status_tour': 0,
      'status_payment': 0,
      'type': tour.tour.type,
      'phone': phone,
      'promotion': tour.tour.promotion,
    })
    return window.location.href = response.data.data;
  };


  const chooseHotel = (e: any) => {
    let data = JSON.parse(e.target.value);
    setHotel(data);
  }

  const handleStartDateChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const selectedStartDate = e.target.value;
    setStartDate(selectedStartDate);

    // Calculate end date
    const startDateObj = new Date(selectedStartDate);
    const endDateObj = new Date(startDateObj);
    endDateObj.setDate(startDateObj.getDate() + tour.tour.day);

    // Format end date as YYYY-MM-DD
    const formattedEndDate = endDateObj.toISOString().split('T')[0];
    setEndDate(formattedEndDate);
  };

  return (
    <div>
      <div>
        <Header />
        <main>
          {/* Breadcrumbs S t a r t */}
          <section className="breadcrumbs-area breadcrumb-bg">
            <div className="container">
              <h1 className="title wow fadeInUp" data-wow-delay="0.0s">Thanh Toán</h1>
              <div className="breadcrumb-text">
                <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                  <ul className="breadcrumb listing">
                    <li className="breadcrumb-item single-list"><a href="index" className="single">Trang chủ</a></li>
                    <li className="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)" className="single active">Payment</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </section>
          {/*/ End-of Breadcrumbs*/}
          {/* Destination area S t a r t */}
          <section className="tour-details-section section-padding2">
            <div className="tour-details-area">
              <div className="tour-details-container">
                <div className="container">
                  <div className="details-heading mb-30">
                    <div className="d-flex flex-column">
                      <h4 className="title">{tour.tour.title}</h4>
                      <div className="d-flex flex-wrap align-items-center gap-30 mt-16">
                        <div className="location">
                          <i className="ri-map-pin-line" />
                          <div className="name">{tour.tour.location.province}</div>
                        </div>
                        <div className="divider" />
                        <div className="d-flex align-items-center flex-wrap gap-20">
                          <div className="count">
                            <i className="ri-time-line" />
                            <p className="pera">{tour.tour.day} ngày {tour.tour.day - 1 == 0 ? '' : (tour.tour.day - 1 + ' đêm')}</p>
                          </div>
                          <div className="count">
                            <i className="ri-user-line" />
                            <p className="pera">2 người</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="price-review">
                      <div className="d-flex gap-10 align-items-end">
                        <p className="light-pera">Thành Tiền</p>
                        <p className="pera"><CurrencyFormatter amount={tour.tour.price} /></p>
                      </div>
                    </div>
                  </div>
                  <div className="row g-4">
                    <div className="col-xl-8">
                      {/* Included Exclude*/}
                      <div className="tour-include-exclude m-0 mb-30 radius-6">
                        <div className="includ-exclude-point">
                          <h4 className="title">Bao gồm</h4>
                          <ul className="expect-list">
                            <li className="list">Tất cả các vé nhập cảnh của các điểm đến nhảy </li>
                            <li className="list">Bữa trưa Platter </li>
                            <li className="list"> Đồ ăn nhẹ buổi tối </li>
                            <li className="list"> Bộ sơ cứu (trong trường hợp khẩn cấp) </li>
                          </ul>
                        </div>
                      </div>
                      {/*/ Included Exclude*/}
                      {/* Payment S t a r t */}
                      <div className="donation-payment">
                        {/* Payment */}
                        <div className="card-style box-shadow border-0">
                          <div className="row g-4">
                            <div className="col mb-4">

                              <label htmlFor="name">Họ và tên</label>
                              <input type="text" onChange={(e) => setUserName(e.target.value)} value={username} className="form-control" placeholder="Họ và Tên" aria-label="Họ và Tên" />

                            </div>
                          </div>
                          <div className="input-group col mb-4">
                            <div className="input-group-text">+84</div>
                            <input type="number" onChange={(e) => setPhone(e.target.value)} value={phone} className="form-control" placeholder="Số điện thoại" />
                          </div>

                          <div className="mb-4">
                            <label htmlFor="email">Email (Bắt Buộc)</label>

                            <input type="email" onChange={(e) => setEmail(e.target.value)} className="form-control" placeholder="you@example.com" aria-label="email" />
                          </div>
                          <div className="mb-4">

                            <label htmlFor="email">Chọn khách sạn</label>
                            <div className=''>
                              {/* <input
                                className="form-control"
                                type="text"
                                placeholder="Search..."
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                              /> */}
                              <select className="form-select" onChange={(e) => chooseHotel(e)} style={{ maxHeight: '500px', overflowY: 'auto' }}>
                                <option value="">-- Hotel --</option>
                                {filteredOptions.map((option: any, index: any) => (
                                  <option key={index} value={JSON.stringify(option)}>
                                    {option.name}
                                  </option>
                                ))}
                              </select>
                            </div>
                          </div>
                          {/* hình thức thanh toán chọn */}
                          <div className="tour-include-exclude m-0 mb-30 radius-6">
                            <div className="include-exclude-point">
                            
                              <div className="checkbox-group">

                                <div className='d-flex'>
                                  <input  name='payment_method' type="radio" />
                                  <label className='bg-white  h-9 rounded shadow justify-content-center '>Thanh toán bằng tiền mặt
                                  </label>
                                </div>

                                <div className='d-flex'>
                                  <input name='payment_method' type="radio" />
                                  <label className='bg-white  h-9 rounded shadow justify-content-center'>Chuyển khoản ngân hàng
                                  </label>
                                </div>

                                <div className='d-flex'>
                                  <input  name='payment_method' type="radio" />
                                  <label className='bg-white  h-9 rounded shadow justify-content-center '>Thanh toán VNPay
                                  </label>
                                </div>

                              </div>
                            </div>
                          </div>

                          {/* hình thức thanh toán chọn */}

                        </div>
                      </div>
                      {/*End-of Payment */}
                    </div>
                    <div className="col-xl-4">
                      <div className="date-travel-card position-sticky top-0">
                        <div className="price-review">
                          <div className="d-flex gap-10 align-items-end">
                            <p className="light-pera">Tổng</p>
                            <p className="pera"><CurrencyFormatter amount={tour.tour.price} /></p>
                          </div>
                          <div className="rating">
                            <p className="pera">Giá thay đổi theo quy mô nhóm</p>
                          </div>
                        </div>
                        <h4 className="heading-card">Chọn Ngày và Khách du lịch </h4>
                        <div className="date-time-dropdown">
                          <DateStar />
                          {/* <input type="date" /> */}
                        </div>
                        <div className="dropdown-section position-relative user-picker-dropdown">
                          <You />
                        </div>

                        <div className="footer bg-transparent">
                          <h4 className="title">Hủy bỏ miễn phí</h4>
                          <p className="pera"> Lên đến 24 giờ trước</p>
                        </div>
                      </div>
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

export default Payment
