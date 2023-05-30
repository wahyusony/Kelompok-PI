import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Container } from 'react-bootstrap';
import swal from 'sweetalert';

async function registerUser(credentials) {
  return fetch('http://localhost:8000/api/registrasi', {
    method: 'POST',
    dataType: "json",
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(credentials)
  })
  .then(data => data.json())
}

export default function Register () {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [c_password, setC_Password] = useState('');
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await registerUser({
        name,
        email,
        password,
        c_password,
      });

      console.log(response);
      
      console.log(response.success);

      if (response.success && 'token' in response.success) {
        swal('Success', response.message || 'Registration successful', 'success', {
          buttons: true,
          timer: 2000
        })
          .then(() => {
            sessionStorage.setItem('token', response.success.token);
            sessionStorage.setItem('name', response.success.name);
            window.location.href = '/login';
          });
      } else {
        swal('Failed', response.message || 'Registration failed', 'error');
      }
    } catch (error) {
      console.error(error);
    }
  };

  const handleGoBack = () => {
    navigate('/login');
  };

  return (
    <section className="home1">
      <Container>
        <div className="container">
          <h2>Registrasi</h2>
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <label>Nama</label>
              <input
                type="name"
                className="form-control"
                value={name}
                onChange={(e) => setName(e.target.value)}
              />
            </div>
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
            </div>
            <div className="form-group">
              <label>Konfirmasi Password</label>
              <input
                type="password"
                className="form-control"
                value={c_password}
                onChange={(e) => setC_Password(e.target.value)}
              />
            </div>
            <p></p>
            <div className="button-group">
              <button type="submit" className="btn btn-primary">Daftar</button>
              <button className="btn btn-primary" onClick={handleGoBack}>Kembali</button>
            </div>
          </form>
        </div>
      </Container>
    </section>
  );
};
