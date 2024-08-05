import React from 'react'
const Footer = () => {
  return (
    <div>
      <footer className="bg-dark text-bg-secondary py-5">
      <div className="container">
        <div className="row">
          <div className="col-md-3">
            <h5 className='font-bold text-2xl'>Về DEAH Tour</h5>
            <ul className="list-unstyled">
              <li><a href="#" className="text-bg-secondary">Cách đặt chỗ</a></li>
              <li><a href="#" className="text-bg-secondary">Liên hệ chúng tôi</a></li>
              <li><a href="#" className="text-bg-secondary">Trợ giúp</a></li>
              <li><a href="#" className="text-bg-secondary">Tuyển dụng</a></li>
              <li><a href="#" className="text-bg-secondary">Về chúng tôi</a></li>
            </ul>
          </div>
          <div className="col-md-3">
            <h5 className='font-bold text-2xl'>Dịch vụ</h5>
            <ul className="list-unstyled">
              <li><a href="#" className="text-bg-secondary">Khách sạn</a></li>
              <li><a href="#" className="text-bg-secondary">Du lịch</a></li>
              <li><a href="#" className="text-bg-secondary">Bài viết</a></li>


            </ul>
          </div>
          <div className="col-md-3">
            <h5 className='font-bold text-2xl'>Khác</h5>
            <ul className="list-unstyled">
              <li><a href="#" className="text-bg-secondary">DEAH Tour Affiliate</a></li>
              <li><a href="#" className="text-bg-secondary">DEAH Tour Blog</a></li>
              <li><a href="#" className="text-bg-secondary">Chính Sách Quyền Riêng</a></li>
              <li><a href="#" className="text-bg-secondary">Điều khoản & Điều kiện</a></li>
              <li><a href="#" className="text-bg-secondary">Quy chế hoạt động</a></li>
            </ul>
          </div>
      
          <div className="col-md-3">
            <h5 className='font-bold text-2xl'>Vị trí</h5>
            <li><a href="#" className="text-bg-secondary">Hải Hậu, Hải Dương</a></li>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29822.927584943576!2d106.54187519999999!3d20.87745275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1722491046804!5m2!1sen!2s" width="200" height="200"loading="lazy" ></iframe>
          </div>
          <div className="animated-border"></div>
           <div className='text'> DEAH Tour </div>
           <div>
           <i className="bi bi-facebook"></i>
           <i className="bi bi-tiktok pl-3"></i>
           </div>



        </div>
      </div>
    </footer>
    </div>
  )
}

export default Footer

