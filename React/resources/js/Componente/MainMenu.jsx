import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import "../../css/MenuSouls.css";
import gsap from "gsap";
import { useGSAP } from "@gsap/react";
import axios from "axios";

gsap.registerPlugin(useGSAP);

export default function MainMenu() {
    const [juegos, setJuegos] = useState([]);

    useEffect(() => {
        axios
            .get("juego")
            .then((response) => {
                setJuegos(response.data);
            })
            .catch((error) => {
                console.error("Error al obtener los juegos:", error);
            });
    }, []);

    return (
        <div className="ContenidoDelJuegos">
            <h2>Lista de Juegos</h2>
            <div className="juegos-grid">
                {juegos.map((juego) => (
                    <div key={juego.id_juego} className="juego-card">
                        <h3>{juego.nombre}</h3>
                        <a
                            href={`./juegos/${juego.id_juego}`}
                        >
                            <img
                                src={`./imagen/game/${juego.imagen}`}
                                alt={juego.nombre}
                                className="juego-img"
                            />
                        </a>
                    </div>
                ))}
            </div>
        </div>
    );
}

if (document.getElementById("MenuSouls")) {
    createRoot(document.getElementById("MenuSouls")).render(<MainMenu />);
}
