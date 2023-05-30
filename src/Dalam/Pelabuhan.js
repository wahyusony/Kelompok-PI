import React, { useState, useEffect } from 'react';
import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink, useNavigate} from "react-router-dom";

export const Pelabuhan = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [pelabuhanList, setPelabuhanList] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 4;
  const navigate = useNavigate();

    const handleLogout = () => {
      const confirmLogout = window.confirm('Apakah Anda yakin ingin logout?');
      if (confirmLogout) {
        // Lakukan logika logout di sini
        navigate('/');
      }
    };

  useEffect(() => {
    // Panggil API untuk mendapatkan data pelabuhan
    fetchData();
  }, []);

  const fetchData = async () => {
    const token = sessionStorage.getItem('token');
        const tokenType = sessionStorage.getItem('token_type');
        const response = await fetch('http://localhost:8000/api/semuaPelabuhan', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
            
        }).catch(err => console.log(err));
        const objek = await response.json();
        console.log(objek.data);
        setPelabuhanList(objek.data);
        setTimeout(() => {
            setIsLoading(false);
        }, 1000);
        console.log(token);
  };

  const handleSearch = (e) => {
    setSearchTerm(e.target.value);
    setCurrentPage(1); // Reset halaman ke halaman pertama saat melakukan pencarian
  };

  const filterPelabuhan = (pelabuhan) => {
    return pelabuhan.pelabuhan.toLowerCase().includes(searchTerm.toLowerCase());
  };

  const filteredPelabuhanList = pelabuhanList.filter(filterPelabuhan);
  const totalPages = Math.ceil(filteredPelabuhanList.length / itemsPerPage);

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  const renderPelabuhanList = () => {
    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentItems = filteredPelabuhanList.slice(indexOfFirstItem, indexOfLastItem);

    return (
      <tbody>
        {currentItems.map((pelabuhan) => (
          <tr key={pelabuhan.id}>
            <td> {pelabuhan.pelabuhan} </td>
            <td> {pelabuhan.lokasi} </td>
            <td> {pelabuhan.deskripsi} </td>
          </tr>
        ))}
      </tbody>
    );
  };

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
          <input type="text" value={searchTerm} onChange={handleSearch} placeholder="Cari pelabuhan..." />
          <table>
            <thead>
              <tr>
                <th>Pelabuhan </th>
                <th>Lokasi </th>
                <th>Deskripsi </th>
              </tr>
            </thead>
            {renderPelabuhanList()}
          </table>
          <div>
            {Array.from({ length: totalPages }, (_, index) => index + 1).map((page) => (
              <button key={page} onClick={() => handlePageChange(page)}>{page}</button>
            ))}
          </div>
        </div>
        </Container>
    </section>
    
  );
};
