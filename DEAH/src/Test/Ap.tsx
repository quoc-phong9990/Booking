import React, { useState } from 'react';
import '../App1.css'; // Import file CSS tùy chỉnh

const Ap = () => {
  const [rating, setRating] = useState(0);

  const handleRating = (rate:any) => {
    setRating(rate);
  };

  return (
    <div className="rating-section d-flex">
      {[1, 2, 3, 4, 5].map((star) => (
        <div className="rating-checkbox" key={star}>
          <input 
            type="radio" 
            id={`star${star}`} 
            name="rate" 
            value={star} 
            checked={rating === star}
            onChange={() => handleRating(star)} 
          />
          <label htmlFor={`star${star}`}>
            <svg xmlns="http://www.w3.org/2000/svg" width={14} height={13} viewBox="0 0 14 13" fill="none">
              <path
                d="M6.09749 0.891366C6.45972 0.132244 7.54028 0.132244 7.90251 0.891366L9.07038 3.33882C9.21616 3.64433 9.5066 3.85534 9.84221 3.89958L12.5308 4.25399C13.3647 4.36391 13.6986 5.39158 13.0885 5.97067L11.1218 7.83768C10.8763 8.07073 10.7653 8.41217 10.827 8.74502L11.3207 11.4115C11.4739 12.2386 10.5997 12.8737 9.86041 12.4725L7.47702 11.1789C7.1795 11.0174 6.8205 11.0174 6.52298 11.1789L4.13959 12.4725C3.40033 12.8737 2.52614 12.2386 2.67929 11.4115L3.17304 8.74502C3.23467 8.41217 3.12373 8.07073 2.87823 7.83768L0.911452 5.97067C0.301421 5.39158 0.635332 4.36391 1.46924 4.25399L4.15779 3.89958C4.4934 3.85534 4.78384 3.64433 4.92962 3.33882L6.09749 0.891366Z"
                fill={rating >= star ? "#FFB400" : "#ccc"}
              />
            </svg>
          </label>
        </div>
      ))}
    </div>
  );
};

export default Ap;
