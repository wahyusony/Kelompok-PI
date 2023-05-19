import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {Container} from "react-bootstrap";

export const Ikan = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [ikanList, setIkanList] = useState([]);

  useEffect(() => {
    // Panggil API untuk mendapatkan data ikan
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/ikans');
      setIkanList(response.data);
    } catch (error) {
      console.error(error);
    }
  };

  const handleSearch = (e) => {
    setSearchTerm(e.target.value);
  };

  // Fungsi untuk memfilter daftar ikan berdasarkan input pencarian
  const filterIkan = (ikan) => {
    return ikan.nama.toLowerCase().includes(searchTerm.toLowerCase());
  };

  const filteredIkanList = ikanList.filter(filterIkan);

  const handleEdit = (id) => {
    // Tambahkan logika untuk mengarahkan pengguna ke halaman edit ikan
    console.log(`Edit ikan dengan ID ${id}`);
  };

  const handleDelete = async (id) => {
    try {
      // Panggil API untuk menghapus ikan berdasarkan ID
      await axios.delete(`http://localhost:8000/api/ikans/${id}`);
      // Panggil fetchData untuk memperbarui daftar ikan setelah penghapusan
      fetchData();
    } catch (error) {
      console.error(error);
    }
  };
  const handleAdd = () => {
    // Tambahkan logika untuk mengarahkan pengguna ke halaman tambah ikan
    console.log('Tambah ikan');
  };

  return (
    <section className="home">
            <Container>
    <div>
      <input type="text" value={searchTerm} onChange={handleSearch} placeholder="Cari ikan..." />
      <h1></h1>
      <button onClick={handleAdd}>Tambah Ikan </button>
      <h1></h1>
      <table>
        <thead>
          <tr>
            <th>Nama </th> 
            <th>Jenis Ikan </th>
            <th>Pelabuhan </th>
            <th>Deskripsi </th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          {filteredIkanList.map((ikan) => (
            <tr key={ikan.id}>
              <td> {ikan.nama} </td>
              <td> {ikan.jenis_ikan} </td>
              <td> {ikan.pelabuhan} </td>
              <td> {ikan.deskripsi} </td>
              <td> {ikan.gambar} </td>
              <td>
                <button onClick={() => handleEdit(ikan.id)}> Edit </button>

                <button onClick={() => handleDelete(ikan.id)}> Delete </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
    </Container>
    </section>
  );
};


