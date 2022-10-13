import React, { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import ReactPlayer from "react-player/lazy";
import "react-responsive-modal/styles.css";
import Slider from "react-slick/lib/slider";
import TextTruncate from "react-text-truncate";
import Api from "../../Common/Api";
import "./video-player-content.scss";

const VideoContent = () => {
    const [videoGellery, setVideoGellery] = useState([]);
    const [currentVideo, setCurrentVideo] = useState([]);
    const [activeVideo, setActiveVideo] = useState(0);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/featured-users`;
        const videoData = async () => {
            await Api.get(url)
                .then((response) => {
                    setVideoGellery(response.data?.featuredUsers);
                    setCurrentVideo(response.data?.featuredUsers[0]);
                })
                .catch((err) => {
                    // todo : show error message
                    // setErrData(err);
                    console.log(err);
                });
        };

        videoData();
    }, []);

    const settings = {
        dots: true,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    initialSlide: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    };

    const [btnHide, setBtnHide] = useState(false);

    if (videoGellery.length !== 0)
        return (
            <div className="video-player-content-main-wrap">
                <Container className="g-0">
                    <div className="video-player-content-title">
                        <h3>See How Others Purr</h3>
                        <p>
                            Get inspired by other Purrs by scrolling through
                            previous entries below. <br /> Submit your cat's Purr
                            for your chance to be featured!
                        </p>
                    </div>

                    <div className="play-video-content-slider-main-wrap">
                        <div>
                            <div className="video-player-top-view">
                                <div className="view-video-content-single-item">
                                    <div className="view-video-content-left">
                                        <ReactPlayer
                                            controls={true}
                                            playing={btnHide}
                                            playIcon={
                                                <div
                                                    className={
                                                        btnHide
                                                            ? "video-play-btn"
                                                            : "video-play-btn"
                                                    }
                                                >
                                                    <button
                                                        onClick={() => {
                                                            setBtnHide(!btnHide);
                                                        }}
                                                    >
                                                        <i className="fa-solid fa-play text-white"></i>
                                                    </button>
                                                </div>
                                            }
                                            light={currentVideo?.thumbnail}
                                            url={[
                                                {
                                                    src: `${currentVideo?.pur}`,
                                                    type: "video/mp4",
                                                },
                                            ]}
                                        />
                                        <TextTruncate
                                            style={{
                                                color: "#780068",
                                                padding: "10px 25px",
                                            }}
                                            line={2}
                                            element="h3"
                                            truncateText="…"
                                            text={
                                                currentVideo?.cat_names +
                                                "’s Purr of the Month Entry"
                                            }
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="video-list-slider">
                                <div className="video-list-slider-title">
                                    <div className="video-list-slider-title-left">
                                        <h4>Video Gallery</h4>
                                    </div>
                                    <div className="video-list-slider-title-right">
                                        <span>
                                            {videoGellery.length} videos
                                        </span>
                                    </div>
                                </div>
                                <div className="slider-items-main-wrap">
                                    <Slider {...settings}>
                                        {videoGellery.map(
                                            (video, index) => {
                                                return (
                                                    <div
                                                        key={index}
                                                        onClick={() => {
                                                            setActiveVideo(index);
                                                            setCurrentVideo(video);
                                                            setBtnHide(false);
                                                        }}
                                                    >
                                                        <div
                                                            className={
                                                                activeVideo ===
                                                                    index
                                                                    ? `single-slide-video-item false ${activeVideo}`
                                                                    : "single-slide-video-item aaa"
                                                            }
                                                        >
                                                            <div className="video-slider-image-view">
                                                                <img src={video.thumbnail} alt="Video thumbnail" />
                                                            </div>
                                                            <div className="single-video-content-bottom-wrap">
                                                                <div className="single-video-content-top">
                                                                    <TextTruncate
                                                                        line={2}
                                                                        element="h4"
                                                                        truncateText="…"
                                                                        text={
                                                                            video.cat_names +
                                                                            "’s Purr of the Month Entry"
                                                                        }
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                );
                                            }
                                        )}{" "}
                                    </Slider>
                                </div>
                            </div>
                        </div>
                    </div>
                </Container>
            </div>
        );
    else return "";
};

export default VideoContent;
