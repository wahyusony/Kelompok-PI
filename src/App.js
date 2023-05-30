import {BrowserRouter, Routes, Route,} from "react-router-dom";
import React from 'react';
import {Home} from "./components/Home"
import {About} from "./components/About"
import {Ikan} from "./Dalam/Ikan"
import Login from "./components/Login"
import Register from "./components/Register";
import {Pelabuhan} from "./Dalam/Pelabuhan"
import {Pemasok} from "./Dalam/Pemasok"
import {Transaksi} from "./Dalam/Transaksi"
import {Dashboard} from "./Dalam/Dashboard"
import {EditIkan} from "./Dalam/edit/EditIkan";


function App() {
  
  const token = sessionStorage.getItem('token');
  console.log(token);

  return (
    <div className="App">
    <BrowserRouter>
      <Routes>
       <Route path="/" element={<Home />} />
       <Route path="/about" element={<About />} />
       <Route path="/ikan" element={<Ikan />} />
       <Route path="/login" element={<Login />} />
       <Route path="/Register" element={<Register />} />
       <Route path="/Pelabuhan" element={<Pelabuhan />} />
       <Route path="/Pemasok" element={<Pemasok />} />
       <Route path="/Transaksi" element={<Transaksi />} />
       <Route path="/Dashboard" element={<Dashboard />} />
       <Route path="/ikan/edit/:id_ikan" element={<EditIkan />} />
       
      </Routes>
    </BrowserRouter>
    </div>
  );
}

export default App;
