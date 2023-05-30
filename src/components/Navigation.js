import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink} from "react-router-dom";

function BasicExample() {
  return (
    <Navbar expand="md">
      <Container>
        <Navbar.Brand href="/">IKAN SEGAR</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="ms-auto">
            <Nav.Link className="navbar-link active" href="/">Home<i className="ri-home-4-line"></i></Nav.Link>
            <Nav.Link className="navbar-link active" href="/about">About Us<i className="ri-user-2-line"></i></Nav.Link>
            <Nav.Link className="navbar-link active" href="/ikan">Our Data<i className="ri-database-2-line"></i></Nav.Link>
            <Nav.Link className="navbar-link active" href="/pelabuhan">Pelabuahan</Nav.Link>
            <Nav.Link className="navbar-link active" href="/pemasok">Pemasok</Nav.Link>
            <Nav.Link className="navbar-link active" href="/transaksi">Transaksi</Nav.Link>
          </Nav>
          <span className="navbar-text">
            <NavLink to="/login">
              <button><span>Login</span><i className="ri-contacts-book-line"></i></button>
            </NavLink>
          </span>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default BasicExample;