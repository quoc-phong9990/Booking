import 'bootstrap/dist/css/bootstrap.min.css';
import img from '../assets/category_tour/HaNoi.png';
import { useState } from 'react';
import { Link } from 'react-router-dom';

const MyDropdown = () => {
  const [Open, setOpen] = useState(false);
  const Menus = [
    { name: 'Profile', link: '/profile' },
    { name: 'ABC', link: '/abc' },
    { name: 'CC', link: '/cc' },
    { name: 'Logout', link: '/logout' }
  ];

  return (
    <div className=''>
      <div className='relative'>
        <img
          onClick={() => setOpen(!Open)}
          src={img}
          alt="img"
          className='h-5 w-5 border-4 object-cover border-gray-400 rounded-full cursor-pointer'
        />
        {
          Open && (
            <div className='bg-white p-4 w-52 shadow-lg absolute -left-14 top-24'>
              <ul className='list-none p-0 m-0'>
                {Menus.map((menu) => (
                  <li
                    className='text-lg cursor-pointer rounded p-2 hover:bg-green-400'
                    key={menu.name}
                  >
                    <Link 
                      to={menu.link} 
                      onClick={() => setOpen(false)}
                      className='block w-full h-full'
                    >
                      {menu.name}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          )
        }
      </div>
    </div>
  );
};

export default MyDropdown;
