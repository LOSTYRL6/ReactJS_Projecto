document.addEventListener("DOMContentLoaded", function () {
    const fixedNavbar = document.getElementById("navbarFixed");
    const fixedMenu = document.getElementById("fixedMenu");
    const mobileMenu = document.getElementById("mobileMenu");
    const UserIcon = document.querySelector(".TuIcono");
    const OpcionDeIcono = document.querySelector(".OpciondeUsuario");

    let isFixedMenuOpen = false;
    let isMobileMenuOpen = false;

    let visible = false;

    // GSAP (GreenSock Animation Platform) es una potente librería de animaciones que nos permite controlar varios aspectos visuales de los elementos en el DOM de manera eficiente y fluida.
    // Algunas de las funciones clave que hemos utilizado son:

    // 1. gsap.to(): Anima un elemento **hacia un estado específico**. Se usa para indicar qué propiedades CSS del elemento se deben cambiar y a qué valores, junto con la duración y el tipo de suavizado.
    // Ejemplo:
    // gsap.to(elemento, { prop1: valor1, prop2: valor2, duration: tiempo, ease: "easeEffect" });

    // 2. gsap.fromTo(): Anima un elemento **desde un valor inicial hasta un valor final**. Es útil cuando se necesita especificar tanto el punto de inicio como el de final de la animación.
    // Ejemplo:
    // gsap.fromTo(elemento, { prop1: valorInicial1, prop2: valorInicial2 }, { prop1: valorFinal1, prop2: valorFinal2, duration: tiempo, ease: "easeEffect" });

    // 3. Propiedades comunes para animar:
    // - **x, y**: Controlan el desplazamiento horizontal y vertical del elemento. "x: '100%'" lo mueve completamente a la derecha y el posicion incial es 0%.
    // - **scaleX, scaleY**: Controlan la escala del elemento en los ejes X y Y. "scaleY: 0" lo colapsa verticalmente, "scaleY: 1" lo restaura.
    // - **opacity**: Controla la opacidad del elemento, de 0 (invisible) a 1 (totalmente visible).
    // - **rotation**: Rota el elemento en grados. Ejemplo: "rotation: 180" gira 180 grados.
    // - **ease**: Controla el tipo de transición de la animación. Ejemplo: "power2.out", "easeOut", "linear".

    // En nuestro código, cuando el usuario hace clic en el icono, usamos `gsap` para animar el contenedor de opciones de usuario:
    // - Primero, con gsap.fromTo() animamos la entrada del contenedor de opciones, **expandiéndolo desde la parte superior** con `scaleY: 0` y `opacity: 0`, a su tamaño original con `scaleY: 1` y `opacity: 1`.
    // - Luego, si el contenedor ya está visible, usamos `gsap.to()` para animar su ocultación: **colapsamos** el contenedor con `scaleY: 0` y `opacity: 0` y una vez que termina la animación, lo ocultamos con `display: "none"`.

    if (UserIcon && OpcionDeIcono) {
        let visible = false;

        UserIcon.addEventListener("click", () => {
            if (!visible) {
                OpcionDeIcono.style.display = "flex";
                gsap.fromTo(
                    OpcionDeIcono,
                    { scaleY: 0, opacity: 0, transformOrigin: "top" },
                    { scaleY: 1, opacity: 1, duration: 0.4, ease: "power2.out" }
                );
            } else {
                gsap.to(OpcionDeIcono, {
                    scaleY: 0,
                    opacity: 0,
                    duration: 0.4,
                    ease: "power2.in",
                    onComplete: () => {
                        OpcionDeIcono.style.display = "none";
                    },
                });
            }
            visible = !visible;
        });
    }
    // Scroll: mostrar navbar fijo
    window.addEventListener("scroll", () => {
        if (window.scrollY > 145) {
            gsap.to(fixedNavbar, { y: 0, duration: 0.65, ease: "power2.out" });
        } else {
            gsap.to(fixedNavbar, { y: -145, duration: 0.2, ease: "power2.in" });
        }
    });

    // Mostrar/ocultar menú móvil solo en pantallas pequeñas
    window.toggleMenu = function () {
        if (window.innerWidth >= 768) return; // NO hacer nada en pantallas grandes

        isMobileMenuOpen = !isMobileMenuOpen;
        if (isMobileMenuOpen) {
            gsap.fromTo(
                mobileMenu,
                { opacity: 0, y: -20 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.4,
                    ease: "power2.out",
                }
            );
            mobileMenu.style.display = "block";
        } else {
            mobileMenu.style.display = "none";
        }
    };

    // Menú fijo (pantalla pequeña)
    window.toggleFixedMenu = function () {
        isFixedMenuOpen = !isFixedMenuOpen;
        if (isFixedMenuOpen) {
            gsap.fromTo(
                fixedMenu,
                { x: "100%" },
                {
                    x: "0%",
                    duration: 0.5,
                    ease: "power2.out",
                }
            );
            fixedMenu.style.display = "flex";
        } else {
            closeFixedMenu();
        }
    };

    window.closeFixedMenu = function () {
        gsap.to(fixedMenu, {
            x: "100%",
            duration: 0.5,
            ease: "power2.inOut",
            onComplete: () => {
                fixedMenu.style.display = "none";
                isFixedMenuOpen = false;
            },
        });
    };
});
