import {Container, Nav, Navbar} from 'react-bootstrap';
import {NavLink} from "react-router-dom";
/*import vector from "../assets/img/vector.jpg"*/

export const Home = ()=>{
    return(
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
        <div className="d-flex">
            <div className="wrap-text">
                    <span className="tagline">Welcome to our website</span>
                        <h1>Hi!</h1>
                        <p>Ikan yang ditemukan di berbagai pelabuhan dapat bervariasi dalam jenis, ukuran, dan spesiesnya. Pelabuhan merupakan tempat di mana ikan ditangkap atau didaratkan setelah ditangkap oleh para nelayan. Setiap pelabuhan memiliki karakteristik unik dan lingkungan perairan yang berbeda, yang mempengaruhi jenis ikan yang dapat ditemukan di sana.</p>
                    </div>
            </div>
    </Container>
    </section>   
    )
}

