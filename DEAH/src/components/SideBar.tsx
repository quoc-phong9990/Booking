import React, { useEffect, useState } from 'react'
import { useForm } from 'react-hook-form';
import { Link, useNavigate } from 'react-router-dom';
import '../App1.css'

const SideBar = ({userData,avatarUrl}) => {
  

  return (
    <div>
      <div className="side-bar">
        <div className="user-info">
          <img className="img-profile img-circle img-responsive center-block" src={avatarUrl} alt="Profile Avatar" />
          <ul className="meta list list-unstyled">
            <li className="name">{userData.name}</li>
            <li className="email"><a href="#">{userData.email}</a></li>
            
          </ul>
        </div>
        <nav className="side-menu ">
          <ul className="nav">
            <li><Link to={'/profile'}><span className="fa fa-user" />Thông tin</Link></li>
            <li><Link to={'/listbill'}><span className="fa fa-credit-card" /> Đon hàng</Link></li>
            <div className="mt-40">
              <button type="submit" className="send-btn"><a className='text-black' href="/pass">Đổi mật khẩu </a></button>
            </div>
          </ul>
        </nav>
      </div>
    </div>
  )
}

export default SideBar
