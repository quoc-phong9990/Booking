import React from "react";
import Header from "./Header";
import Footer from "./Footer";

const Contact = () => {
    return (
        <div>
            <div>
                <Header />
                <main>
                    {/* Breadcrumbs S t a r t */}
                    <section className="breadcrumbs-area breadcrumb-bg">
                        <div className="container">
                            <h1
                                className="title wow fadeInUp"
                                data-wow-delay="0.0s"
                            >
                                Liên hệ
                            </h1>
                            <div className="breadcrumb-text">
                                <nav
                                    aria-label="breadcrumb"
                                    className="breadcrumb-nav wow fadeInUp"
                                    data-wow-delay="0.1s"
                                >
                                    <ul className="breadcrumb listing">
                                        <li className="breadcrumb-item single-list">
                                            <a href="index" className="single">
                                                Trang chủ
                                            </a>
                                        </li>
                                        <li
                                            className="breadcrumb-item single-list"
                                            aria-current="page"
                                        >
                                            <a
                                                href="javascript:void(0)"
                                                className="single active"
                                            >
                                                Liên hệ
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                    {/*/ End-of Breadcrumbs*/}
                    {/* Contact area S t a r t */}
                    <section className="contact-area section-padding2">
                        <div className="position-relative contact-bg-before">
                            <div className="container">
                                <div className="row justify-content-center">
                                    <div className="contact-card bg-blue-100">
                                        <h1 className=" h-5 font-bold text-center h4 ">
                                            Chúng tôi luôn sẵn sàng, dù bạn ở
                                            bất cứ đâu
                                        </h1>
                                    </div>
                                    <h3>Xin chào bạn,</h3>
                                    <h1>Chúng tôi có thể giúp gì cho bạn?</h1>
                                    <div className="border border-2 mt-3">
                                        <div className="d-flex h-30">
                                            <div>
                                                {" "}
                                                <br />
                                                <img
                                                    src="https://ik.imagekit.io/tvlk/image/imageResource/2023/10/10/1696911905593-4470bc248ccc07ec1bf005deb75417e0.png?tr=h-48,q-75,w-48"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <br />
                                                <h1 className="">
                                                    Hãy liên hệ với bộ phận Dịch
                                                    Vụ Khách Hàng của chúng tôi
                                                </h1>
                                            </div>
                                        </div>
                                        <br />
                                        <div className="border border-1">
                                            <p>
                                                Giờ hoạt động của Trung tâm chăm
                                                sóc khách hàng
                                            </p>
                                            <h5>
                                                Gọi điện:thứ hai- chủ nhật (từ 8
                                                giờ sáng - 10 giờ tối)
                                            </h5>
                                            <h5>
                                                Tin nhắn và email: Hoạt động
                                                24/7
                                            </h5>
                                        </div>
                                    </div>
                                    <div className="container border border-2">
                                        <div className="d-flex">
                                            <div>
                                                <br />
                                                <img
                                                    className=" w-10 h-10"
                                                    src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/1/188abdc7fc85150e679c792210a76f17.svg"
                                                    alt=""
                                                />
                                            </div>
                                            <div>
                                                <br />
                                                <h3 className="pt-1">
                                                    Gọi cho bộ phận Dịch Vụ
                                                    Khách Hàng của chúng tôi
                                                </h3>
                                            </div>
                                        </div>
                                          <br />
                                        <button
                                            type="button"
                                            className="btn btn-dark"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                        >
                                            Xem số điện thoại bộ phận Dịch Vụ
                                            Khách Hàng của chúng tôi
                                        </button>
                                        <div className="modal" id="myModal">
                                            <div className="modal-dialog">
                                                <div className="modal-content">
                                                    <div className="modal-header">
                                                        <h4 className="modal-title">
                                                            Số điện thoại
                                                        </h4>
                                                        <button
                                                            type="button"
                                                            className="btn-close"
                                                            data-bs-dismiss="modal"
                                                        ></button>
                                                    </div>

                                                    <div className="modal-body d-flex">
                                                        <img
                                                            width={30}
                                                            height={30}
                                                            src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/23/1495523970733-0dbcc84691ed46d294166970267555bb.png"
                                                            alt=""
                                                        />
                                                        <p className="font-bold pt-3">
                                                            0999999999(Nhân Viên
                                                            Vũ Vũ Trụ)
                                                        </p>
                                                    </div>

                                                    <div className="modal-footer">
                                                        <button
                                                            type="button"
                                                            className="btn btn-danger"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="d-flex border border-2">
                                        <div>
                                            <br />
                                            <img
                                                width={30}
                                                src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/4/41be2c783a998efde2181e7c2a1ccad5.svg"
                                                alt=""
                                            />
                                        </div>

                                        <div>
                                            <br />
                                            <h3>
                                                Gửi thư điện tử cho bộ phận Dịch
                                                Vụ Khách Hàng của chúng tôi
                                            </h3>
                                            <p>(DEAH@gmail.com.vn)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div className="container border border-2">
                          <div className="contact-policy ">
                            <div className="row">
                                <div className="col border border-1">
                                    <h3>Chính sách</h3>
                                    <ul>
                                        <li>
                                            Thời gian phản hồi trong 24 giờ làm
                                            việc
                                        </li>
                                        <li>
                                            Các kênh liên hệ: email, điện thoại,
                                            mạng xã hội
                                        </li>
                                        <li>
                                            Xử lý phản hồi và khiếu nại một cách
                                            nghiêm túc
                                        </li>
                                    </ul>
                                </div>
                                <div className="col border border-1">
                                    <h3>Bảo hiểm</h3>
                                    <ul>
                                        <li>
                                            Bảo hiểm trách nhiệm nghề nghiệp
                                        </li>
                                        <li>Bảo hiểm bồi thường khách hàng</li>
                                        <li>Bảo hiểm tai nạn lao động</li>
                                    </ul>
                                </div>
                                <div className="col border border-1">
                                    <h3>Dịch vụ khác</h3>
                                    <ul>
                                        <li>Tư vấn pháp lý</li>
                                        <li>Hỗ trợ kỹ thuật</li>
                                        <li>Chăm sóc khách hàng 24/7</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          </div>
                    </section>
                    {/*/ End-of Contact*/}
                    {/* Map */}

                    {/* / Map */}
                </main>
                {/* Footer S t a r t */}
                <Footer />
                <div className="progressParent" id="back-top">
                    <svg
                        className="backCircle svg-inner"
                        width="100%"
                        height="100%"
                        viewBox="-1 -1 102 102"
                    >
                        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                    </svg>
                </div>
                <div className="search-overlay" />
            </div>
        </div>
    );
};

export default Contact;
