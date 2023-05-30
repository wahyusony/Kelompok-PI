import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink} from "react-router-dom";

export const About = () => {
  return (
  <section className="home">
  <Container>
    <Navbar expand="md">
        <Navbar.Brand href="/">IKAN SEGAR</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="ms-auto">
            <Nav.Link className="navbar-link active" href="/">Home<i className="ri-home-4-line"></i></Nav.Link>
            <Nav.Link className="navbar-link active" href="/about">About Us<i className="ri-user-2-line"></i></Nav.Link>
          </Nav>
          <span className="navbar-text">
            <NavLink to="/login">
              <button><span>Login</span><i className="ri-contacts-book-line"></i></button>
            </NavLink>
          </span>
        </Navbar.Collapse>
    </Navbar>      
    <div className="container">
      <h1></h1>
      <p>Aplikasi website penyedia data ikan dari berbagai pelabuhan adalah sebuah platform yang memungkinkan pengguna untuk mengakses informasi terkait data ikan dari berbagai pelabuhan. Aplikasi ini bertujuan untuk memberikan akses mudah dan cepat kepada pengguna dalam mengetahui informasi terkini mengenai jenis ikan, stok ikan, harga ikan, dan data terkait lainnya dari berbagai pelabuhan.</p>
      <p>Aplikasi ini juga dapat memanfaatkan API dari pelabuhan atau sumber data ikan lainnya untuk memperoleh informasi terbaru secara real-time.</p>
    </div>
  </Container>
  </section>
  );
};


