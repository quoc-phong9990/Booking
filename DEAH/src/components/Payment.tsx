import React, { useEffect, useState } from 'react'
import Header from './Header'
import Footer from './Footer'
import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter';
import axios from 'axios';


const Payment = () => {


  const [username, setUserName] = useState<string>('');
  const [phone, setPhone] = useState<string>('');
  const [email, setEmail] = useState<string>('');
  const [hotel, setHotel] = useState<any>();
  const tourString = localStorage.getItem('tour');
  const tour = tourString ? JSON.parse(tourString) : null;
  // const [searchTerm, setSearchTerm] = useState('');
  const [filteredOptions, setFilteredOptions] = useState(tour.tour.hotels);

  // useEffect(() => {
  //   const filtered = tour.tour.hotels.filter((option: any) =>
  //     option.name.toLowerCase().includes(searchTerm.toLowerCase())
  //   );
  //   setFilteredOptions(filtered);
  // }, [searchTerm, tour.tour.hotels]);
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

                          <div className="form-group col-12 payment-gateway-wrapper mt-10">

                            <ul className="payment-gateway-list mb-10">
                              <li className="single-gateway-item selected"><img src="data:image/png;base64,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" alt="img" /></li>
                              <li className="single-gateway-item "><img src="data:image/png;base64,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" alt="img" /></li>
                              <li className="single-gateway-item "><img src="data:image/png;base64,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" alt="img" /></li>
                              <li className="single-gateway-item "><img src="data:image/png;base64,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" alt="img" /></li>
                              <li className="single-gateway-item "><img src="data:image/jpeg;base64,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" alt="img" /></li>
                              <li className="single-gateway-item "><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpOyAoah8p8WI42sTKtlpx4yEW7eHKBwXkMw&s" alt="img" /></li>
                              <li className="single-gateway-item "><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh3lnVTqmTLDexdUxwBExbSkFh-dERrdAlMw&s" alt="img" /></li>
                              <li className="single-gateway-item "><img src="/src/assets/images/icon/payment-method10.png" alt="img" /></li>
                              <li className="single-gateway-item "><img src="/src/assets/images/icon/payment-method12.png" alt="img" /></li>
                              <li className="single-gateway-item "><img src="/src/assets/images/icon/payment-method13.png" alt="img" /></li>
                              <li className="single-gateway-item "><img src="/src/assets/images/icon/payment-method15.png" alt="img" /></li>
                              <li className="single-gateway-item "><img src="/src/assets/images/icon/payment-method16.png" alt="img" /></li>
                            </ul>

                            <div className="remember-me terms-condition">
                              <label>
                                <input className="checkbox-style" type="checkbox" defaultValue="remember" name="remember" />
                                <small>I agree to all the
                                  <a href="terms-condition">
                                    <span className="text-primary">Terms</span></a> and <a href="privacy-policy"><span className="text-primary">Privacy policy</span>
                                  </a>
                                </small>
                                <span className="checkmark-style" />
                              </label>
                            </div>

                            <button className="btn-primary-submit" onClick={Payment}>Thanh Toán</button>


                          </div>

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
                          <div>
                            <input type="date" value={startDate}
                              onChange={handleStartDateChange} /> bắt đầu
                            <input type="date" value={endDate}
                              readOnly /> kết thúc
                          </div>
                        </div>
                        <div className="dropdown-section position-relative user-picker-dropdown">
                          <div className="d-flex gap-12 align-items-center">
                            <input type="text" placeholder=' Nhập số lượng người tại .... ' />
                          </div>
                          <div className="user-result" />
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
                                <p className="pera">2-11 năm </p>
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
                                <p className="pera"> Belwo 2 năm </p>
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
