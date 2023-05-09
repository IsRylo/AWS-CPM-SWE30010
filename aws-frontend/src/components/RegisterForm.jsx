// RegisterForm.jsx

import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

function RegisterForm() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [isValidEmail, setIsValidEmail] = useState(true);
  const [error, setError] = useState(null);
  const navigate = useNavigate();
  
  const handleSubmit = (event) => { 
    event.preventDefault();
    axios
      .post("http://localhost/Swinburne/CPM/AWS-CPM-SWE30010/aws-backend/api/register", {
        username: username,
        email: email,
        password: password,
      })
      .then((response) => {
        console.log(response);
        setError(response.data);
        navigate("/login");
      })
      .catch((error) => {
        console.log(error);
      });
  };

  const handleEmailChange = (event) => {
    const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    setEmail(event.target.value);
    setIsValidEmail(emailRegex.test(event.target.value));
  };


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
          onChange={handleEmailChange}
          style={{ borderColor: isValidEmail ? "" : "red" }}
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
    <div id="error">
      <p>{error == null ? "All good" : error}</p>
    </div>
    </div>
  );
}

export default RegisterForm;
