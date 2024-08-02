import React, { useState } from 'react';
import Modal from 'react-modal';


const Ap = () => {
  const [modalIsOpen, setModalIsOpen] = useState(false);

  const openModal = () => {
    setModalIsOpen(true);
  };

  const closeModal = () => {
    setModalIsOpen(false);
  };

  return (
    <div>
      <a href="#" onClick={openModal}>Xem lịch trình đầy đủ</a>
      <Modal
        isOpen={modalIsOpen}
        onRequestClose={closeModal}
        contentLabel="Lịch trình tour"
        ariaHideApp={false}
      >
        <h2>Lịch trình tour</h2>
        <ul>
          <li>08:30-17:00 Đón khách</li>
          <li>Tham quan đảo Gầm Ghì, lặn ống thở và tắm biển</li>
          <li>Tham quan hòn Bườm hoặc hòn Móng Tay, lặn ống thở và tắm biển</li>
          <li>Tham quan hòn Mây Rút Trong và dùng bữa trưa</li>
          <li>Trải nghiệm dịch vụ đi dưới biển Seawalker (chi phí tự túc)</li>
          <li>Trả khách</li>
          <li>Kết thúc tour</li>
        </ul>
        <button onClick={closeModal}>Đóng</button>
      </Modal>
    </div>
  );
};

export default Ap;
