import React, { useState } from 'react';
import { DateRangePicker } from 'react-date-range';
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import '../App.css';
import { format } from 'date-fns';

const DateStar = () => {
  const [openDate, setOpenDate] = useState(false);
  const [date, setDate] = useState({
    startDate: new Date(),
    endDate: new Date(),
    key: 'selection',
  });

  const handleChange = (ranges: any) => {
    const { startDate, endDate } = ranges.selection;
    if (endDate >= startDate) {
      setDate({
        ...date,
        startDate,
        endDate,
      });
    } else {
      setDate({
        ...date,
        startDate,
        endDate: startDate,
      });
    }
  };

  const handleClick = () => {
    setOpenDate((prev) => !prev);
  };

  return (
    <div className=''>
      <span className='select2-title' onClick={handleClick}>
        {format(date.startDate, 'MMM dd, yyyy')} - {format(date.endDate, 'MMM dd, yyyy')}
      </span>
      {openDate && (
        <DateRangePicker
          className='dateRanger'
          ranges={[date]}
          onChange={handleChange}
          minDate={new Date()}
        />
      )}
    </div>
  );
};

export default DateStar;
