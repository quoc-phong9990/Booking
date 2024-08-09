import React from "react";
const Footer = () => {
    return (
        <div>
            <footer className="bg-dark  py-5">
                <div className="container">
                    <div className="row">
                        <div className="col-md-3">
                            <h5 className="font-bold text-2xl text-white">
                                Về DEAH Tour
                            </h5>
                            <ul className="list-unstyled">
                                <li>
                                    <a href="#" className="text-white">
                                        Cách đặt chỗ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Liên hệ chúng tôi
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Trợ giúp
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Tuyển dụng
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Về chúng tôi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-md-3">
                            <h5 className="font-bold text-2xl text-white">
                                Dịch vụ
                            </h5>
                            <ul className="list-unstyled">
                                <li>
                                    <a href="#" className="text-white">
                                        Khách sạn
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Du lịch
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Bài viết
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-md-3">
                            <h5 className="font-bold text-2xl text-white">
                                Khác
                            </h5>
                            <ul className="list-unstyled">
                                <li>
                                    <a href="#" className="text-white">
                                        DEAH Tour Affiliate
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        DEAH Tour Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Chính Sách Quyền Riêng
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Điều khoản & Điều kiện
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="text-white">
                                        Quy chế hoạt động
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div className="col-md-3">
                            <h5 className="font-bold text-2xl text-white">
                                Vị trí
                            </h5>
                            <li>
                                <a href="#" className="text-white">
                                    Hải Hậu, Hải Dương
                                </a>
                            </li>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29822.927584943576!2d106.54187519999999!3d20.87745275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1722491046804!5m2!1sen!2s"
                                width="200"
                                height="200"
                                loading="lazy"
                            ></iframe>
                        </div>
                        <div className="animated-border"></div>

                        <div
                            style={{
                              width:"100%",
                                height: "100px",
                                overflow: "hidden",
                                whiteSpace: "nowrap",
                            }}
                        >
                            <div
                                style={{
                                  width :"100%",
                                    display: "inline-block",
                                    animation:
                                        "scroll-right 20s linear infinite",
                                }}
                            >
                                <div className="text-white "> DEAH Tour </div>
                                <div>
                                    <i className="bi bi-facebook text-white"></i>
                                    <i className="bi bi-tiktok pl-3 text-white"></i>
                                </div>{" "}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    );
};

export default Footer;
