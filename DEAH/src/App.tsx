import './App.css';
import { Route, Routes, useLocation } from 'react-router-dom';
import { useState, useEffect } from 'react';
import About from './components/About';
import Contact from './components/Contact';
import Faq from './components/Faq';
import Forgot from './components/Forgot';
import Login from './AuthForm/Login';
import NewPassword from './components/NewPassword';
import NewsDetails from './components/NewsDetails';
import News from './components/News';
import Payment from './components/Payment';
import PrivacyPolicy from './components/PrivacyPolicy';
import Register from './AuthForm/Register';
import TermsCondition from './components/TermsCondition';
import TourDetails from './components/TourDetails';
import TourList from './components/TourList';
import Verification from './components/Verification';
import Indextwo from './components/Indextwo';
import SlideShow from './FunctionComponentContext/SlideShow';
import ProfileUser from './AuthForm/ProfileUser';

import ListBill from './components/ListBill';
import PaymentSuccess from './components/PaymentSuccess';
import Password from './AuthForm/Password';

import Test from './FunctionComponentContext/Longtour';
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import Loading from './FunctionComponentContext/Loading';
import Lisbill2 from './components/Lisbill2';
import Hi from './FunctionComponentContext/Hi';
import Ap from './Test/Ap';

function App() {
  const [loading, setLoading] = useState(false);
  const location = useLocation();

  useEffect(() => {
    setLoading(true);
    const timer = setTimeout(() => {
      setLoading(false);
    }, 1000); 
    return () => clearTimeout(timer);
  }, [location]);

  return (
    <>
      {loading && <Loading />}
      <Routes>
        <Route path="/" element={<Indextwo />} />
        <Route path="/index-two" element={<Indextwo />} />
        <Route path="/about" element={<About />} />
        <Route path="/tour-list" element={<TourList />} />
        <Route path="/tour-details/:slug" element={<TourDetails />} />
        <Route path="/news-details/:slug" element={<NewsDetails />} />
        <Route path="/payment/:id" element={<Payment />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/forgot-pass" element={<Forgot />} />
        <Route path="/verification" element={<Verification />} />
        <Route path="/new-password" element={<NewPassword />} />
        <Route path="/faq" element={<Faq />} />
        <Route path="/privacy-policy" element={<PrivacyPolicy />} />
        <Route path="/terms-condition" element={<TermsCondition />} />
        <Route path="/news" element={<News />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/slide" element={<SlideShow />} />
        <Route path='/paymentSuccess' element={<PaymentSuccess/>} />
        
        {/* user */}
        <Route path="/profile" element={<ProfileUser />} />
        <Route path="/listbill" element={<Lisbill2/>} />
        <Route path="/pass" element={<Password />} />
        <Route path="/t" element={<Test/>} />
        <Route path="/c" element={<Hi/>} />
        <Route path="/test" element={<Ap />} />
      </Routes>
      <ToastContainer />
    </>
  );
}

export default App;
