// Sidebar.jsx

import React from 'react';
import { Link } from 'react-router-dom';

function Sidebar({ handleTitleChange}) {
  return (
    <div className="sidebar">
        {/* <Link to="/" onClick={() => handleTitleChange('Default Title')}>
            Default
        </Link>
        <Link to="/register" onClick={() => handleTitleChange('Register')}>
            Register Form
        </Link>
        <Link to="/login" onClick={() => handleTitleChange('Login Form')}>
            Login Form
        </Link> */}
        <Link to="/profile" onClick={() => handleTitleChange('Customer Profile')}>
            Profile
        </Link>
        <Link to="/reports" onClick={() => handleTitleChange('Reports')}>
            Reports
        </Link>
        <Link to="/settings" onClick={() => handleTitleChange('Settings')}>
            Settings
        </Link>
    </div>
  );
}

export default Sidebar;
