import React from "react";
import heroBanner from "./hero-desktop.jpg";
import "./hero.scss";

const Hero = () => {
    return (
        <div className="hero-main-area-wrap">
            <>
                <div
                    className="hero-inner-wrap"
                    style={{ backgroundImage: `url(${heroBanner})` }}
                ></div>
            </>
        </div>
    );
};

export default Hero;
