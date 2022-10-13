import React, { useEffect, useState } from "react";
import ReactPlayer from "react-player";
import Modal from "react-responsive-modal";
import Slider from "react-slick/lib/slider";
import TextTruncate from "react-text-truncate";
import Api from "../../Common/Api";
import loaderIcon from "../loader/loader.svg";

const VideoGallery2 = () => {
    const [isOpen, setOpen] = useState(false);
    const [videoGellery, setVideoGellery] = useState([]);
    const [currentVideo, setCurrentVideo] = useState([]);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/featured-users`;
        const videoData = async () => {
            await Api.get(url)
                .then((response) => {
                    setVideoGellery(response.data?.featuredUsers);
                })
                .catch((err) => {
                    // todo : show error message
                    // setErrData(err);
                    console.log(err);
                });
        };

        videoData().then(() => {
            setCurrentVideo(videoGellery[0]);
        });
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
    return (
        <div>
            {videoGellery.length !== 0 ? (
                <div>
                    <Modal open={isOpen} onClose={() => setOpen(false)} center>
                        <ReactPlayer
                            playing
                            controls={true}
                            url={[
                                {
                                    src: `${currentVideo?.pur}`,
                                    type: "video/mp4",
                                },
                            ]}
                        />
                    </Modal>
                    <div className="video-list-slider">
                        <div className="video-list-slider-title">
                            <div className="video-list-slider-title-left">
                                <h4>Video Gallery</h4>
                            </div>
                            <div className="video-list-slider-title-right">
                                <span>{videoGellery.length} videos</span>
                            </div>
                        </div>
                        <div className="slider-items-main-wrap">
                            <Slider {...settings}>
                                {videoGellery.map((video, index) => {
                                    return (
                                        <div
                                            key={index}
                                            className="single-slide-video-item"
                                            onClick={() => {
                                                setOpen(true);
                                                setCurrentVideo(video);
                                            }}
                                        >
                                            <div className="video-slider-image-view">
                                                <img
                                                    src={video.thumbnail}
                                                    alt="Video thumbnail"
                                                />
                                            </div>
                                            <div className="single-video-content-bottom-wrap">
                                                <div className="single-video-content-top">
                                                    <TextTruncate
                                                        line={2}
                                                        element="h4"
                                                        truncateText="…"
                                                        text={
                                                            video.firstname +
                                                            "’s Purr of the Month Entry"
                                                        }
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    );
                                })}{" "}
                            </Slider>
                        </div>
                    </div>
                </div>
            ) : (
                <div>
                    <div className="no-video-found">
                        <div className="msg-container">
                            <img src={loaderIcon} />
                            <h4>There's no video to show yet.</h4>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default VideoGallery2;
