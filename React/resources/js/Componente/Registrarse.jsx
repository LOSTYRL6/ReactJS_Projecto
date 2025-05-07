import React, { useState, useRef } from "react";
import { createRoot } from "react-dom/client";
import '../../css/Auth.css';
import gsap from 'gsap';
import { useGSAP } from '@gsap/react';
import axios from 'axios';

gsap.registerPlugin(useGSAP);

export default function Registrarse() {
  const tituloRef = useRef(null);

  useGSAP(() => {
    gsap.to(tituloRef.current, {
      color: "#9C1C1C",
      repeat: -1,
      yoyo: true,
      duration: 1.5,
      ease: "power1.inOut"
    });
  }, []);

  const [DatosFormulario, setFormData] = useState({
    nombre: '',
    apellido: '',
    username: '',
    correo: '',
    contrasena: '',
    imagen_icono: null,
    id_rol: 1
  });

  const handleChange = (e) => {
    const { name, value, files } = e.target;
    if (name === "imagen_icono") {
      setFormData({ ...DatosFormulario, imagen_icono: files[0] });
      console.log(files[0]);
    } else {
      setFormData({ ...DatosFormulario, [name]: value });
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    const sonidoAleatorio = Math.random() < 0.5 ? 'Audio/Bonfire.mp3' : 'Audio/siteGrace.mp3';
    const sonido = new Audio(sonidoAleatorio);

    const data = new FormData();
    Object.keys(DatosFormulario).forEach(key => {
      data.append(key, DatosFormulario[key]);
    });
    if (DatosFormulario.imagen_icono) {
        data.append("file", DatosFormulario.imagen_icono);
    }
    axios.post('usuarios', data)
    .then((response) => {
      console.log('Formulario enviado con éxito:', response.data);
      sonido.volume = 0.5;
      sonido.play();
      setTimeout(() => {
        window.location.href = "./Iniciar";
      }, 1500);
    })
    .catch((error) => {
      console.error('Error al enviar:', error);
    });
  };

  return (
    <div className="contenedorFormRegistrarse">
      <form onSubmit={handleSubmit} className="FormIniciarSesion" encType="multipart/form-data">
        <h1 ref={tituloRef} className="tituloFuego">Registro de Usuario</h1>

        <div className="formGroup">
          <label htmlFor="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" onChange={handleChange} />
        </div>

        <div className="formGroup">
          <label htmlFor="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" onChange={handleChange} />
        </div>

        <div className="formGroup">
          <label htmlFor="username">Nombre de Usuario</label>
          <input type="text" id="username" name="username" onChange={handleChange} />
        </div>

        <div className="formGroup">
          <label htmlFor="correo">Correo Electrónico</label>
          <input type="email" id="correo" name="correo" onChange={handleChange} />
        </div>

        <div className="formGroup">
          <label htmlFor="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" onChange={handleChange} />
        </div>

        <div className="formGroup">
          <label htmlFor="imagen_icono">Imagen de Perfil</label>
          <input type="file" id="imagen_icono" name="imagen_icono"  onChange={handleChange} />
        </div>

        <button type="submit" className="btnEnviar">Enviar</button>
      </form>
    </div>
  );
}

if (document.getElementById("Registrarse")) {
  createRoot(document.getElementById("Registrarse")).render(<Registrarse />);
}
