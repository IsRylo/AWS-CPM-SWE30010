// RegisterForm.jsx

import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

function RegisterForm() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  function handleSubmit(event) {
    event.preventDefault();
    axios.post('http://yourserver.com/register.php', {
      username: username,
      email: email,
      password: password
    }).then(response => {
      console.log('Registered successfully!');
      navigate('/login');
    }).catch(error => {
      console.log('Error registering:', error);
    });
  }
  

  return (
    <div className="register-component">
      <form onSubmit={handleSubmit}>
        {/* Username Input */}
        <label htmlFor="username">Username: </label>
        <input
            id='username' 
            type="text" 
            value={username} 
            onChange={(event) => setUsername(event.target.value)} 
        />

        {/* Email Input */}
        <label htmlFor='email'>Email:</label>
        <input 
            type="email" 
            value={email}
            id='email' 
            onChange={(event) => setEmail(event.target.value)} 
        />

        <label htmlFor='password'>Password:</label>
        <input 
            type="password" 
            value={password} 
            id='password'
            onChange={(event) => setPassword(event.target.value)} 
        />
      <button type="submit">Register</button>
    </form>

    </div>
  );
}

export default RegisterForm;
