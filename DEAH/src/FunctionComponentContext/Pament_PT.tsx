import React, { useState } from 'react';
import '../App1.css'
const Payment_PT = () => {
  const [openIndex, setOpenIndex] = useState(null);
  const Menus = [
    { 
      name1:'Quý khách vui lòng thanh toán tại bất kỳ văn phòng Vietravel trên toàn quốc và các chi nhánh tại nước ngoài.',
      name2: 'Quý khách chuyển khoản qua ngân hàng sau  Ngân hàng MB BANK: Tài khoản 2 3333 666 9999 – CHI NHÁNH GIA ĐỊNH, TPHCMNgân hàng ACB: Tài khoản 1818386868 – CHI NHÁNH BÌNH THẠNH, TPHCM ', link: '/abc',
      name3: 'HÌNH THỨC THANH TOÁN BẰNG THẺ ATM/ INTERNET BANKING Vietravel chấp nhận thanh toán bằng thẻ ATM qua cổng thanh toán ZaloPay Hãy đảm bảo Quý khách đang sử dụng thẻ ATM do ngân hàng trong nước phát hành và đã được kích hoạt chức năng thanh toán trực tuyến. '
    },
  ];

  const handleToggle = (index:any) => {
    setOpenIndex(openIndex === index ? null : index);
  };

  return (
    <div>
      <div className="tour-include-exclude m-0 mb-30 radius-6">
        <div className="include-exclude-point">
          <div className="checkbox-group">
            <div className=' open' onClick={() => handleToggle(0)}>
              <div className='d-flex'>
                <input name='payment_method' type="radio" />
                <label className='bg-white h-9 rounded shadow justify-content-center'>
                  Thanh toán bằng tiền mặt
                </label>
              </div>
              {openIndex === 0 && (
                <div>
                  <ul className='limited-width'>
                    {Menus.map((menu, index) => (
                      <li key={index}>
                        {/* <a href={menu.link}>{menu.name1}</a> */}
                
                        <p className='fs-6'>{menu.name1}</p>
                      </li>
                    ))}
                  </ul>
                </div>
              )}
            </div>
            <div className=' open' onClick={() => handleToggle(1)}>
              <div className='d-flex'>
                <input name='payment_method' type="radio" />
                <label className='bg-white h-9 rounded shadow justify-content-center'>
                  Chuyển khoản ngân hàng
                </label>
              </div>
              {openIndex === 1 && (
                <div className="menu-info">
                  <ul className='limited-width'>
                    {Menus.map((menu, index) => (
                      <li className='' key={index}>
                        {/* <a href={menu.link}>{menu.name2}</a> */}
                        <p className='fs-6'>{menu.name2}</p>
                      </li>
                    ))}
                  </ul>
                </div>
              )}
            </div>
            <div className=' open' onClick={() => handleToggle(2)}>
              <div className='d-flex'>
                <input name='payment_method' type="radio" />
                <label className='bg-white h-9 rounded shadow justify-content-center'>
                  Thanh toán VNPay
                </label>
              </div>
              {openIndex === 2 && (
                <div className="menu-info">
                  <ul className='limited-width'>
                    {Menus.map((menu, index) => (
                      <li key={index}>
                        {/* <a href={menu.link}></a> */}
                        <p className='fs-6'>{menu.name3}</p>
                      </li>
                    ))}
                  </ul>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Payment_PT;
