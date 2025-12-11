import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import gsap from "gsap";
import { useGSAP } from "@gsap/react";
import axios from "axios";

import "../../css/MenuSouls.css";

gsap.registerPlugin(useGSAP);

export default function ComentariosDeLosUsuarios() {
    const [juego, setJuego] = useState(null);
    const [pagina, setPagina] = useState(null);
    const [user, setUser] = useState(null);
    const [comentario, setComentario] = useState("");

    useEffect(() => {
        const comentariosDiv = document.getElementById(
            "ComentariosDeLosUsuarios"
        );
        if (comentariosDiv) {
            try {
                setJuego(JSON.parse(comentariosDiv.dataset.juego));
                setPagina(JSON.parse(comentariosDiv.dataset.pagina));
                setUser(JSON.parse(comentariosDiv.dataset.user));
            } catch (error) {
                console.error("Error parsing data attributes:", error);
            }
        }
    }, []);

    const userImage =
        user && user.imagen_icono
            ? `../../${user.imagen_icono}`
            : "../../imagen/logo/mini.png";

    const enviarComentario = () => {
        if (!comentario.trim()) {
            alert("Escribe un comentario antes de enviarlo.");
            return;
        }

        axios
            .post("api/comentario", {
                comentario: comentario,
                id_usuario: user.id_usuario,
                id_pagina: pagina.id_pagina,
            })
            .then((response) => {
                console.log(response.data);
                alert("Comentario enviado con éxito.");
                setComentario(""); // Limpiar el textarea
            })
            .catch((error) => {
                console.error("Error al enviar el comentario:", error);
                alert("Hubo un error al enviar el comentario.");
            });
    };

    return (
        <div className="ComentariosHechoUsuarios">
            {user ? (
                <>
                    <img
                        src={userImage}
                        alt={`${user.nombre || user.name} icono`}
                    />
                    <textarea
                        placeholder="Escribe tu comentario aquí..."
                        value={comentario}
                        onChange={(e) => setComentario(e.target.value)}
                    ></textarea>
                    <button onClick={enviarComentario}>Enviar</button>
                </>
            ) : (
                <h1
                    style={{
                        color: "red",
                        fontWeight: "bold",
                        textAlign: "center",
                        fontSize: "35px",
                    }}
                >
                    Debes registrarte o iniciar sesión para poder comentar.
                </h1>
            )}
        </div>
    );
}

if (document.getElementById("ComentariosDeLosUsuarios")) {
    createRoot(document.getElementById("ComentariosDeLosUsuarios")).render(
        <ComentariosDeLosUsuarios />
    );
}
