// App.js

import React, { useState } from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import './css/App.css';
import LoginForm from './components/LoginForm';
import Sidebar from './components/Sidebar';
import RegisterForm from './components/RegisterForm';

function App() {
  const [title, setTitle] = useState('Default Title');

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
              <Route path="/" element={<Sidebar  handleTitleChange={handleTitleChange} />}/>
              <Route path="/register" element={<RegisterForm />}/>
              <Route path="/login" element={<LoginForm />} />
            </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
