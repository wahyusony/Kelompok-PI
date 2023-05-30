import React, { useState, useEffect } from 'react';
import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink, useNavigate} from "react-router-dom";

export const Transaksi = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [transaksiList, setTransaksiList] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;
  const navigate = useNavigate();

  const handleLogout = () => {
    const confirmLogout = window.confirm('Apakah Anda yakin ingin logout?');
      if (confirmLogout) {
        // Lakukan logika logout di sini
        navigate('/');
      }
    };

  useEffect(() => {
    // Panggil API untuk mendapatkan data transaksi
    fetchData();
  }, []);

  const fetchData = async () => {
    const token = sessionStorage.getItem('token');
        const tokenType = sessionStorage.getItem('token_type');
        const response = await fetch('http://localhost:8000/api/semuaTransaksi', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
            
        }).catch(err => console.log(err));
        const objek = await response.json();
        console.log(objek.data);
        setTransaksiList(objek.data);
        setTimeout(() => {
            setIsLoading(false);
        }, 1000);
        console.log(token);
  };

  const handleSearch = (e) => {
    setSearchTerm(e.target.value);
    setCurrentPage(1); // Reset halaman ke halaman pertama saat melakukan pencarian
  };

  const filterTransaksi = (transaksi) => {
    return transaksi.nama_pemasok.toLowerCase().includes(searchTerm.toLowerCase());
  };

  const filteredTransaksiList = transaksiList.filter(filterTransaksi);
  const totalPages = Math.ceil(filteredTransaksiList.length / itemsPerPage);

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  const renderTransaksiList = () => {
    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentItems = filteredTransaksiList.slice(indexOfFirstItem, indexOfLastItem);

    return (
      <tbody>
        {currentItems.map((transaksi) => (
          <tr key={transaksi.id}>
            <td> {transaksi.nama_pemasok} </td>
            <td> {transaksi.nama_ikan} </td>
            <td> {transaksi.jumlah} </td>
            <td> {transaksi.tgl_transaksi} </td>
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
          <input type="text" value={searchTerm} onChange={handleSearch} placeholder="Cari transaksi..." />
          <table>
            <thead>
              <tr>
                <th>Nama Pemasok </th>
                <th>Nama Ikan </th>
                <th>Jumlah </th>
                <th>Tanggal Transaksi </th>
              </tr>
            </thead>
            {renderTransaksiList()}
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
