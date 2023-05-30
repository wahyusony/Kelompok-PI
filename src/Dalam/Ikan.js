import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Container, Nav, Navbar } from 'react-bootstrap';
import { NavLink, useNavigate, Link } from "react-router-dom";

export const Ikan = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [ikanList, setIkanList] = useState([]);
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
    // Panggil API untuk mendapatkan data ikan
    fetchData();
  }, []);

  const fetchData = async () => {
    const token = sessionStorage.getItem('token');
        const tokenType = sessionStorage.getItem('token_type');
        const response = await fetch('http://localhost:8000/api/ambilData', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
            
        }).catch(err => console.log(err));
        const objek = await response.json();
        console.log(objek.data);
        setIkanList(objek.data);
        setTimeout(() => {
            setIsLoading(false);
        }, 1000);
        console.log(token);
  };

  const handleSearch = (e) => {
    setSearchTerm(e.target.value);
    setCurrentPage(1); // Reset halaman ke halaman pertama saat melakukan pencarian
  };

  const filterIkan = (ikan) => {
    if (!Array.isArray(ikan)) {
      return []; // Kembalikan array kosong jika ikan bukan array
    }
  
    return ikan.filter(
      (item) =>
        item &&
        item.nama_ikan &&
        item.nama_ikan.toLowerCase().includes(searchTerm?.toLowerCase())
    );
  };
  
  const filteredIkanList = filterIkan(ikanList);
  
  const totalPages = Math.ceil((filteredIkanList?.length || 0) / itemsPerPage);


  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  /*const deleteIkan = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/ikans/${id}`);
      // Lakukan logika setelah menghapus ikan, seperti memperbarui daftar ikan
      fetchData();
    } catch (error) {
      console.error(error);
    }
  };

  const editIkan = (id) => {
    navigate(`/ikan/edit/${id}`);
  };*/

  const renderIkanList = () => {
    console.log(filteredIkanList);
    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentItems = filteredIkanList.slice(indexOfFirstItem, indexOfLastItem);

    return (
      <tbody>
        {currentItems.map((item) => (
          <tr key={item.id}>
            <td> {item.nama_ikan} </td>
            <td> {item.jenis_ikan} </td>
            <td> {item.tgl_tiba} </td>
            <td> {item.harga} </td>
            <td> {item.pelabuhan} </td>
            <td> <img src={item.image}/> </td>
           {/* <td>
            <div className="button-group">
              <button className="btn btn-primary" onClick={() => editIkan(item.id)} >Edit<Link to={`/ikan/edit/${item.id}`}/></button>
              <button className="btn btn-secondary"onClick={() => deleteIkan(item.id)}>Delete</button>
            </div>
        </td>*/}
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
          <input type="text" value={searchTerm} onChange={handleSearch} placeholder="Cari ikan..." />
          <h1></h1>
          <table>
            <thead>
              <tr>
                <th>Nama</th>
                <th>Jenis Ikan</th>
                <th>Tanggal Tiba</th>
                <th>Harga</th>
                <th>Pelabuhan</th>
                <th>Gambar</th>
              </tr>
            </thead>
            {renderIkanList()}
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
