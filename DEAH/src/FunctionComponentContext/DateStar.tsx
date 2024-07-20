import React, { useState } from 'react';
import { DateRangePicker } from 'react-date-range';
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import '../App.css';
import { format } from 'date-fns';

const DateStar = () => {
  const [openDate, setOpenDate] = useState(false);
  const [startDate, setStartDate] = useState(new Date());

  const handleChange = (ranges: any) => {
    setStartDate(ranges.selection.startDate);
  };

  const handleClick = () => {
    setOpenDate((prev) => !prev);
  };

  return (
    <div className=''>
      <span className='select2-title' onClick={handleClick}>
        {format(startDate, 'MMM dd, yyyy')}
      </span>
      {openDate && (
        <DateRangePicker
          className='dateRanger'
          ranges={[{ startDate: startDate, endDate: startDate, key: 'selection' }]}
          onChange={handleChange}
          minDate={new Date()}
        //   showSelectionPreview={false}
          moveRangeOnFirstSelection={false}
          showDateDisplay={false}
          staticRanges={[]}
          inputRanges={[]}
        />
      )}
    </div>
  );
};

export default DateStar;
