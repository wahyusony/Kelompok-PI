import { Container, Nav, Navbar } from 'react-bootstrap';
import {useNavigate } from 'react-router-dom';

export const Dashboard = () => {
  const navigate = useNavigate();

  const handleLogout = () => {
    const confirmLogout = window.confirm('Apakah Anda yakin ingin logout?');
    if (confirmLogout) {
      // Lakukan logika logout di sini
      navigate('/');
    }
  };

  return (
    <section className="home">
      <Container>
        <Navbar expand="md">
          <Navbar.Brand href="/Dashboard">IKAN SEGAR</Navbar.Brand>
          <Navbar.Toggle aria-controls="basic-navbar-nav" />
          <Navbar.Collapse id="basic-navbar-nav">
            <Nav className="ms-auto">
              <Nav.Link className="navbar-link active" href="/ikan">
                Data Ikan<i className="ri-database-2-line"></i>
              </Nav.Link>
              <Nav.Link className="navbar-link active" href="/pelabuhan">
                Pelabuahan
              </Nav.Link>
              <Nav.Link className="navbar-link active" href="/pemasok">
                Pemasok
              </Nav.Link>
              <Nav.Link className="navbar-link active" href="/transaksi">
                Transaksi
              </Nav.Link>
            </Nav>
            <span className="navbar-text">
              <button onClick={handleLogout}>
                <span>Logout</span>
                <i className="ri-contacts-book-line"></i>
              </button>
            </span>
          </Navbar.Collapse>
        </Navbar>
        <div className="container">
          <h1></h1>
          
          <p>
            Aplikasi website penyedia data ikan dari berbagai pelabuhan adalah sebuah platform yang memungkinkan
            pengguna untuk mengakses informasi terkait data ikan dari berbagai pelabuhan. Aplikasi ini bertujuan untuk
            memberikan akses mudah dan cepat kepada pengguna dalam mengetahui informasi terkini mengenai jenis ikan,
            stok ikan, harga ikan, dan data terkait lainnya dari berbagai pelabuhan.
          </p>
        </div>
      </Container>
    </section>
  );
};
