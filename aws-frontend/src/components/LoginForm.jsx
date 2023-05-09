// LoginForm.jsx

import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

function LoginForm() {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  function handleSubmit(event) {
    event.preventDefault();
    axios.post('http://yourserver.com/login.php', { //TO
      username: username,
      password: password
    }).then(response => {
      localStorage.setItem('token', response.data.token);
      console.log('Logged in successfully!');
      // Redirect to another page or update the UI to show that the user is logged in
      navigate('/');
    }).catch(error => {
      console.log('Error logging in:', error);
    });
  }

  return (
    <div className="login-component">
      <form>  
          {/* Username input */}
          <label htmlFor="username">Username: </label>
          <input
              type="text"
              id="username"
              value={username}
              onChange={(event) => setUsername(event.target.value)}
          />

          {/* Password Input */}
          <label htmlFor="password">Password: </label>
          <input
              type="password"
              id="password"
              value={password}
              onChange={(event) => setPassword(event.target.value)}
          />
        <button type="submit" >Login</button>
      </form>
    </div>
  );
}

export default LoginForm;
