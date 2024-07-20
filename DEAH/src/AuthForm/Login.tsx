
import Header from '../components/Header'
import Footer from '../components/Footer'
import { useNavigate } from 'react-router-dom'
import { useForm } from 'react-hook-form'

type Input = {
  email: string,
  password: number
}
const Login = () => {
  const navigate = useNavigate()
  const { register, handleSubmit } = useForm<Input>()
  function onSubmit(data: Input) {
    fetch('http://127.0.0.1:8000/api/client/user/login', {
      method: "POST",
      headers: {
        "Content-Type": 'Application/json'
      },
      body: JSON.stringify(data)
    })
      .then(async (resdata) => {
        if (resdata.ok) {
          return resdata.json()
        } else {
          const message = await resdata.json();
          return new Promise((resolve, reject) => {
            reject(message)
          })
        }
      })
      .then(resData => {
        console.log(resData);

        if (resData.data.token) {
          localStorage.setItem('token', resData.data.token);

          if (resData.data) {
            sessionStorage.setItem('user', JSON.stringify({
              avatar: resData.data.avatar,
              id: resData.data.id, 
              token: resData.data.token, 
              name: resData.data.name, 
              email: resData.data.email, 
              phone: resData.data.phone, 
              address: resData.data.address, 
              password: resData.data.password || '' }));
          }
          alert('Đăng Nhập thành công')
          navigate('/index-two');
        }
      })
      .catch(err => {
        alert("Sai thông tin hãy nhập lại :" + err)
      })
  }
  return (
    <div>
      <div>
        <Header />
        <main>
          {/* Breadcrumbs S t a r t */}
          <section className="breadcrumbs-area breadcrumb-bg">
            <div className="container">
              <h1 className="title wow fadeInUp" data-wow-delay="0.0s">Đăng nhập</h1>
              <div className="breadcrumb-text">
                <nav aria-label="breadcrumb" className="breadcrumb-nav wow fadeInUp" data-wow-delay="0.1s">
                  <ul className="breadcrumb listing">
                    <li className="breadcrumb-item single-list"><a href="index" className="single">Trang chủ</a></li>
                    <li className="breadcrumb-item single-list" aria-current="page">
                      <a href="javascript:void(0)" className="single active">Đăng nhập</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </section>
          {/*/ End-of Breadcrumbs*/}
          {/* Đăng nhập area S t a r t  */}
          <div className="login-area section-padding">
            <div className="container">
              <div className="row justify-content-center">
                <div className="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                  <div className="login-card">
                    {/* Logo */}
                    <div className="logo mb-40">
                      <a href="index" className="mb-30 d-block">
                        <img src="/src/assets/images/logo/logo.png" alt="logo" className="changeLogo" />
                      </a>
                    </div>
                    {/* Form */}
                    <form onSubmit={handleSubmit(onSubmit)} action="#" method="POST">
                      <div className="position-relative contact-form mb-24">
                        <label className="contact-label">Email </label>
                        <input {...register('email')} className="form-control contact-input" type="text" placeholder="Enter Your Email" />
                      </div>
                      <div className="contact-form mb-24">
                        <div className="position-relative ">
                          <div className="d-flex justify-content-between aligin-items-center">
                            <label className="contact-label">Mật khẩu</label>
                            <a href="forgot-pass"><span className="text-primary text-15"> Quên
                              mật khẩu?</span></a>
                          </div>
                          <input {...register('password')} type="password" className="form-control contact-input password-input" id="txtPasswordLogin" placeholder="Enter Password" />
                          <i className="toggle-password ri-eye-line" />
                        </div>
                      </div>
                      <button type='submit' className='btn-primary-fill justify-content-center w-100 d-flex justify-content-center gap-6 '>Đăng nhập</button>

                    </form>
                    <div className="login-footer">
                      <div className="create-account">
                        <p>
                          Bạn có tài khoản không?
                          <a href="register">
                            <span className="text-primary">Đăng ký</span>
                          </a>
                        </p>
                      </div>
                      <a href="javascript:void(0)" className="login-btn d-flex align-items-center justify-content-center gap-10">
                        <img src="/src/assets/images/icon/google-icon.png" alt="img" className="m-0" />
                        <span> Đăng nhập với Google </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {/*/ End-of Đăng nhập */}
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

export default Login
