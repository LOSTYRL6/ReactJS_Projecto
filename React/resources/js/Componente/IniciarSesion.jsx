// import React, { useState, useRef } from "react";
// import { createRoot } from "react-dom/client";
// import "../../css/Auth.css";
// import gsap from "gsap";
// import { useGSAP } from "@gsap/react";
// import axios from "axios";

// gsap.registerPlugin(useGSAP);

// export default function IniciarSes() {
//     const tituloRef = useRef(null);

//     useGSAP(() => {
//         gsap.to(tituloRef.current, {
//             color: "#9C1C1C",
//             repeat: -1,
//             yoyo: true,
//             duration: 1.5,
//             ease: "power1.inOut",
//         });
//     }, []);

//     const [DatosFormulario, setFormData] = useState({
//         UsernameCorreo: "",
//         contrasena: "",
//     });

//     const handleChange = (e) => {
//         const { name, value, files } = e.target;
//         if (name === "imagen_icono") {
//             setFormData({ ...DatosFormulario, imagen_icono: files[0] });
//             console.log(files[0]);
//         } else {
//             setFormData({ ...DatosFormulario, [name]: value });
//         }
//     };

//     const handleSubmit = (e) => {
//         e.preventDefault();

//         const sonidoAleatorio =
//             Math.random() < 0.5 ? "Audio/Bonfire.mp3" : "Audio/siteGrace.mp3";
//         const sonido = new Audio(sonidoAleatorio);

//         const data = new FormData();
//         Object.keys(DatosFormulario).forEach((key) => {
//             data.append(key, DatosFormulario[key]);
//         });

//         axios
//             .post("/login", data, {
//                 withCredentials: true,
//             })
//             .then((response) => {
//                 console.log("Formulario enviado con éxito:", response.data);
//                 sonido.volume = 0.5;
//                 sonido.play();
//                 setTimeout(() => {}, 1500);
//             })
//             .catch((error) => {
//                 console.error("Error al enviar:", error);
//             });
//     };

//     return (
//         <div className="contenedorFormRegistrarse">
//             <form onSubmit={handleSubmit} className="FormIniciarSesion">
//                 <h1 ref={tituloRef} className="tituloFuego">
//                     Iniciar Sesion
//                 </h1>

//                 <div className="formGroup">
//                     <label htmlFor="nombre">Username / CorreoElectronico</label>
//                     <input
//                         type="text"
//                         id="UsernameCorreo"
//                         name="UsernameCorreo"
//                         onChange={handleChange}
//                     />
//                 </div>

//                 <div className="formGroup">
//                     <label htmlFor="contrasena">Contraseña</label>
//                     <input
//                         type="password"
//                         id="contrasena"
//                         name="contrasena"
//                         onChange={handleChange}
//                     />
//                 </div>

//                 <button type="submit" className="btnEnviar">
//                     Enviar
//                 </button>
//             </form>
//         </div>
//     );
// }

// if (document.getElementById("IniciarSes")) {
//     createRoot(document.getElementById("IniciarSes")).render(<IniciarSes />);
// }
