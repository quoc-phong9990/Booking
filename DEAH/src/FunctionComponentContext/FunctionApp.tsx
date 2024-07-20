import React, { useState } from 'react';
import { DateRangePicker } from 'react-date-range';
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import '../App.css';
import { format } from 'date-fns';
import addDays from 'date-fns/addDays';

const DateStar = ({tour_long,setStartDate,setEndDate}) => {
  const [openDate, setOpenDate] = useState(false);
  const [date, setDate] = useState({
    startDate: new Date(),
    endDate: addDays(new Date(), tour_long),
    key: 'selection',
  });

  const handleChange = (ranges: any) => {
    const startDate = ranges.selection.startDate;
    const endDate = addDays(startDate, tour_long);
    if (endDate >= startDate) {
      setDate({
        ...date,
        startDate,
        endDate,
      });
      const formattedstartDate = format(startDate, 'yyyy-MM-dd');
      const formattedendDate = format(endDate, 'yyyy-MM-dd');
      setStartDate(formattedstartDate);
      setEndDate(formattedendDate);
    } else {
      setDate({
        ...date,
        startDate,
        endDate: startDate,
      });
      const formattedstartDate = format(startDate, 'yyyy-MM-dd');
      const formattedendDate = format(endDate, 'yyyy-MM-dd');
      setStartDate(formattedstartDate);
      setEndDate(formattedendDate);
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
