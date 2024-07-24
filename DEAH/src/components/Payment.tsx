import React, { useEffect, useState } from 'react';
import Header from './Header';
import Footer from './Footer';
import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter';
import axios from 'axios';
import '../App1.css';
import DateStar from '../FunctionComponentContext/FunctionApp';
import addDays from 'date-fns/addDays';
import UserPicker from './You';
import Payment_PT from '../FunctionComponentContext/Pament_PT';

const Payment: React.FC = () => {
    const [username, setUserName] = useState<string>('');
    const [phone, setPhone] = useState<string>('');
    const [email, setEmail] = useState<string>('');
    const [hotel, setHotel] = useState<any>(null);
    const [adults, setAdults] = useState<number>(0);
    const [kids, setKids] = useState<number>(0);
    const [totalPrice, setTotalPrice] = useState<number>(0);
    const tourString = localStorage.getItem('tour');
    const tour = tourString ? JSON.parse(tourString) : null;
    const [filteredOptions, setFilteredOptions] = useState<any[]>(tour ? tour.tour.hotels : []);
    const userString = sessionStorage.getItem('user');
    const user = userString ? JSON.parse(userString) : null;
    const user_id = user ? user.id : null;
    const [startDate, setStartDate] = useState<any>(new Date());
    const [endDate, setEndDate] = useState<any>(addDays(new Date(), tour.tour.day));


    const [paymentMethod, setPaymentMethod] = useState<any>('VPGD');
    useEffect(() => {
        calculateTotalPrice(adults, kids);
    }, [adults, kids, hotel]);

    const calculateTotalPrice = (adults: number, kids: number) => {
        const adultPrice = tour.tour.price; // Giả sử giá cho mỗi người lớn
        const kidPrice = tour.tour.price * 0.5; // Giả sử giá cho mỗi trẻ em là 50% giá người lớn
        const hotelPrice = hotel ? (hotel.promotion ? Number(hotel.promotion) : hotel.price) : 0;
        const newTotalPrice = (adults * adultPrice) + (kids * kidPrice) + hotelPrice;
        setTotalPrice(newTotalPrice);
    };

    const Payment = async () => {
        const user_payment_info = {
            'user_name': username,
            'email': email,
            'phone': phone,
            'start': startDate,
            'end': endDate,
        };
        sessionStorage.setItem('user_payment_info', JSON.stringify(user_payment_info));
        const bookingData = {
            'booking_code': 'Tour'+Date.now(),
            'user_name': username,
            'email': email,
            'tour_name': tour.tour.title,
            'tour_price': tour.tour.price,
            'tour_address': tour.tour.location.ward + ', ' + tour.tour.location.district + ', ' + tour.tour.location.province,
            'hotel_name': hotel ? hotel.name : '',
            'hotel_price': hotel ? (hotel.promotion ? Number(hotel.promotion) : hotel.price) : 0,
            'hotel_address': hotel ? (hotel.address + ', ' + tour.tour.location.province) : '',
            'book_price': tour.tour.price + (hotel ? (hotel.promotion ? Number(hotel.promotion) : hotel.price) : 0),
            'promotion_price': 1,
            'total_price': totalPrice,
            'people': kids + adults,
            'start': startDate,
            'end': endDate,
            'status_tour': 0,
            'status_payment': 0,
            'type': tour.tour.type,
            'phone': phone,
            'promotion': tour.tour.promotion,
            'kids': kids,
            'adults': adults,
            'user_id': user_id
        }
        switch (paymentMethod) {
            case 'VPGD':
                
                break;

            case 'CKNH':
                break;

            case 'VNPAY':
                const response = await axios.post('http://127.0.0.1:8000/api/client/vnpayment', bookingData);
                window.location.href = response.data.data;
                break;
            default:
                break;
        }
        
    };

    const chooseHotel = (e: any) => {
        console.log(paymentMethod);

        let data = JSON.parse(e.target.value);
        setHotel(data);
    };

    const handleUserChange = (adults: number, children2To5: number, children6To12: number) => {
        const kids = children2To5 + children6To12;
        setAdults(adults);
        setKids(kids);
    };

    return (
        <div>
            <Header />
            <main>
                {/* Breadcrumbs Start */}
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
                {/* Destination area Start */}
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
                                                    <p className="pera">{tour.tour.day} ngày {tour.tour.day - 1 === 0 ? '' : (tour.tour.day - 1 + ' đêm')}</p>
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
                                            <p className="pera"><CurrencyFormatter amount={totalPrice + tour.tour.price} /></p>


                                        </div>
                                    </div>
                                </div>
                                <div className="row g-4">
                                    <div className="col-xl-8">
                                        {/* Included Exclude */}
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
                                        {/*/ Included Exclude */}
                                        {/* Payment Start */}
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
                                                    <input type="email" onChange={(e) => setEmail(e.target.value)} value={email} className="form-control" placeholder="you@example.com" aria-label="email" />
                                                </div>
                                                <div className="mb-4">
                                                    <label htmlFor="hotel">Chọn khách sạn</label>
                                                    <select className="form-select" onChange={(e) => chooseHotel(e)} style={{ maxHeight: '500px', overflowY: 'auto' }}>
                                                        <option value="">-- Hotel --</option>
                                                        {filteredOptions.map((option: any, index: any) => (
                                                            <option key={index} value={JSON.stringify(option)}>
                                                                {option.name}
                                                            </option>
                                                        ))}
                                                    </select>
                                                </div>
                                                {/* hình thức thanh toán chọn */}
                                                <Payment_PT setPaymentMethod={setPaymentMethod} paymentMethod={paymentMethod} />
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
                                                    <p className="pera"><CurrencyFormatter amount={totalPrice + tour.tour.price} /></p>

                                                </div>
                                                <div className="rating">
                                                    <p className="pera">Giá thay đổi theo quy mô nhóm</p>
                                                </div>
                                            </div>
                                            <h4 className="heading-card">Chọn Ngày và Khách du lịch </h4>
                                            <div className="date-time-dropdown">
                                                <DateStar tour_long={tour.tour.day} setStartDate={setStartDate} setEndDate={setEndDate} />
                                            </div>
                                            <div className="dropdown-section position-relative user-picker-dropdown">

                                                <UserPicker onUserChange={handleUserChange} />
                                            </div>
                                            <div className="footer bg-transparent">
                                                <h4 className="title">Hủy bỏ miễn phí</h4>
                                                <p className="pera"> Lên đến 24 giờ trước</p>
                                            </div>
                                        </div>
                                        <button className="btn-primary-submit w-100 mt-2" onClick={Payment}>Thanh Toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/*/ End-of Destination */}
            </main>
            {/* Footer Start */}
            <Footer />
            <div className="progressParent" id="back-top">
                <svg className="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </div>
            <div className="search-overlay" />
        </div>
    );
};

export default Payment;
