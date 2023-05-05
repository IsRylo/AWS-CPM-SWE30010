// LoginForm.jsx

import React, { useState } from 'react';

function LoginForm() {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  function handleSubmit(event) {
    event.preventDefault();
    console.log(`Username: ${username}, Password: ${password}`);
  }

  return (
    <form onSubmit={handleSubmit}>  
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
      <button type="submit" onSubmit={handleSubmit}>Login</button>
    </form>
  );
}

export default LoginForm;
