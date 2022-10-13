import React from "react";
import {Accordion, Button, Col, Container, Row} from "react-bootstrap";
import footerLogo from "./footer-logo.png";
import "./footer.scss";

const MainFooter = () => {
    const options = [
        {value: "AU", label: "Australia"},
        {value: "US", label: "United States"},
    ];
    return (
        <div>
            {/*OneTrust Cookies Settings button start*/}
            <div id="ot-sdk-cookie-policy"></div>
            <button id="ot-sdk-btn" className="ot-sdk-show-settings"> Cookie Settings </button>
            {/*OneTrust Cookies Settings button end*/}
            <div className="footer-top-main-wrap">
                <Container className="g-0">
                    <div className="footer-top-inner-wrap">
                        <div className="footer-mobile-responsive-hide">
                            <Row>
                                <Col lg={3}>
                                    <div className="footer-top-single-item">
                                        <img alt="Whiskas Logo" src={footerLogo}/>
                                    </div>
                                </Col>
                                <Col lg={6}>
                                    <Row>
                                        <Col lg={6}>
                                            <div className="footer-top-single-item">
                                                <h5>Our Products</h5>
                                                <ul>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/our-products/kitten/"
                                                            target="_blank"
                                                        >
                                                            Kitten
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/our-products/adult/"
                                                            target="_blank"
                                                        >
                                                            Adult
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/our-products/senior/"
                                                            target="_blank"
                                                        >
                                                            Senior
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/our-products/milk-plus/"
                                                            target="_blank"
                                                        >
                                                            Milk Food
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </Col>
                                        <Col lg={6}>
                                            <div className="footer-top-single-item">
                                                <h5>About Us</h5>
                                                <ul>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/about-us/"
                                                            target="_blank"
                                                        >
                                                            About WHISKAS®
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="https://www.whiskas.com.au/site-owner/"
                                                            target="_blank"
                                                        >
                                                            Site Owner Info
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </Col>
                                    </Row>
                                </Col>
                                <Col lg={3}>
                                    <div className="footer-top-single-item">
                                        <h6>Have questions?</h6>
                                        <h5>Send us a message.</h5>
                                        <div className="footer-select-country-wrap">
                                            <a href="https://www.whiskas.com.au/contact-us" target="_blank">
                                                <Button >Contact Us</Button>
                                            </a>
                                        </div>
                                    </div>
                                </Col>
                            </Row>
                        </div>
                        <div className="footer-mobile-responsive-show">
                            <div className="footer-logo-content-mobile">
                                <div className="footer-top-single-item top">
                                    <img src={footerLogo} alt="Footer Logo" />
                                    <div className="">
                                        <h6>Have questions?</h6>
                                        <h3>Send us a message.</h3>
                                        <div className="footer-select-country-wrap">
                                            <a href="https://www.whiskas.com.au/contact-us" target="_blank">
                                                <Button >Contact Us</Button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <Accordion>
                                <Accordion.Item eventKey="0">
                                    <Accordion.Header>
                                        <h3>Our Products</h3>
                                    </Accordion.Header>
                                    <Accordion.Body>
                                        <div className="footer-top-single-item">
                                            <ul>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/our-products/kitten/"
                                                        target="_blank"
                                                    >
                                                        Kitten
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/our-products/adult/"
                                                        target="_blank"
                                                    >
                                                        Adult
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/our-products/senior/"
                                                        target="_blank"
                                                    >
                                                        Senior
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/our-products/milk-plus/"
                                                        target="_blank"
                                                    >
                                                        Milk Food
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                                <Accordion.Item eventKey="1">
                                    <Accordion.Header>
                                        <h3>About Us</h3>
                                    </Accordion.Header>
                                    <Accordion.Body>
                                        <div className="footer-top-single-item">
                                            <ul>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/about-us/"
                                                        target="_blank"
                                                    >
                                                        About WHISKAS®
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="https://www.whiskas.com.au/site-owner/"
                                                        target="_blank"
                                                    >
                                                        Site Owner Info
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </Accordion.Body>
                                </Accordion.Item>
                            </Accordion>
                        </div>
                        <div className="footer-social-mobile-hide">
                            <div className="foter-social-area-wrap">
                                <a href="https://www.facebook.com/whiskasAU" target="_blank">
                                    <i className="fa-brands fa-facebook-f"></i>
                                </a>
                                <a
                                    href="https://www.youtube.com/user/WhiskasAU"
                                    target="_blank"
                                >
                                    <i className="fa-brands fa-youtube"></i>
                                </a>
                                <a
                                    href="https://www.instagram.com/whiskasaustralia/"
                                    target="_blank"
                                >
                                    <i className="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </Container>
            </div>
            <div className="footer-social-mobile-show">
                <div className="foter-social-area-wrap">
                    <a href="https://www.facebook.com/whiskasAU" target="_blank">
                        <i className="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/user/WhiskasAU" target="_blank">
                        <i className="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://www.instagram.com/whiskasaustralia/" target="_blank">
                        <i className="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div className="footer-middle-main-wrap">
                <div className="footer-middle-inner-wrap">
                    <a
                        href="https://www.waltham.com/about-waltham/pets-and-the-coronavirus/"
                        target="_blank"
                    >
                        Pets and COVID-19 <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.whiskas.com.au/site-owner" target="_blank">
                        Site Owner <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.mars.com/privacy-policy-australia" target="_blank">
                        Privacy Policy <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.mars.com/legal-australia" target="_blank">
                        Legal <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.mars.com/cookies-english" target="_blank">
                        Cookies Notice <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a
                        href="https://www.mars.com/about/policies-and-practices/ca-supply-chain-transparency-act"
                        target="_blank"
                    >
                        Supply Chain Transparency
                        <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.mars.com/accessibility" target="_blank">
                        Accessibility <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a
                        href="https://www.mars.com/modern-slavery-act"
                        target="_blank"
                    >
                        Modern Slavery Act <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.mars.com/legal-australia" target="_blank">
                        Copyright <i className="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="https://www.whiskas.com.au/purr-of-the-month-terms" target="_blank">
                        Terms and Conditions <i className="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div className="footer-bottom-content-main-wrap">
                <p>
                    © 2022 Mars or Affiliates. Tray shape is a trademark. Other trademarks
                    are property of their respective owners.
                </p>
            </div>
        </div>
    );
};

export default MainFooter;
