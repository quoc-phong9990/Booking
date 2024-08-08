import React from 'react'
import { useLocation } from 'react-router-dom';

const PaymentPage = () => {
    const location = useLocation();
    const { data } = location.state || {};
    return (
        <>
            {/* component */}
            <div className="bg-gray-100 h-screen">
                <div className="bg-white p-6  md:mx-auto">
                    <svg
                        viewBox="0 0 24 24"
                        className="text-green-600 w-16 h-16 mx-auto my-6"
                    >
                        <path
                            fill="currentColor"
                            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
                        ></path>
                    </svg>
                    <div className="text-center">
                        <h3 className="md:text-2xl text-base text-gray-900 font-semibold text-center">
                            Payment Done!
                        </h3>
                        <strong className="text-gray-600 my-3">
                            Cảm ơn quý khách đã đặt vé tại DEAH!
                        </strong>
                        <p className="text-gray-600 my-3">
                            Đơn hàng {data.booking_code} đã được tiếp nhận
                        </p>
                        <p className="text-gray-600 my-3">
                            Chúng tôi sẽ xử lý đơn hàng của bạn vào ngày 26/7/2024.
                            <br />
                            Thông báo xác nhận đơn hàng sẽ gửi qua email của bạn
                            nmhung2804@gmail.com
                        </p>
                        <p className="text-gray-600 my-3">
                            VinsHome,Cao Tốc Láng - Hòa Lạc, Tây Mỗ, Nam Từ Liêm, Hà Nội
                        </p>
                        <p className="text-red-400 my-3 fw-bold">
                            Lưu ý : Quý khách cần thanh toán trước
                        </p>
                        <p> Chúc quý khách một ngày tốt lành!</p>
                        <div className="py-10 text-center">
                            <a
                                href="#"
                                className="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3"
                            >
                                GO BACK
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
export default PaymentPage