// App.js

import React, { useState } from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import './css/App.css';
import LoginForm from './components/LoginForm';
import Sidebar from './components/Sidebar';
import RegisterForm from './components/RegisterForm';
import LandingPage from './components/LandingPage';

function App() {
  const [title, setTitle] = useState('Landing Page');

  const [loggedIn, setLoggedIn] = useState(false);

  function handleTitleChange(newTitle) {
    setTitle(newTitle);
  }

  return (
    <Router>
      <div className="container">
        {/* Main Content */}
        <div className="main-content">
          <h1 className="title">{title}</h1>
            <Routes>
              <Route path="/" element={<LandingPage handleTitleChange={handleTitleChange}/>}/>
              <Route path="/register" element={<RegisterForm />}/>
              <Route path="/login" element={<LoginForm />} />
              <Route path='/profile' element={<Sidebar  handleTitleChange={handleTitleChange}/>}/>
              <Route path='/report' element={<Sidebar  handleTitleChange={handleTitleChange}/>}/>
              <Route path='/settings' element={<Sidebar  handleTitleChange={handleTitleChange}/>}/>
            </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
