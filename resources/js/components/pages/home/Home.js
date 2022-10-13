import React from "react";
import ReactDOM from "react-dom";
import MainFooter from "../../Common/Footer/MainFooter";
import MainHeader from "../../Common/Header/MainHeader";
import Hero from "../../partials/Hero/Hero";
import MusicPlayer from "../../partials/MusicPlayer/MusicPlayer";
import PrevWinner from "../../partials/PrevWinner/PrevWinner";
import VideoContent from "../../partials/VideoContent/VideoContent";
import WhiskasBlog from "../../partials/WhiskasBlog/WhiskasBlog";
import WhiskasContest from "../../partials/WhiskasContest/WhiskasContest";
import WhiskasRange from "../../partials/WhiskasProducts/WhiskasRange";
import "./style.scss";
// import 'node_modules/react-modal-video/scss/modal-video.scss';
import "./video-popup.scss";
function Home() {
    return (
        <div>
            <MainHeader />
            <Hero />
            <MusicPlayer />
            <WhiskasContest />
            <VideoContent />
            <PrevWinner />
            <WhiskasRange />
            <WhiskasBlog />
            <MainFooter />
        </div>
    );
}

export default Home;

if (document.getElementById("example")) {
    ReactDOM.render(<Home />, document.getElementById("example"));
}
