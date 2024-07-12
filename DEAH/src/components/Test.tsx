import { useEffect, useState } from "react";
import Footer from "../components/Footer";
import Header from "../components/Header";
import { useForm } from "react-hook-form";
import { useNavigate } from "react-router-dom";

type PasswordInput = {
  old_password: string;
  new_password: string;
  confirm_password: string;
};

const Password = () => {
  const { register, handleSubmit, reset, formState: { errors } } = useForm<PasswordInput>();
  const [message, setMessage] = useState('');
  const navigate = useNavigate();

  useEffect(() => {
    const userData = sessionStorage.getItem('user');
    if (!userData) {
      navigate('/login');
    }
  }, [navigate]);

  const onSubmit = async (data: PasswordInput) => {
    const { old_password, new_password, confirm_password } = data;

    if (new_password !== confirm_password) {
      setMessage('Mật khẩu mới và xác nhận mật khẩu không khớp.');
      return;
    }

    const userData = JSON.parse(sessionStorage.getItem('user') || '{}');

    try {
      const response = await fetch('http://127.0.0.1:8000/api/client/user/change-pass', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${localStorage.getItem('token')}`
        },
        body: JSON.stringify({
          id: userData.id,
          token: userData.token,
          old_password: old_password,
          new_password: new_password
        })
      });

      const responseData = await response.json();
      console.log(responseData);

      if (response.ok) {
        setMessage(responseData.message || 'Đổi mật khẩu thành công.');
        reset();
        // navigate('/profile');
      } else {
        setMessage(responseData.message || 'Đổi mật khẩu thất bại.');
      }
    } catch (err) {
      setMessage('Có lỗi xảy ra. Vui lòng thử lại.');
    }
  };

  return (
    <div>
      <Header />
      <main>
        {/* Your form */}
        <form onSubmit={handleSubmit(onSubmit)}>
          {message && <p style={{ color: message.includes('thành công') ? 'green' : 'red' }}>{message}</p>}
          <div className="position-relative contact-form mb-24">
            <label className="contact-label">Mật khẩu cũ </label>
            <input type="password" className="form-control contact-input password-input" placeholder="Nhập mật khẩu cũ" {...register('old_password', { required: 'Vui lòng nhập mật khẩu cũ.' })} />
            {errors.old_password && <span style={{ color: "red" }}>{errors.old_password.message}</span>}
          </div>
          <div className="position-relative contact-form mb-24">
            <label className="contact-label"> Mật khẩu mới</label>
            <input type="password" className="form-control contact-input password-input" placeholder="Nhập mật khẩu mới" {...register('new_password', { required: 'Vui lòng nhập mật khẩu mới.' })} />
            {errors.new_password && <span style={{ color: "red" }}>{errors.new_password.message}</span>}
          </div>
          <div className="position-relative contact-form mb-24">
            <label className="contact-label">Xác nhận mật khẩu</label>
            <input type="password" className="form-control contact-input password-input" placeholder="Xác nhận mật khẩu mới" {...register('confirm_password', { required: 'Vui lòng xác nhận mật khẩu mới.' })} />
            {errors.confirm_password && <span style={{ color: "red" }}>{errors.confirm_password.message}</span>}
          </div>
          <button className="btn-primary-fill justify-content-center w-100 d-flex justify-content-center gap-6" type='submit'>Xác nhận</button>
        </form>
        {/* Your other UI components */}
      </main>
      <Footer />
    </div>
  );
};

export default Password;
