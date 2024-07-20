import React, { useEffect, useState } from 'react'
import '../App1.css'
import Header from './Header'
import Footer from './Footer'
import axios from 'axios'
import { format } from 'date-fns';
import { json } from 'react-router-dom'
import StatusPayment from '../FunctionComponentContext/StatusPayment'
import SideBar from './SideBar'
import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter'
import StatusTour from '../FunctionComponentContext/StatusTour'
import Popup from '../FunctionComponentContext/Popup'
import { useForm } from 'react-hook-form'


const ListBill = () => {
    const formattedDate = (currentDate) => format(currentDate, 'yyyy-MM-dd');
    const user = JSON.parse(sessionStorage.getItem("user"));
    const [listbill, setListBill] = useState<any>([]);
    const [avatarUrl, setAvatarUrl] = useState<string>('');
    const { register, handleSubmit, reset } = useForm();
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
        const fetchData = async () => {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/client/user/get-bookings', {
                    id: user.id
                });
                console.log(response.data.data);

                setListBill(response.data.data);
                console.log(listbill);

            } catch (error) {
                if (error) return <div>loi...</div>
            }
        };
        const Data = sessionStorage.getItem('user');
        if (Data) {
            const user = JSON.parse(Data);
            setUserData(user);
            setAvatarUrl(user.avatar ? 'http://127.0.0.1:8000/' + user.avatar : ''); // Cập nhật URL ảnh từ userData
            reset(user);
        }
        fetchData();
    }, [reset]);



    return (
        <div>
            <Header />
            <div className="container">
                <div className="view-account">
                    <section className="module">
                        <div className="module-inner">
                            <SideBar userData={userData} avatarUrl={avatarUrl}/>
                            <main className="content-panel table " >
                                <section className="table__header">
                                    <h1>Customer's Bill</h1>
                                    <div className="input-group">
                                        <input type="search" placeholder="Search Data..." />
                                    </div>
                                </section>
                                <section className="table__body ">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    {" "}
                                                    Id <span className=""></span>
                                                </th>
                                                <th>
                                                    {" "}
                                                    Mã Đơn Hàng <span className=""></span>
                                                </th>

                                                <th>
                                                    {" "}
                                                    Giá <span className=""></span>
                                                </th>
                                                <th>
                                                    {" "}
                                                    Ngày Đặt <span className=""></span>
                                                </th>
                                                <th>
                                                    {" "}
                                                    Trạng thái Thanh Toán <span className=""></span>
                                                </th>
                                                <th>
                                                    {" "}
                                                    Trạng thái Đơn Hàng <span className=""></span>
                                                </th>
                                                <th>
                                                    {" "}
                                                    Hành Động <span className=""></span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {listbill.map((item: any, index: number) => {
                                                return (
                                                    <tr key={item.id}>
                                                        <td> {index + 1} </td>
                                                        <td>{item.booking_code}</td>
                                                        <td><CurrencyFormatter amount={item.tour_price} /> vnđ</td>
                                                        <td >{formattedDate(new Date(item.created_at))}</td>
                                                        <td>
                                                            <StatusPayment status={item.status_payment} />
                                                        </td>
                                                        <td>
                                                            <StatusTour status={item.status_tour} />
                                                        </td>
                                                        <td className='g-2 d-flex'>
                                                            <Popup item={item} />
                                                            {item.status_tour == 0 ? <i role='button' className="ri-delete-bin-7-fill text-danger fs-4" /> : ''}
                                                        </td>
                                                    </tr>
                                                )
                                            })}

                                        </tbody>
                                    </table>
                                </section>
                            </main>
                        </div>
                    </section>
                </div>
            </div>
            <Footer />
        </div>
    )

}

export default ListBill
