import React, { useState, useEffect } from 'react';
import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink, useNavigate} from "react-router-dom";

export const Pemasok = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [pemasokList, setPemasokList] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const navigate = useNavigate();

  const handleLogout = () => {
    const confirmLogout = window.confirm('Apakah Anda yakin ingin logout?');
    if (confirmLogout) {
      // Lakukan logika logout di sini
      navigate('/');
    }
  };

  

  useEffect(() => {
    // Panggil API untuk mendapatkan data ikan
    fetchData();
  }, []);

  const fetchData = async () => {
    const token = sessionStorage.getItem('token');
        const tokenType = sessionStorage.getItem('token_type');
        const response = await fetch('http://localhost:8000/api/semuaPemasok', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
            
        }).catch(err => console.log(err));
        const objek = await response.json();
        console.log(objek.data);
        setPemasokList(objek.data);
        setTimeout(() => {
            setIsLoading(false);
        }, 1000);
        console.log(token);
  };

  const handleSearch = (e) => {
    setSearchTerm(e.target.value);
  };

  // Fungsi untuk memfilter daftar ikan berdasarkan input pencarian
  const filterPemasok = (pemasok) => {
    return pemasok.nama_pemasok.toLowerCase().includes(searchTerm.toLowerCase());
  };

  const filteredPemasokList = pemasokList.filter(filterPemasok);

  return (
    
   
    <section className="home1">
      <Container>
    <Navbar expand="md">
      
      <Navbar.Brand href="/Dashboard">IKAN SEGAR</Navbar.Brand>
      <Navbar.Toggle aria-controls="basic-navbar-nav" />
      <Navbar.Collapse id="basic-navbar-nav">
        <Nav className="ms-auto">
          
          <Nav.Link className="navbar-link active" href="/ikan">Data Ikan<i className="ri-database-2-line"></i></Nav.Link>
          <Nav.Link className="navbar-link active" href="/pelabuhan">Pelabuahan</Nav.Link>
          <Nav.Link className="navbar-link active" href="/pemasok">Pemasok</Nav.Link>
          <Nav.Link className="navbar-link active" href="/transaksi">Transaksi</Nav.Link>
        </Nav>
        <span className="navbar-text">
          <NavLink to="/">
          <button onClick={handleLogout}><span>Logout</span><i className="ri-contacts-book-line"></i></button>
          </NavLink>
        </span>
      </Navbar.Collapse>
    
  </Navbar>      
    <div>
      <input type="text" value={searchTerm} onChange={handleSearch} placeholder="Cari pemasok..." />
      <table>
        <thead>
          <tr>
            <th>Nama Pemasok </th>
            <th>Alamat </th>
            <th>Kontak </th>
          </tr>
        </thead>
        <tbody>
          {filteredPemasokList.map((pemasok) => (
            <tr key={pemasok.id}>
              <td> {pemasok.nama_pemasok} </td>
              <td> {pemasok.alamat} </td>
              <td> {pemasok.kontak} </td>    
              
            </tr>
          ))}
        </tbody>
      </table>
    </div>
    </Container>
    </section>
    
  );
};


