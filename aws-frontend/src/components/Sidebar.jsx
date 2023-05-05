// Sidebar.jsx

import React from 'react';
import { Link } from 'react-router-dom';

function Sidebar({ handleTitleChange}) {
  return (
    <div className="sidebar">
        <Link to="/" onClick={() => handleTitleChange('Default Title')}>
            Default
        </Link>
        <Link to="/Register" onClick={() => handleTitleChange('Register')}>
            Register Form
        </Link>
        <Link to="/login" onClick={() => handleTitleChange('Login Form')}>
            Login Form
        </Link>
    </div>
  );
}

export default Sidebar;
