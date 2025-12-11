import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import axios from "axios";

import "../../css/MenuSouls.css";

export default function ComentariosSeccion() {
    const [juego, setJuego] = useState(null);
    const [pagina, setPagina] = useState(null);
    const [user, setUser] = useState(null);
    const [comentarios, setComentarios] = useState([]);
    // replyModes ahora es objeto con índice → { reply: bool, see: bool }
    const [replyModes, setReplyModes] = useState({});
    const [replyTexts, setReplyTexts] = useState({});

    useEffect(() => {
        const comentariosDiv = document.getElementById("ComentariosSeccion");
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

    useEffect(() => {
        if (pagina && pagina.id_pagina) {
            axios
                .get(`api/comentario?id_pagina=${pagina.id_pagina}`)
                .then((response) => {
                    setComentarios(response.data);
                })
                .catch((error) => {
                    console.error("Error al obtener los comentarios:", error);
                });
        }
    }, [pagina]);

    const abrirCerrarModo = (index, tipo) => {
        setReplyModes((prev) => {
            const estadoActual = prev[index] || { reply: false, see: false };
            return {
                ...prev,
                [index]: {
                    ...estadoActual,
                    [tipo]: !estadoActual[tipo], // Alterna true/false
                },
            };
        });
    };

    const handleReplyChange = (index, text) => {
        setReplyTexts((prev) => ({
            ...prev,
            [index]: text,
        }));
    };

    const enviarReply = (index, parentId) => {
        const texto = replyTexts[index];
        if (!texto || texto.trim() === "") {
            alert("Escribe un comentario.");
            return;
        }

        axios
            .post("/comentarios/reply", {
                comentario: texto,
                parent_id: parentId,
                id_pagina: pagina.id_pagina,
            })
            .then(() => {
                window.location.reload();
            })
            .catch((err) => {
                console.error("Error enviando reply:", err);
                alert("Error enviando el comentario.");
            });
    };

    const renderComentario = (comentario, nivel = 0, nombrePadre = null) => {
        const modos = replyModes[comentario.id_comentario] || {
            reply: false,
            see: false,
        };

        return (
            <div
                key={comentario.id_comentario}
                style={{ marginLeft: `15px`, width: `100%` }}
            >
                <div className="comentario-item">
                    <div className="comentario-user">
                        <strong>
                            {comentario.usuario?.nombre || "Usuario"}
                        </strong>
                        <img
                            src={
                                comentario.usuario?.imagen_icono
                                    ? `../../${comentario.usuario.imagen_icono}`
                                    : "../../imagen/logo/mini.png"
                            }
                            alt="icono"
                            className="icono-usuario"
                        />
                    </div>
                    <div className="comentario-text">
                        <p>{comentario.comentario}</p>
                        {nombrePadre && (
                            <p
                                style={{
                                    fontSize: "0.8em",
                                    color: "red",
                                    marginTop: "4px",
                                }}
                            >
                                En respuesta a: <strong>{nombrePadre}</strong>
                            </p>
                        )}
                    </div>

                    <div className="SeccionDeResponderYVEr">
                        {user && (
                            <button
                                className="ResponderReply"
                                onClick={() =>
                                    abrirCerrarModo(
                                        comentario.id_comentario,
                                        "reply"
                                    )
                                }
                            >
                                <img
                                    src="../../../public/imagen/logo/text-message.png"
                                    alt=""
                                />
                                Reply
                            </button>
                        )}

                        {comentario.respuestas?.length > 0 && (
                            <button
                                className="Responder"
                                onClick={() =>
                                    abrirCerrarModo(
                                        comentario.id_comentario,
                                        "see"
                                    )
                                }
                            >
                                <img
                                    src="../../../public/imagen/logo/visible.png"
                                    alt=""
                                />
                                Ver respuestas
                            </button>
                        )}
                    </div>
                </div>

                {modos.reply && (
                    <div
                        className="ResponderComentario"
                        style={{ marginTop: "5px" }}
                    >
                        <input
                            type="text"
                            value={replyTexts[comentario.id_comentario] || ""}
                            onChange={(e) =>
                                handleReplyChange(
                                    comentario.id_comentario,
                                    e.target.value
                                )
                            }
                        />
                        <button
                            className="enviar-reply"
                            onClick={() =>
                                enviarReply(
                                    comentario.id_comentario,
                                    comentario.id_comentario
                                )
                            }
                        >
                            Enviar
                        </button>
                    </div>
                )}

                {modos.see &&
                    comentario.respuestas &&
                    comentario.respuestas.length > 0 && (
                        <div
                            className="ver-replies"
                            style={{ marginTop: "5px" }}
                        >
                            {comentario.respuestas.map((respuesta) =>
                                renderComentario(
                                    respuesta,
                                    nivel + 1,
                                    comentario.usuario?.nombre
                                )
                            )}
                        </div>
                    )}
            </div>
        );
    };

    return (
        <div className="ComentariosSeccion2">
            {comentarios.length > 0 ? (
                comentarios.map((comentario) => renderComentario(comentario))
            ) : (
                <p style={{ color: "#aaa", textAlign: "center" }}>
                    No hay comentarios aún.
                </p>
            )}
        </div>
    );
}

if (document.getElementById("ComentariosSeccion")) {
    createRoot(document.getElementById("ComentariosSeccion")).render(
        <ComentariosSeccion />
    );
}
