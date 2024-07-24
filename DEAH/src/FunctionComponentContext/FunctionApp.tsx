import React, { useState, useEffect } from 'react';
import { DateRangePicker } from 'react-date-range';
import 'react-date-range/dist/styles.css'; // main style file
import 'react-date-range/dist/theme/default.css'; // theme css file
import '../App.css';
import { format } from 'date-fns';
import addDays from 'date-fns/addDays';

interface DateStarProps {
  tour_long: number;
  setStartDate: (date: string) => void;
  setEndDate: (date: string) => void;
}

const DateStar: React.FC<DateStarProps> = ({ tour_long, setStartDate, setEndDate }) => {
  const [openDate, setOpenDate] = useState(false);
  const [date, setDate] = useState({
    startDate: new Date(),
    endDate: addDays(new Date(), tour_long),
    key: 'selection',
  });

  useEffect(() => {
    // Ensure dates are valid before formatting
    if (date.startDate && date.endDate) {
      const formattedstartDate = format(date.startDate, 'yyyy-MM-dd');
      const formattedendDate = format(date.endDate, 'yyyy-MM-dd');
      setStartDate(formattedstartDate);
      setEndDate(formattedendDate);
    }
  }, [date.startDate, date.endDate, setStartDate, setEndDate]);

  const handleChange = (ranges: any) => {
    const { startDate, endDate } = ranges.selection;
    if (startDate && endDate) {
      const adjustedEndDate = addDays(startDate, tour_long);

      if (adjustedEndDate >= startDate) {
        setDate({
          startDate,
          endDate: adjustedEndDate,
          key: 'selection',
        });
      } else {
        setDate({
          startDate,
          endDate: startDate,
          key: 'selection',
        });
      }
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
