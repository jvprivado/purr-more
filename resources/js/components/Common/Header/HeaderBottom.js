import React, { useState } from "react";
import { Container, Nav, Navbar, NavDropdown } from "react-bootstrap";
import mainLogo from "./img/headerMain.svg";

const HeaderBottom = () => {
    const [toggle, setToggle] = useState(false);

    function showMenu() {
        setToggle((toggle) => !toggle);
        document.body.style.overflow = toggle ? "visible" : "hidden";
    }

    return (
        <div className="header-bottom-main-wrap">
            <Navbar bg="light" expand="lg">
                <Container>
                    <div className="main-header-area-wrap">
                        <div className="header-left">
                            <a
                                href="https://www.whiskas.com.au"
                                target="_blank"
                            >
                                <img src={mainLogo} alt="Whiskas Logo" />
                            </a>
                        </div>
                        <div className="header-right">
                            <div className="header-top-nav-items">
                                <ul>
                                    <li>
                                        <a
                                            href="https://www.whiskas.com.au/faqs/"
                                            target="_blank"
                                        >
                                            FAQ
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.whiskas.com.au/contact-us/"
                                            target="_blank"
                                        >
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div className="">
                                <Navbar.Toggle aria-controls="basic-navbar-nav">
                                    <div
                                        className="navbar-main-menu-wrap"
                                        onClick={showMenu}
                                    >
                                        {toggle ? (
                                            <span className="show-navbar-toggle-icon">
                                                <span></span>

                                                <span></span>
                                            </span>
                                        ) : (
                                            <span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </span>
                                        )}
                                    </div>
                                </Navbar.Toggle>
                                <Navbar
                                    className={
                                        toggle
                                            ? "navbar-show-toggle"
                                            : "navbar-hide-toggle"
                                    }
                                >
                                    <Nav className="m-auto">
                                        <NavDropdown
                                            title="Our Products"
                                            
                                            target="_blank"
                                        >
                                            <a
                                                href="https://www.whiskas.com.au/our-products/kitten/"
                                                target="_blank"
                                                className="dropdown-item"
                                            >
                                                Kitten
                                            </a>
                                            <a
                                                href="https://www.whiskas.com.au/our-products/adult/"
                                                target="_blank"
                                                className="dropdown-item"
                                            >
                                                Adult
                                            </a>
                                            <a
                                                href="https://www.whiskas.com.au/our-products/senior/"
                                                target="_blank"
                                                className="dropdown-item"
                                            >
                                                Senior
                                            </a>
                                            <a
                                                href="https://www.whiskas.com.au/our-products/milk-plus/"
                                                target="_blank"
                                                className="dropdown-item"
                                            >
                                                Milk Food
                                            </a>
                                        </NavDropdown>{" "}
                                        <NavDropdown
                                            title="Blog"
                                            
                                        >
                                            <a
                                                className="dropdown-item"
                                                href="https://www.whiskas.com.au/blog"
                                                target="_blank"
                                            >
                                                Health & Nutrition
                                            </a>{" "}
                                            <a
                                                className="dropdown-item"
                                                href="https://www.whiskas.com.au/blog"
                                                target="_blank"
                                            >
                                                Behaviour
                                            </a>{" "}
                                            <a
                                                className="dropdown-item"
                                                href="https://www.whiskas.com.au/blog"
                                                target="_blank"
                                            >
                                                Care
                                            </a>{" "}
                                            <a
                                                className="dropdown-item"
                                                href="https://www.whiskas.com.au/blog"
                                                target="_blank"
                                            >
                                                Considering a Cat
                                            </a>
                                        </NavDropdown>
                                        <a
                                            className="nav-link"
                                            href="https://www.whiskas.com.au/breeds/breeds-a-z/"
                                            target="_blank"
                                        >
                                            Cat Breeds
                                        </a>
                                    </Nav>
                                </Navbar>
                            </div>
                        </div>
                    </div>
                </Container>
            </Navbar>
        </div>
    );
};

export default HeaderBottom;
