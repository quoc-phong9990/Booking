import React, { useState } from 'react';

interface UserPickerProps {
    setKids: (value: number) => void;
    setAdults: (value: number) => void;
}

const UserPicker: React.FC<UserPickerProps> = ({ setKids, setAdults }) => {
    // Khai báo state để quản lý giá trị của số lượng người lớn và trẻ em
    const [adultQuantity, setAdultQuantity] = useState(0);
    const [childQuantity, setChildQuantity] = useState(0);
    const [childAge, setChildAge] = useState<number[]>([]); // State để quản lý độ tuổi của trẻ em

    // Hàm để giảm số lượng người lớn
    const handleDecreaseAdult = () => {
        if (adultQuantity > 0) {
            const newAdultQuantity = adultQuantity - 1;
            setAdultQuantity(newAdultQuantity);
            setAdults(newAdultQuantity);

            // Giảm số lượng trẻ em nếu số lượng người lớn giảm xuống còn 0
            if (newAdultQuantity === 0) {
                setChildQuantity(0);
                setChildAge([]);
                setKids(0);
            }
        }
    };

    // Hàm để tăng số lượng người lớn, với điều kiện kiểm tra để không vượt quá 10
    const handleIncreaseAdult = () => {
        if (adultQuantity + childQuantity < 20) {
            const newAdultQuantity = adultQuantity + 1;
            setAdultQuantity(newAdultQuantity);
            setAdults(newAdultQuantity);
        }
    };

    // Hàm để giảm số lượng trẻ em
    const handleDecreaseChild = () => {
        if (childQuantity > 0) {
            const newChildQuantity = childQuantity - 1;
            setChildQuantity(newChildQuantity);
            setChildAge(childAge.slice(0, -1)); // Cập nhật lại state độ tuổi của trẻ em
            setKids(newChildQuantity);
        }
    };

    // Hàm để tăng số lượng trẻ em, với điều kiện kiểm tra để không vượt quá giới hạn
    const handleIncreaseChild = () => {
        if (adultQuantity > 0 && childQuantity < 10 && (adultQuantity * 2 > childQuantity) && (adultQuantity + childQuantity < 20)) {
            const newChildQuantity = childQuantity + 1;
            setChildQuantity(newChildQuantity);
            setChildAge([...childAge, 0]); // Thêm độ tuổi mặc định cho trẻ mới
            setKids(newChildQuantity);
        }
    };

    // Hàm để xử lý sự kiện khi người dùng nhập giá trị vào ô input
    const handleChangeAdult = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = parseInt(e.target.value, 10);
        if (!isNaN(value)) {
            const clampedValue = Math.min(value, 10);
            setAdultQuantity(clampedValue);
            setAdults(clampedValue);

            // Cập nhật lại số lượng trẻ em nếu số người lớn giảm xuống còn 0
            if (clampedValue === 0) {
                setChildQuantity(0);
                setChildAge([]);
                setKids(0);
            }
        }
    };

    const handleChangeChild = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = parseInt(e.target.value, 10);
        if (!isNaN(value) && adultQuantity > 0) {
            const clampedValue = Math.min(value, 10, adultQuantity * 2, 20 - adultQuantity);
            setChildQuantity(clampedValue);
            setChildAge(Array(clampedValue).fill(0)); // Đặt độ tuổi mặc định cho tất cả trẻ em
            setKids(clampedValue);
        }
    };

    // Hàm để xử lý sự kiện khi người dùng nhập giá trị vào ô tuổi của trẻ em
    const handleChildAgeChange = (index: number, age: number) => {
        const newChildAge = [...childAge];
        newChildAge[index] = age;
        setChildAge(newChildAge);
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
                {childQuantity > 0 && (
                    <div className="child-age-inputs">
                        {Array.from({ length: childQuantity }).map((_, index) => (
                            <div key={index} className="child-age-input">
                                <label>Tuổi trẻ em {index + 1}:</label>
                                <input
                                    type="number"
                                    min="0"
                                    value={childAge[index]}
                                    onChange={(e) => handleChildAgeChange(index, parseInt(e.target.value, 10))}
                                />
                            </div>
                        ))}
                    </div>
                )}
            </div>
        </div>
    );
};

export default UserPicker;
