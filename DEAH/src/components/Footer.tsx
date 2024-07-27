import React from 'react'

const Footer = () => {
  return (
    <div>
      <footer>
        <div className="footer-wrapper footer-bg">
          <div className="container">
            <div className="footer-area">
              <div className="row g-4">
                <div className="col-xl-3 col-lg-4 col-sm-6">
                  <div className="single-footer-caption">
                    <div className="footer-title">
                      <h4 className="title text-white">Công ty</h4>
                      <ul className="list-unstyled">
                        <li className="single-list">
                          <a href="about">Về Chúng tôi</a>
                        </li>
                        <li className="single-list">
                          <a href="news  text-white">Tin tức</a>
                        </li>
                        <li className="single-list">
                          <a href="faq  text-white">Câu hỏi thường gặp</a>
                        </li>
                        <li className="single-list">
                          <a href="contact  text-white">Liên Hệ</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="col-xl-3 col-lg-4 col-sm-6">
                  <div className="single-footer-caption">
                    <div className="footer-title">
                      <h4 className="title text-white">Khám phá</h4>
                      <ul className="list-unstyled">
                        <li className="single-list">
                          <a href="faq">Câu hỏi thường gặp</a>
                        </li>
                        <li className="single-list">
                          <a href="tour-list">Chuyến du lịch Danh sách</a>
                        </li>
                        <li className="single-list">
                          <a href="destination">Điểm đến</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="col-xl-3 col-lg-4 col-sm-6">
                  <div className="single-footer-caption">
                    <div className="footer-title">
                      <h4 className="title text-white">Liên kết nhanh</h4>
                      <ul className="list-unstyled">
                        <li className="single-list">
                          <a href="index">Trang chủ</a>
                        </li>
                        <li className="single-list">
                          <a href="about">Về Chúng Tôi</a>
                        </li>
                        <li className="single-list">
                          <a href="contact">Liên Hệ với chúng tôi</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="col-xl-3 col-lg-4 col-sm-6">
                  <div className="single-footer-caption">
                    <div className="footer-title">
                      <h4 className="title text-white">Liên Hệ</h4>
                      <ul className="list-unstyled">
                        <li className="single-list">
                          <a href="#" className="mb-3 d-block">70 Cầu Giấy, châu Úc</a>
                          <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.041226135841!2d105.77974641059902!3d21.03103638053804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cabbe20b1%3A0x2b464ef03b17a822!2zMTUgUC4gRHV5IFTDom4sIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1722007949451!5m2!1sen!2s"
                            width="600"
                            height="250"
                            style={{ border: 0 }}
                            allowFullScreen
                            loading="lazy"
                            referrerPolicy="no-referrer-when-downgrade"
                            title="Google Map"
                          ></iframe>
                        </li>


                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="footer-middle-area">
              <div className="footer-body">
                <div className="footer-content">
                  <div className="d-flex flex-column gap-20">
                    <div className="logo">
                      <img src="/src/assets/images/logo/logo.png" alt="travello" className="changeLogo" />
                    </div>
                    <p className="pera">
                      Du lịch là một trải nghiệm biến đổi và phong phú
                      cho phép các cá nhân khám phá các điểm đến, văn hóa mới,
                      và phong cảnh.
                    </p>
                  </div>
                  <div className="footer-right">
                    <h4 className="title">Đăng ký bản tin của chúng tôi</h4>
                    <div className="subscribe-wraper">
                      <input className="footer-search" type="search" name="footer" placeholder="Enter Your Email" />
                      <button className="subscribe-btn">Đặt mua</button>
                    </div>
                  </div>
                </div>
              </div>
              <div className="footer-bottom">
                <ul className="listing">
                  <li className="single-list">
                    <a href="terms-condition" className="single"> Điều khoản của Việt Nam</a>
                  </li>
                  <li className="single-list">
                    <a href="privacy-policy" className="single"> Tuyên bố về quyền riêng tư và cookie</a>
                  </li>
                  <li className="single-list">
                    <a href="contact" className="single"> Cách thức hoạt động của trang web </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div className="footer-bottom-area">
            <div className="container">
              <div className="row">
                <div className="col-xl-12">
                  <div className="d-flex justify-content-between gap-2 flex-wrap">
                    <p className="pera">
                      © <span className="current-year">2023</span> initTheme. All rights reserved
                    </p>
                    <p className="pera">Được cung cấp bởi @Travello</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}

export default Footer
