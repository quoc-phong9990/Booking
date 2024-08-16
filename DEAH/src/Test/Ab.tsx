import axios from 'axios';
import { useEffect, useState } from 'react';
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file

import CurrencyFormatter from '../FunctionComponentContext/CurrencyFormatter';
import { useLocation } from 'react-router-dom';
import Header from '../components/Header';
import Footer from '../components/Footer';

interface Tour {
  id: number;
  name: string;
  promotion: number;
  rates?: {
    rate: number;
  };
}

const Ab = () => {
  const location = useLocation();
  const { province, type_id } = location.state || {};
  const [selectedProvince, setSelectedProvince] = useState<string | null>(province || null);
  const [selectedType, setSelectedType] = useState<number | null>(type_id || null);
  const [tours, setTours] = useState<Tour[]>([]);
  const [sortOrder, setSortOrder] = useState<string>('');
  const [selectRate, setSelectRate] = useState<number | null>(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/client/get-tours-list', {
          type_id: selectedType,
          province: selectedProvince,
          hightprice: sortOrder,
        });
        
        const data: Tour[] = response.data.data.tours;
        console.log('Raw data:', data);

        // Log tất cả các giá trị rate
        const rates = data.map(tour => tour.rates?.rate);
        console.log('All rates:', rates);

        // Lọc dữ liệu theo rate đã chọn
        const filteredTours = selectRate
          ? data.filter(tour => tour.rates && tour.rates.rate === selectRate)
          : data;

        console.log('Filtered data:', filteredTours);

        // Sắp xếp dữ liệu theo giá
        let sortedTours = [...filteredTours]; // Đảm bảo không thay đổi dữ liệu gốc

        if (sortOrder === 'low_price') {
          sortedTours.sort((a, b) => a.promotion - b.promotion);
        } else if (sortOrder === 'high_price') {
          sortedTours.sort((a, b) => b.promotion - a.promotion);
        }

        setTours(sortedTours);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, [selectedProvince, selectedType, sortOrder, selectRate]);

  return (
    <div>
      <Header status={undefined} />
      <div>
        {/* Giao diện chọn rating */}
        {[1, 2, 3, 4, 5].map(rate => (
          <button key={rate} onClick={() => setSelectRate(rate)}>
            Rate {rate}
          </button>
        ))}
        <button onClick={() => setSelectRate(null)}>All Rates</button>
      </div>
      <div>
        {/* Giao diện chọn sắp xếp */}
        <button onClick={() => setSortOrder('low_price')}>Sort by Low Price</button>
       
      </div>
      <div>
        {tours.length > 0 ? (
          tours.map(tour => (
            <div key={tour.id}>
              <h3>{tour.name}</h3>
              <p>Rate: {tour.rates?.rate ?? 'No rating'}</p>
              <p>Price: {CurrencyFormatter(tour.promotion)}</p>
              {/* Thay thế CurrencyFormatter bằng cách định dạng giá của bạn */}
            </div>
          ))
        ) : (
          <p>No tours found.</p>
        )}
      </div>
      <Footer />
    </div>
  );
};

export default Ab;
