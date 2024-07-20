
import { toast, ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import { Component, useEffect, useState } from 'react';
import '../App1.css'
import { Link, useNavigate } from 'react-router-dom';

import { useForm } from 'react-hook-form';
import Header from '../components/Header';
import Footer from '../components/Footer';
import axios from 'axios';
import SideBar from '../components/SideBar';

const ProfileUser = () => {
  const [file, setFile] = useState<File | null>(null);
  const [avatarUrl, setAvatarUrl] = useState<string>(''); // State để lưu URL của ảnh
  const [status, setStatus] = useState<boolean>(false); // State để lưu URL của ảnh
  const navigate = useNavigate();
  const { register, handleSubmit, reset } = useForm();

  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [userData, setUserData] = useState({
    id: '',
    avatar: '',
    name: '',
    email: '',
    phone: '',
    address: '',
    token: '',
    file: '',
    date_of_birth: ''
  });

  useEffect(() => {
    const Data = sessionStorage.getItem('user');
    if (Data) {
      const user = JSON.parse(Data);
      setUserData(user);
      setAvatarUrl(user.avatar ? 'http://127.0.0.1:8000/' + user.avatar : ''); // Cập nhật URL ảnh từ userData
      reset(user);
    }

  }, [reset]);

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const files = e.target.files;
    if (files && files.length > 0) {
      setFile(files[0]);
      const imageUrl = URL.createObjectURL(files[0]); // Tạo URL cho ảnh mới
      setAvatarUrl(imageUrl); // Cập nhật URL ảnh trong form
    }
  };


   const handleUpdate = async (data: any) => {
    data.file = file;
    console.log(data);
    
    try {
      const response = await fetch(`http://127.0.0.1:8000/api/client/user/update`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      if (!response.ok) {
        const errorData = await response.json();
        console.error('Update failed:', errorData);
        throw new Error(`Failed to update user data: ${response.statusText}`);
      }
      console.log(response);
      setIsLoggedIn(true);
      toast.success('Lưu thay đổi thành công!');
    } catch (error) {
      alert('Đã xảy ra lỗi khi cập nhật thông tin người dùng: ');
    }
  };

  return (
    <div>
      <Header status={status} />
      <div className="container">
        <div className="view-account">
          <section className="module">
            <div className="module-inner">

              <SideBar userData={userData} avatarUrl={avatarUrl}/>

              <div className="content-panel">
                <div className="billing">
                  <form id="billing" className="form-horizontal" onSubmit={handleSubmit(handleUpdate)} role="form">
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Ảnh của bạn</label>
                      <div className="col-sm-9">
                        <input type="file" className="form-control" {...register("avatar")} onChange={handleFileChange} />
                        <p className="help-block">Hãy nhập hoặc sửa ảnh của bạn</p>
                      </div>
                    </div>
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Họ Và Tên</label>
                      <div className="col-sm-9">
                        <input type="text" className="form-control" {...register("name")} defaultValue={userData.name} />
                        <p className="help-block">Hãy nhập hoặc sửa tên của bạn</p>
                      </div>
                    </div>
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Email</label>
                      <div className="col-sm-9">
                        <input type="email" className="form-control" {...register("email")} defaultValue={userData.email} />
                        <p className="help-block">Xin mời nhập hoặc chỉnh sửa tại đây</p>
                      </div>
                    </div>
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Địa chỉ</label>
                      <div className="col-sm-9">
                        <input type="text" className="form-control" {...register("address")} defaultValue={userData.address} />
                        <p className="help-block">Xin mời nhập hoặc chỉnh sửa tại đây</p>
                      </div>
                    </div>
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Số điện thoại</label>
                      <div className="col-sm-9">
                        <input type="text" className="form-control" {...register("phone")} defaultValue={userData.phone} />
                        <p className="help-block">Xin mời nhập hoặc chỉnh sửa tại đây</p>
                      </div>
                    </div>
                    <div className="form-group">
                      <label className="col-sm-3 control-label">Ngày sinh</label>
                      <div className="col-sm-9">
                        <input type="date" className="form-control" {...register("date_of_birth")} defaultValue={userData.date_of_birth} />
                        <p className="help-block">Xin mời nhập hoặc chỉnh sửa tại đây</p>
                      </div>
                    </div>
                    <hr />
                    <div className="action-wrapper text-center">
                      <div className="action-btn">
                        <div className="mt-40">
                          <button type="submit" className="send-btn">Lưu thay đổi</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <Footer />
      <ToastContainer />
    </div>
  );
};

export default ProfileUser;
