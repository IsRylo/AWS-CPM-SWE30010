// RegisterForm.jsx

import React, { useState } from 'react';

function RegisterForm() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  function handleSubmit(event) {
    event.preventDefault();
    console.log(`Username: ${username}`);
    console.log(`Email: ${email}`);
    console.log(`Password: ${password}`);
  }

  return (
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
  );
}

export default RegisterForm;
