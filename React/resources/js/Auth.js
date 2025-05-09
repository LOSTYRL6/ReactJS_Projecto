document.addEventListener("DOMContentLoaded", function () {
    const tituloRef = document.querySelector(".tituloFuego");
    const Nombre = document.querySelector(".ColorName");

    gsap.to(tituloRef, {
        color: "#9C1C1C",
        repeat: -1,
        yoyo: true,
        duration: 1.5,
        ease: "power1.inOut",
    });
    gsap.to(Nombre, {
        color: "#9C1C1C",
        repeat: -1,
        yoyo: true,
        duration: 1.5,
        ease: "power1.inOut",
    });
});
