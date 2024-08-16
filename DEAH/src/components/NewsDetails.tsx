
import axios from 'axios';
import { useParams } from 'react-router-dom';
import Header from './Header';
import Footer from './Footer';
import { useEffect, useState } from 'react';
import Register from '../AuthForm/Register';
const NewsDetails = () => {

  const { slug } = useParams();
  // console.log(id);
  const [postFeature, setPostFeature] = useState<any>([]);
  const [post, setPostDetail] = useState<any>([]);
 

  useEffect(() => {
    const fetchData = async () => {
      try {
        let postsFeatureApi = 'http://127.0.0.1:8000/api/client/get-posts-list';
        let postApi = `http://127.0.0.1:8000/api/client/get-post-detail/${slug}`;
        const [postFeature, post] = await Promise.all([
          axios.get(postsFeatureApi),
          axios.get(postApi)
        ]);
        setPostFeature(postFeature.data.data.posts_feature);
        setPostDetail(post.data.data);
      } catch (error) {
        if (error) return <div>loi...</div>
      }
    };
    fetchData();
  
  }, []);


  return (
    <div>
      <div>
        <Header status={undefined} />
        <main>
          {/* Breadcrumbs S t a r t */}
          <section className="breadcrumbs-area breadcrumb-bg">
            <div className="container">
              <h1 className="title wow fadeInUp" data-wow-delay="0.0s"> Chi tiết tin tức</h1>
              <div className="breadcrumb-text">
                <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                  <ul className="breadcrumb listing">
                    <li className="breadcrumb-item single-list"><a href="index" className="single">Trang chủ</a></li>
                    <li className="breadcrumb-item single-list" aria-current="page"><a href="javascript:void(0)" className="single active">Tin tức</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </section>
          {/*/ End-of Breadcrumbs*/}
          {/* Điểm đến area S t a r t */}
          <section className="destination-details-section section-padding2">
            <div className="container">
              <div className="row g-4">


                <div className="col-xl-8 col-lg-7" >
                  <div className="news-details-banner imgEffect">
                    <img className='image' src={'http://127.0.0.1:8000/' + post.thumbnail} alt="travello" />
                  </div>
                  <div className="news-details-content">

                    <div className='text-black font-bold' dangerouslySetInnerHTML={{ __html: post.title }} />
                    <div className='text-black font-bold' dangerouslySetInnerHTML={{ __html: post.body }} />

                  </div>

                  <div className="news-details-quote">
                    <h4 className="title">Du lịch làm cho một khiêm tốn. Bạn thấy những gì một nơi nhỏ bé chiếm giữ trong
                      thế giới. </h4>
                    <p className="pera">Gustav Flaubert</p>
                  </div>

                  <div className="tag-social-section d-flex justify-content-between gap-16 flex-wrap">

                    <div className="social-section">
                      <h4 className="title">Chia sẻ :</h4>
                      <div className="social-list">
                        <div className="tags">
                          <a href="javascript:void(0)" className="social-btn"><i className="ri-facebook-fill" /></a>
                        </div>
                        <div className="socials">
                          <a href="javascript:void(0)" className="social-btn"><i className="ri-twitter-fill" /></a>
                        </div>
                        <div className="socials">
                          <a href="javascript:void(0)" className="social-btn"><i className="ri-linkedin-fill" /></a>
                        </div>
                        <div className="socials">
                          <a href="javascript:void(0)" className="social-btn"><i className="ri-instagram-line" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="comment-section">

                    <h4 className="comment-count mb-3">( {post.comments?.length > 0 ? (post.comments).length : 0} ) Comments</h4>
                    {
                      post.comments?.map((comment: any) => {

                        return (
                          <div className="main-profile-two">
                            <div className="user-img-sm">
                              <img src={'http://127.0.0.1:8000/' + comment.user[0].avatar} alt="travello" />
                            </div>
                            <div className="user-info">
                              <h4 className="name-sm">{comment.user.name}</h4>
                              <p className="pera">{comment.comments}</p>
                              <div className="reply-btn">
                                <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width={24} height={24} viewBox="0 0 24 24" fill="none">
                                  <g clipPath="url(#clip0_359_781)">
                                    <path d="M22.9994 23.9992C22.7342 23.9992 22.4798 23.8939 22.2923 23.7063C22.1048 23.5188 21.9994 23.2645 21.9994 22.9992C21.9978 21.4084 21.3652 19.8832 20.2403 18.7584C19.1154 17.6335 17.5902 17.0008 15.9994 16.9993H10.1694V18.5852C10.1693 18.9808 10.052 19.3673 9.83221 19.6962C9.61244 20.025 9.30012 20.2813 8.93472 20.4326C8.56932 20.5839 8.16725 20.6235 7.77934 20.5464C7.39144 20.4693 7.03511 20.2789 6.75541 19.9992L0.876406 14.1203C0.313993 13.5577 -0.00195313 12.7948 -0.00195312 11.9993C-0.00195313 11.2038 0.313993 10.4408 0.876406 9.87826L6.75541 3.99927C7.03511 3.71965 7.39144 3.52924 7.77934 3.4521C8.16725 3.37497 8.56932 3.41457 8.93472 3.56591C9.30012 3.71725 9.61244 3.97353 9.83221 4.30235C10.052 4.63117 10.1693 5.01777 10.1694 5.41327V6.99927H14.9994C17.3855 7.00191 19.6732 7.95097 21.3604 9.63822C23.0477 11.3255 23.9968 13.6131 23.9994 15.9993V22.9992C23.9994 23.2645 23.8941 23.5188 23.7065 23.7063C23.519 23.8939 23.2646 23.9992 22.9994 23.9992ZM8.16941 5.41327L2.29041 11.2923C2.10294 11.4798 1.99762 11.7341 1.99762 11.9993C1.99762 12.2644 2.10294 12.5187 2.29041 12.7063L8.16941 18.5852V15.9993C8.16941 15.734 8.27476 15.4797 8.4623 15.2921C8.64984 15.1046 8.90419 14.9993 9.16941 14.9993H15.9994C17.135 14.9989 18.2576 15.2408 19.2923 15.7088C20.3269 16.1768 21.2498 16.8602 21.9994 17.7133V15.9993C21.9973 14.1434 21.2591 12.3641 19.9468 11.0519C18.6345 9.73956 16.8553 9.00138 14.9994 8.99926H9.16941C8.90419 8.99926 8.64984 8.89391 8.4623 8.70637C8.27476 8.51883 8.16941 8.26448 8.16941 7.99926V5.41327Z" fill="#4B5051">
                                    </path></g>
                                  <defs>
                                    <clipPath id="clip0_359_781">
                                      <rect width={24} height={24} fill="white">
                                      </rect></clipPath>
                                  </defs>
                                </svg></a>
                              </div>
                            </div>
                          </div>
                        )
                      })
                    }


                    <div className="contact-card mt-40">
                      <h4 className="contact-heading">Viết bình luận của bạn</h4>
                      <form method="post" className="contact-form">
                        <div className="row g-4">
                          <div className="col-sm-6">
                            <input className="custom-form" type="text" placeholder="Enter your name"  />
                          </div>
                          <div className="col-sm-6">
                            <input className="custom-form" type="text" placeholder="Enter your email" />
                          </div>
                          <div className="col-sm-6">
                            <input className="custom-form" type="text" placeholder="Your Phone" />
                          </div>
                          <div className="col-sm-6">
                            <input className="custom-form" type="text" placeholder="Select subject" />
                          </div>
                          <div className="col-sm-12">
                            <textarea className="custom-form-textarea" id="exampleFormControlTextarea1" rows={3} placeholder="Enter your message..." defaultValue={""} />
                          </div>
                        </div>
                        <div className="mt-40">
                          <button type="submit" className="send-btn"> Đăng bình luận </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div className="col-xl-4 col-lg-5">
                  <div className="row g-4 position-sticky top-0">
                    <div className="col-lg-12">
                      <div className="search-filter-section">

                        <div className="heading">
                          <h4 className="title">Tin tức gần đây</h4>
                        </div>
                        <ul className="recent-news-list">
                          {postFeature.map((item: any, index: number) => {

                            return (
                              <li className="list  " key={index}>
                                <a href={`/news-details/${item.slug}`} className="destination-banner-two h-calc wow fadeInUp" data-wow-delay="0.s">
                                  <img className='ImageNewDetail' src={'http://127.0.0.1:8000/' + (item.thumbnail ? item.thumbnail : '')} alt="travello" />

                                  <div className="destination-content-two">

                                    <div className="destination-info-two">
                                      <div className="destination-name line-clamp-2">
                                        <p className="pera">{item.title}</p>
                                      </div>
                                      <div className="button-section">
                                        <div className="arrow"><i className="ri-arrow-right-line" /></div>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </li>
                            )
                          })}


                        </ul>
                      </div>
                    </div>
                    <div className="col-lg-12">
                      <div className="destination-offer-three">
                        <div className="destination-content-offer">
                          <span className="highlights">20% off</span>
                          <h4 className="title">The Best Du lịch Adventure</h4>
                          <a href="/tour-list" className="btn-secondary-sm radius-30">Đặt trước Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>
          {/*/ End-of Điểm đến */}
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

export default NewsDetails
