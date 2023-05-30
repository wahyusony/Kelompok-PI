import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { Container } from 'react-bootstrap';
import swal from 'sweetalert';

async function loginUser(credentials) {
  return fetch('http://localhost:8000/api/login', {
    method: 'POST',
    dataType: "json",
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(credentials)
  })
  .then(data => data.json())
}

export default function Login () {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async e => {
      e.preventDefault();
      const response = await loginUser({
        email,
        password
      });

      console.log(response);
      
      console.log(response.success);
if (response.success && 'token' in response.success) {
  swal('Success', response.message || 'Login successful', 'success', {
    buttons: true,
    timer: 2000
  })
    .then(() => {
      sessionStorage.setItem('token', response.success.token);
      sessionStorage.setItem('name', response.success.name);
      window.location.href = '/Dashboard';
    });
} else {
  swal('Failed', response.message || 'Login failed', 'error');
}

    };

  const handleGoBack = () => {
    navigate('/');
  };

  return (
    <section className="home">
      <Container>
        <div className="container">
          <h2>Login</h2>
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <label>Email</label>
              <input
                type="email"
                className="form-control"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
            </div>
            <div className="form-group">
              <label>Password</label>
              <input
                type="password"
                className="form-control"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
              />
              <p></p>
            </div>
            <div className="button-group">
              <button type="submit" className="btn btn-primary">Login</button>
              <button className="btn btn-primary" onClick={handleGoBack}>Kembali</button>
            </div>
            <div className="text-center mt-3">
              Belum punya akun? <Link to="/register">Daftar</Link>
            </div>
          </form>
        </div>
      </Container>
    </section>
  );
};
