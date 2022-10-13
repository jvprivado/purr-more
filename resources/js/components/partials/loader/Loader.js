import React from "react";
import "./loader.scss";
import loaderIcon from "./loader.svg";

const Loader = () => {
    return (
        <div className="main-loader-area-wrap">
            <div>
                <img src={loaderIcon}/> <br/>
                <h3>Submitting your Purr...</h3>
            </div>
        </div>
    );
};

export default Loader;
