import React  from "react";
import { createRoot } from "react-dom/client";
export default function Hola(){
return(
    <>
    <h1>Hola Mi Primer Componente</h1>
    </>
)
}
if(document.getElementById('app')){
    createRoot(document.getElementById('app')).render(<Hola />)
}
