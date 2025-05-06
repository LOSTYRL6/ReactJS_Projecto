import React, { useState, useEffect, useRef } from "react";
import { createRoot } from "react-dom/client";
import "../../css/prueba.css";
import gsap from "gsap";
import { useGSAP } from "@gsap/react";

gsap.registerPlugin(useGSAP);

export default function Navbar() {
    const fixedNavbarRef = useRef();
    const fixedMenuRef = useRef();
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const [isFixedMenuOpen, setIsFixedMenuOpen] = useState(false);
    const [isMobile, setIsMobile] = useState(window.innerWidth < 768);

    useEffect(() => {
        const handleScroll = () => {
            if (window.scrollY > 125) {
                gsap.to(fixedNavbarRef.current, {
                    y: 0,
                    duration: 0.65,
                    ease: "power2.out",
                });
            } else {
                gsap.to(fixedNavbarRef.current, {
                    y: -125,
                    duration: 0.2,
                    ease: "power2.in",
                });
            }
        };

        const handleResize = () => {
            setIsMobile(window.innerWidth < 768);
        };

        window.addEventListener("scroll", handleScroll);
        window.addEventListener("resize", handleResize);

        return () => {
            window.removeEventListener("scroll", handleScroll);
            window.removeEventListener("resize", handleResize);
        };
    }, []);

    const toggleMenu = () => {
        setIsMenuOpen(!isMenuOpen);
    };

    const toggleFixedMenu = () => {
        setIsFixedMenuOpen(!isFixedMenuOpen);
    };
    useEffect(() => {
        if (isMobile) {
            if (isFixedMenuOpen) {
                gsap.fromTo(
                    fixedMenuRef.current,
                    { x: "100%" },
                    {
                        x: "0%",
                        duration: 0.5,
                        ease: "power2.out",
                        display: "flex",
                    }
                );
            } else {
                gsap.to(fixedMenuRef.current, {
                    x: "100%",
                    duration: 0.4,
                    ease: "power2.in",
                    onComplete: () => {
                        if (fixedMenuRef.current)
                            fixedMenuRef.current.style.display = "none";
                    },
                });
            }
        }
    }, [isFixedMenuOpen, isMobile]);

    return (
        <>
            {/* NAVBAR PRINCIPAL */}
            <nav className="NavbarSouls">
                <div className="Logo">
                    <img src="./imagen/logo/SoulsHUBPNG.png" alt="Logo" />
                    <button>Iniciar Sesión</button>
                    <button>Registrarse</button>
                </div>

                {!isMobile && (
                    <div className="Menu">
                        <h1>Home</h1>
                        <h1>Sobre Nosotros</h1>
                    </div>
                )}

                {isMobile && (
                    <div className="BurgerMenu" onClick={toggleMenu}>
                        <span className="burger-icon"></span>
                    </div>
                )}
            </nav>

            {/* MENÚ RESPONSIVE DEL NAVBAR PRINCIPAL */}
            {isMobile && isMenuOpen && (
                <div className="MobileMenu">
                    <h1>Home</h1>
                    <h1>Sobre Nosotros</h1>
                </div>
            )}

            {/* NAVBAR FIJO QUE APARECE AL HACER SCROLL */}
            <nav className="NavbarFixed" ref={fixedNavbarRef}>
                <div className="MenuFixed">
                    {!isMobile ? (
                        <>
                            <h1>Home</h1>
                            <h1>Sobre Nosotros</h1>
                        </>
                    ) : (
                        <div className="BurgerMenu" onClick={toggleFixedMenu}>
                            <span className="burger-icon"></span>
                        </div>
                    )}
                </div>
                <div className="AuthFixed">
                    <button>Iniciar Sesión</button>
                    <button>Registrarse</button>
                </div>
            </nav>

            {/* MENÚ SLIDE-IN DEL NAVBAR FIJO */}
            <div
                className="MobileMenuFixed"
                ref={fixedMenuRef}
                style={{ display: isFixedMenuOpen ? "flex" : "none" }}
            >
                <button
                    className="CloseButton"
                    onClick={() => {
                        if (fixedMenuRef.current) {
                            gsap.to(fixedMenuRef.current, {
                                x: "100%",
                                duration: 0.5,
                                ease: "power2.inOut",
                                onComplete: () => setIsFixedMenuOpen(false),
                            });
                        }
                    }}
                >
                    Volver
                </button>
                <h1>Home</h1>
                <h1>Sobre Nosotros</h1>
            </div>
        </>
    );
}

if (document.getElementById("navbar")) {
    createRoot(document.getElementById("navbar")).render(<Navbar />);
}
