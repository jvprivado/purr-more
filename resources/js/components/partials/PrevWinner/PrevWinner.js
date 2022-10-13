import React, { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { default as titleCatIcon } from "./catTitleIcon.svg";
import "./prev-winner.scss";
import Api from "../../Common/Api";

const PrevWinner = () => {
    const [prevWdata, setPrevWdata] = useState([]);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/previous-winners`;
        const winnerData = async () => {
            await Api
                .get(url)
                .then((response) => {
                    setPrevWdata(response.data?.previousWinners);
                })
                .catch((err) => {
                    // todo : show error message
                    // setErrData(err);
                    console.log(err);
                });
        };

        winnerData();
    }, []);
    return (
        <div className="prev-winner-content-main-wrap">
            <Container className="g-0">
                {prevWdata.length !== 0 ? (
                    <div className="prev-winner-content-inner-wrap">
                        <div className="prev-winner-content-title">
                            <h3>Our Previous Winners</h3>
                        </div>
                        <div className="prev-winner-list-wrap">
                            {prevWdata?.map((prevWin, i) => (
                                <div className="prev-winner-video-wrap" key={i}>
                                    <div className="prev-content-bottom-title">
                                        <img src={titleCatIcon} />
                                        <span>Purr of the Month – {prevWin.winningTime}</span>
                                    </div>
                                    <h3>
                                        {prevWin.cat_name} and the owner{" "}
                                        {prevWin.name}
                                    </h3>
                                </div>
                            ))}
                        </div>
                    </div>) : ("")}
            </Container>
        </div>
    );
};

export default PrevWinner;
