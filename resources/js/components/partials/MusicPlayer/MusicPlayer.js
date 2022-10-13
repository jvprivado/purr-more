import React from "react";
import { Container } from "react-bootstrap";
import { Tab, TabList, TabPanel, Tabs } from "react-tabs";
import "react-tabs/style/react-tabs.css";
import "./music-player.scss";

const MusicPlayer = () => {
    const scrollToForm = (e) => {
        e.preventDefault();
        document.getElementById("potmc").scrollIntoView();
    }

    return (
        <div>
            <div className="music-playerinner-wrap">
                <Container className="g-0">
                    <div className="music-player-inner-content-wrap">
                        <div className="music-player-content-top">
                            <h2>
                                Love the Purr, Feel the Purr,
                                <br />
                                Feed their Purr.
                            </h2>

                            <p>
                                Here at WHISKAS® we want to create a world where
                                all cats Purr More. Explore how you can connect
                                with your cat through their Purr. Listen to the
                                Purr More playlist to bring out the Purr in your
                                feline. Then,{" "}
                                <strong>
                                    enter their Purr into the{" "}
                                    <a href="#potmc" onClick={scrollToForm}>
                                        Purr of the Month competition
                                    </a>{" "}
                                    for your chance to win a $250 VISA e-Gift
                                    card*!
                                </strong>
                            </p>
                        </div>
                        <div className="music-player-tabs-wrap">
                            <Tabs>
                                <TabList>
                                    <Tab>
                                        <span>
                                            <i className="fa-brands fa-spotify" />
                                        </span>
                                        Listen to the Purr
                                    </Tab>
                                    <Tab>
                                        <span>
                                            <i className="fa-brands fa-youtube" />
                                        </span>
                                        Watch the Purr
                                    </Tab>
                                </TabList>

                                <TabPanel>
                                    <iframe
                                        src="https://open.spotify.com/embed/album/0HsGAAhh5MUNmaxb2rTT4g?utm_source=generator"
                                        title="spotify music player"
                                        width="564"
                                        // height="400"
                                        frameBorder="0"
                                        allowtransparency="true"
                                        allow="encrypted-media"
                                    />
                                </TabPanel>
                                <TabPanel>
                                    <div className="youtube-player-area">
                                        <iframe
                                            width="564"
                                            src="https://www.youtube.com/embed/bummzkrfRKo"
                                            title="YouTube video player"
                                            frameBorder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowFullScreen
                                        ></iframe>
                                    </div>
                                </TabPanel>
                            </Tabs>
                        </div>
                    </div>
                </Container>
            </div>
        </div>
    );
};

export default MusicPlayer;
