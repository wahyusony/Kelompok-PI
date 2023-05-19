import {
  BrowserRouter, Routes, Route,
} from "react-router-dom";
import React, { useState, useEffect } from 'react';
import Navigation from "./components/Navigation"
import {Home} from "./components/Home"
import {About} from "./components/About"
import {Ikan} from "./components/Ikan"
import {Login} from "./components/Login"

function App() {
  return (
    <div className="App">
    <BrowserRouter>
      <Navigation />
      <Routes>
       <Route path="/" element={<Home />} />
       <Route path="/about" element={<About />} />
       <Route path="/ikan" element={<Ikan />} />
       <Route path="/login" element={<Login />} />
      </Routes>
    </BrowserRouter>
    </div>
  );
}

export default App;
