import React, {useEffect} from "react";
import {Container} from "react-bootstrap";
import {Link} from "react-router-dom";
import MainFooter from "../../Common/Footer/MainFooter";
import MainHeader from "../../Common/Header/MainHeader";
import successfulImage from "./successful.png";
import "./successfull.scss";

const Successful = () => {

    useEffect(()=>{
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'entrySuccess'
        });
    });

    return (
        <div>
            <MainHeader/>
            <div className="">
                <Container>
                    <div className="successful-page">
                        <img src={successfulImage} />
                        <div className="successful-content-wrap">
                            <h4>Your Purr has been delivered!</h4>
                            <p>
                                Thanks for participating in Purr of the Month with WHISKAS®.
                                We'll be in touch if you are chosen as the winner of the month.
                                In the meantime, keep an eye out on the <a href="https://purrmore.whiskas.com.au" target="_blank">competition page</a> to see if you've been featured in our 'See How Others Purr' gallery.<br/>
                                Good luck!
                            </p>
                            <Link to="/">Back to Purr More page</Link>
                        </div>
                    </div>
                </Container>
            </div>
            <MainFooter/>
        </div>
    );
};

export default Successful;
