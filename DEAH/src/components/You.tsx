import React, { useState } from 'react';

const UserPicker = () => {
    // Khai báo state để quản lý giá trị của số lượng người lớn và trẻ em
    const [adultQuantity, setAdultQuantity] = useState(0);
    const [childQuantity, setChildQuantity] = useState(0);

    // Hàm để giảm số lượng người lớn
    const handleDecreaseAdult = () => {
        if (adultQuantity > 0) {
            setAdultQuantity(adultQuantity - 1);
            if (adultQuantity - 1 === 0) {
                setChildQuantity(0);
            }
        }
    };

    // Hàm để tăng số lượng người lớn, với điều kiện kiểm tra để không vượt quá 10
    const handleIncreaseAdult = () => {
        if (adultQuantity < 10) {
            setAdultQuantity(adultQuantity + 1);
        }
    };

    // Hàm để giảm số lượng trẻ em
    const handleDecreaseChild = () => {
        if (childQuantity > 0) {
            setChildQuantity(childQuantity - 1);
        }
    };

    // Hàm để tăng số lượng trẻ em, với điều kiện kiểm tra để không vượt quá 10 và phải có ít nhất 1 người lớn
    const handleIncreaseChild = () => {
        if (adultQuantity > 0 && childQuantity < 10) {
            setChildQuantity(childQuantity + 1);
        }
    };

    // Hàm để xử lý sự kiện khi người dùng nhập giá trị vào ô input
    const handleChangeAdult = (e: any) => {
        const value = parseInt(e.target.value, 10);
        if (!isNaN(value)) {
            if (value <= 10) {
                setAdultQuantity(value);
                if (value === 0) {
                    setChildQuantity(0);
                }
            } else {
                setAdultQuantity(10);
            }
        }
    };

    const handleChangeChild = (e: any) => {
        const value = parseInt(e.target.value, 10);
        if (!isNaN(value) && adultQuantity > 0) {
            if (value <= 10) {
                setChildQuantity(value);
            } else {
                setChildQuantity(10);
            }
        }
    };

    return (
        <div className="user-category">
            <div className="dropdown-section position-relative user-picker-dropdown">
                <div className="d-flex gap-12 align-items-center">

                    <div className="qty-container">
                        <strong className='mr-2'>Người lớn</strong>
                        <button className="qty-btn-minus mr-1" type="button" onClick={handleDecreaseAdult}>
                            <i className="ri-subtract-fill" />
                        </button>
                        <input
                            type="text"
                            name="qty"
                            value={adultQuantity}
                            className="input-qty input-rounded"
                            onChange={handleChangeAdult}
                        />
                        <button className="qty-btn-plus ml-1" type="button" onClick={handleIncreaseAdult}>
                            <i className="ri-add-fill" />
                        </button>
                    </div>
                </div>
            </div>
            <div className="dropdown-section position-relative user-picker-dropdown">
                <div className="d-flex gap-12 align-items-center">

                    <div className="qty-container">
                        <strong className='mr-4'>Trẻ nhỏ </strong>
                        <button className="qty-btn-minus mr-1" type="button" onClick={handleDecreaseChild} disabled={adultQuantity === 0}>
                            <i className="ri-subtract-fill" />
                        </button>
                        <input
                            type="text"
                            name="qty"
                            value={childQuantity}
                            className="input-qty input-rounded"
                            onChange={handleChangeChild}
                            disabled={adultQuantity === 0}
                        />
                        <button className="qty-btn-plus ml-1" type="button" onClick={handleIncreaseChild} disabled={adultQuantity === 0}>
                            <i className="ri-add-fill" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default UserPicker;
