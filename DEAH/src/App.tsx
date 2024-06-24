import './App.css';
import { Route, Routes } from 'react-router-dom';
import About from './components/About';
import Contact from './components/Contact';
import Faq from './components/Faq';
import Forgot from './components/Forgot';
import Login from './AuthForm/Login';
import NewPassword from './components/NewPassword';
import NewsDetails from './components/NewsDetails';
import New from './components/New';
import Payment from './components/Payment';
import PrivacyPolicy from './components/PrivacyPolicy';
import Register from './AuthForm/Register';
import TermsCondition from './components/TermsCondition';
import TourDetails from './components/TourDetails';
import TourList from './components/TourList';
import Verification from './components/Verification';
import Indextwo from './components/Indextwo';
import SlideShow from './FunctionComponentContext/SlideShow';
import SlideShowpost from './FunctionComponentContext/SlideShowpost';
import ProfileUser from './AuthForm/ProfileUser';



function App() {
  return (
    <>
      <Routes>
        <Route path="/" element={<Indextwo />} />
        <Route path="/index-two" element={<Indextwo />} />
        <Route path="/about" element={<About />} />
        <Route path="/tour-list" element={<TourList />} />
        <Route path="/tour-details/:id" element={<TourDetails />} />
        <Route path="/news-details/:id" element={<NewsDetails />} />
        <Route path="/payment" element={<Payment />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/forgot-pass" element={<Forgot />} />
        <Route path="/verification" element={<Verification />} />
        <Route path="/new-password" element={<NewPassword />} />
        <Route path="/faq" element={<Faq />} />
        <Route path="/privacy-policy" element={<PrivacyPolicy />} />
        <Route path="/terms-condition" element={<TermsCondition />} />
        <Route path="/news" element={<New />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/slide" element={<SlideShow />} />

        <Route path="/slidepost" element={<SlideShowpost />} />
        <Route path="/profile" element={<ProfileUser />} />
    
      </Routes>
    </>
  );
}

export default App;