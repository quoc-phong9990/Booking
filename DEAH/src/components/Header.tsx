import React, { useEffect, useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import '../App.css';

const Header = ({status}) => {
  const navigate = useNavigate();
  const [userName, setUserName] = useState<{ name: String, avatar: String } | null>(null);

  useEffect(() => {
    const userData = sessionStorage.getItem('user');
    if (userData) {
      setUserName(JSON.parse(userData));
    }
  }, [status]);

  const handleLogout = () => {
    sessionStorage.removeItem('user');
    localStorage.removeItem('token');
    setUserName(null);
    alert('Bạn đã đăng xuất');
    navigate('/login');
  };

  return (
    <div>
      <header>
        <div className="header-area">
          <div className="main-header">
            {/* Header Top */}
            <div className="header-top">
              <div className="container">
                <div className="row">
                  <div className="col-lg-12">
                    <div className="top-menu-wrapper d-flex align-items-center justify-content-between">
                      {/* Top Left Side */}
                      <div className="top-header-left d-flex align-items-center">
                        {/* Logo*/}
                        <div className="logo">
                          <a href="index-two">
                            <img
                              width="80px"
                              src="/src/assets/images/logo/logonew-nobg.png"
                              alt="logo"
                              className="changeLogo"
                            />
                          </a>
                        </div>
                        {/* search box */}
                        <div className="search-box search-bar d-none d-lg-block">
                          <div className="header-search">
                            <span className="pera">Điểm Đến Thu Hút</span>
                            <div className="search-icon">
                              <i className="ri-search-line" />
                            </div>
                            <kbd className="light-text">
                              <abbr title="Ctrl">Ctrl +</abbr> k
                            </kbd>
                          </div>
                        </div>
                        {/* Mobile Device Seach & Theme Mode */}
                        <div className="search-header-position d-block d-lg-none">
                          <div className="d-flex gap-15">
                            <div className="search-bar">
                              <a href="javascript:void(0)" className="rounded-btn">
                                <i className="ri-search-line" />
                              </a>
                            </div>
                            {/* Theme Mode */}
                            <button className="ToggleThemeButton change-theme-mode m-0 p-0 border-0">
                              <i className="ri-sun-line" />
                            </button>
                          </div>
                        </div>
                      </div>
                      {/*Top Right Side */}
                      <div className="top-header-right">
                        {/* contact us */}
                        <div className="contact-section">
                          <div className="circle-primary-sm">
                            <i className="ri-mail-line" />
                          </div>
                          <div className="info">
                            <p className="pera">Email bất cứ lúc nào</p>
                            <h4 className="title">
                              <a href="javascript:void(0)">example@gmail.com</a>
                            </h4>
                          </div>
                        </div>
                        <div className="contact-section">
                          <div className="circle-primary-sm">
                            <i className="ri-phone-line" />
                          </div>
                          <div className="info">
                            <p className="pera">Gọi bất cứ lúc nào</p>
                            <h4 className="title">
                              <a href="javascript:void(0)">00 (888) +123456</a>
                            </h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {/* Header Bottom */}
            <div className="header-bottom header-sticky">
              <div className="container">
                <div className="row">
                  <div className="col-lg-12">
                    <div className="menu-wrapper">
                      {/* Main-menu for desktop */}
                      <div className="main-menu d-none d-lg-block">
                        <nav>
                          <div className="d-flex justify-content-between align-items-center">
                            <ul className="listing" id="navigation">
                              <li className="single-list">
                                <a href="/index-two" className="single">Trang Chủ </a>
                              </li>
                              <li className="single-list">
                                <a href="/about" className="single">Về Chúng Tôi</a>
                              </li>
                              <li className="single-list">
                                <a href="/tour-list" className="single">Gói Du Lịch</a>
                              </li>
                              <li className="single-list">
                                <a href="/news" className="single">Tin tức</a>
                              </li>
                              <li className="single-list">
                                <a href="/contact" className="single">Liên hệ</a>
                              </li>
                              <li className="d-block d-lg-none">
                                <div className="header-right pl-15">
                                  <div className="d-flex align-items-center gap-12">
                                    <div className="lang">
                                      <i className="ri-global-line" />
                                    </div>
                                    <div className="divider gradient-divider" />
                                    <div className="money">
                                      <p className="pera">Login</p>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                            <div className="header-right">
                              {userName ? (
                                <div className='d-flex'>
                                  <Link to={'/profile'}>
                                    <p className='mt-3 mr-2 user-name '>Chào mừng, {userName.name}!</p>  
                                  </Link>
                                  <img className='rounded-circle' width={60} height={100} src={'http://127.0.0.1:8000/' + (userName.avatar ? userName.avatar : '')} alt="" />
                                
                                </div>
                              ) : (
                                <p className='mt-3'>Chào mừng, bạn vui lòng đăng nhập!</p>
                              )}

                              {!userName && (
                                <div className="sign-btn">
                                  <a href="/login" className="btn-secondary-sm">Đăng nhập</a>
                                </div>
                              )}
                             
                             {userName && (
                             <div className="sign-btn">
                                  <a type='submit' className="btn-secondary-sm " onClick={handleLogout}>Đăng xuất</a>
                                </div>
                             )}
                              {/* Theme Mode */}
                              <li className="single-list">
                                <button className="ToggleThemeButton change-theme-mode m-0 p-0 border-0">
                                  <i className="ri-sun-line" />
                                </button>
                              </li>
                            </div>
                          </div>
                        </nav>
                      </div>
                    </div>
                    {/* Mobile Menu */}
                    <div className="div">
                      <div className="mobile_menu d-block d-lg-none" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {/* Search box */}
          <div className="search-container">
            <div className="top-section">
              <div className="search-icon">
                <i className="ri-search-line" />
              </div>
              <div className="modal-search-box">
                <input type="text" id="searchField" className="search-field" placeholder="Điểm đến, Agency, Country" />
                <button id="closeSearch" className="close-search-btn">
                  <kbd className="light-text"> THOÁT </kbd>
                </button>
              </div>
            </div>
            <div className="body-section">
              <div className="row">
                <div className="col-md-8">
                  <ul className="listing">
                    <li>
                      <h4 className="search-label">Gần đây</h4>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-1.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Dubai by Night City Tour với Fountain Show
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-2.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Private Khu Phố Đồ Da Màu Vàng Tại Hà Nội
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-3.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Bảo Tàng Hoàng Gia Cổ Tích Du Lịch
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-1.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Bảo Tàng Hoàng Gia Cổ Tích Du Lịch
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div className="col-md-4">
                  <ul className="listing">
                    <li>
                      <h4 className="search-label">Popular Search</h4>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-4.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Private Khu Phố Đồ Da Màu Vàng Tại Hà Nội
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-5.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Private Khu Phố Đồ Da Màu Vàng Tại Hà Nội
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li className="single-list">
                      <a href="tour-details">
                        <div className="search-flex">
                          <div className="content-img">
                            <img src="/src/assets/images/gallery/search-img-6.jpeg" alt="travello" />
                          </div>
                          <div className="content">
                            <h4 className="title line-clamp-1">
                              Private Khu Phố Đồ Da Màu Vàng Tại Hà Nội
                            </h4>
                            <p className="pera line-clamp-2">
                              buổi Tối Tuyệt Vời Esc apade Bắt Đầu Từ Madinat
                              jumeirah Đến Đài Phun Nước Âm Nhạc Để Xem Người Khác.
                              buổi Tối Tuyệt VờiEscapade Bắt Đầu Từ Madinat
                              jumeirah Đến Các Đài Phun Nước Âm Nhạc Để Xem Người Khác
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
  );
};

export default Header;
