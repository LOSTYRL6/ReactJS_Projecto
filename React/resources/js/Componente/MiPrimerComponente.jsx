import React, { useState } from "react";
import { createRoot } from "react-dom/client";
import '../../css/prueba.css';
import gsap from 'gsap';
import { useGSAP } from '@gsap/react';

gsap.registerPlugin(useGSAP);
export default function Hola() {
  const [color, setColor] = useState("black");

  const cambiarColor = () => {
    setColor(color === "black" ? "red" : "black");
  };

  return (
    <>
      <h1>
        Hola Mi Primer Componente{" "}
        <span
          className={`xddd ${color === "black" ? "xddd-black" : "xddd-red"}`}
          onClick={cambiarColor}
        >
          XDDD
        </span>
      </h1>
    </>
  );
}

if (document.getElementById("app2")) {
  createRoot(document.getElementById("app2")).render(<Hola />);
}
