import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useParams, useNavigate } from 'react-router-dom';
import {Container} from 'react-bootstrap';

export const EditIkan = () => {
  const { id_ikan } = useParams();
  const navigate = useNavigate();

  const [namaIkan, setNamaIkan] = useState('');
  const [jenisIkan, setJenisIkan] = useState('');
  const [tglTiba, setTglTiba] = useState('');
  const [harga, setHarga] = useState('');
  const [pelabuhan, setPelabuhan] = useState('');
  const [image, setImage] = useState('');

  useEffect(() => {
    fetchIkanData();
  }, []);

  const fetchIkanData = async () => {
    try {
      const token = sessionStorage.getItem('token');
      const tokenType = sessionStorage.getItem('token_type');
        const response = await fetch('http://localhost:8000/api/ikans/${id_ikan}', {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
    }); 
  }catch (error) {
      console.error(error);
    }
  };
  

  const handleSubmit = async (e) => {
    e.preventDefault();
  
    try {
      const token = sessionStorage.getItem('token');
      const updatedIkan = {
        nama_ikan: namaIkan,
        jenis_ikan: jenisIkan,
        tgl_tiba: tglTiba,
        harga: harga,
        pelabuhan: pelabuhan,
        image: image,
      };
  
      await fetch(`http://localhost:8000/api/ikans/${id_ikan}`, updatedIkan, {
        method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'Authorization': `Bearer ${token}`
            }
      });
      navigate('/ikan'); // Kembali ke halaman data ikan setelah berhasil mengedit
    } catch (error) {
      console.error(error);
    }
  };
  

  const handleGoBack = () => {
    navigate('/ikan');
  };

  return (
    <section className="home1">
    <Container>
    <div>
      <form onSubmit={handleSubmit}>
        <table>
          <tbody>
            <tr>
              <td>Nama Ikan:</td>
              <td>
                <input type="text" defaultValue={namaIkan} onChange={(e) => setNamaIkan(e.target.value)} />
              </td>
            </tr>
            <tr>
              <td>Jenis Ikan:</td>
              <td>
                <input type="text" defaultValue={jenisIkan} onChange={(e) => setJenisIkan(e.target.value)} />
              </td>
            </tr>
            <tr>
              <td>Tanggal Tiba:</td>
              <td>
                <input type="text" defaultValue={tglTiba} onChange={(e) => setTglTiba(e.target.value)} />
              </td>
            </tr>
            <tr>
              <td>Harga:</td>
              <td>
                <input type="text" defaultValue={harga} onChange={(e) => setHarga(e.target.value)} />
              </td>
            </tr>
            <tr>
              <td>Pelabuhan:</td>
              <td>
                <input type="text" defaultValue={pelabuhan} onChange={(e) => setPelabuhan(e.target.value)} />
              </td>
            </tr>
            <tr>
              <td>Gambar:</td>
              <td>
                <input type="text" defaultValue={image} onChange={(e) => setImage(e.target.value)} />
              </td>
            </tr>
            <tr><div className="button-group">
              <td><button type="submit" className="btn btn-primary">Simpan</button></td>
            </div>
              <td>
              <div className="button-group"><button className="btn btn-primary" onClick={handleGoBack}>Kembali</button></div>
              </td>
            </tr>
          </tbody>
        </table>
       
      </form>
    </div>
    </Container>
    </section>
  );
};
