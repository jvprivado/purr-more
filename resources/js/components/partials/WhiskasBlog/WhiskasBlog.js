import React, { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { Link } from "react-router-dom";
import Slider from "react-slick/lib/slider";
import "../WhiskasProducts/whiskas-range.scss";
import "./whiskas-blog.scss";
import Api from "../../Common/Api";

const WhiskasBlog = () => {
    const settings = {
        dots: true,
        infinite: false,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    initialSlide: 1,
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

    const [blogList, setBlogList] = useState([]);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/blog-list`;
        Api.get(url).then((response) => {
            setBlogList(response.data.blogs);
        });
    }, []);

    return (
        <div className="wiskas-range-content-main-wrap">
            <Container className="g-0">
                <div className="wiskas-range-content-title">
                    <h3>Learn with WHISKAS®</h3>
                </div>
                <div className="wiskas-content-slider-main-wrap">
                    <div className="wiskas-slider">
                        <div className="slider-items-main-wrap">
                            {blogList.length <= 0 ? (
                                <h3 className="text-danger text-center">No articles to display at this moment...</h3>
                            ) : (
                                <Slider {...settings}>
                                    {blogList?.map((blog, i) => (
                                        <Link to={`/blog/${blog.slug}`} key={i}>
                                            <div className="single-slide-range-item">
                                                <div className="blog-slider-image-view">
                                                    <img src={blog.image} alt={blog.title} />
                                                </div>
                                                <div className="single-video-content-bottom-wrap">
                                                    <div className="single-video-content-top text-center">
                                                        <h4>{blog.title}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </Link>
                                    ))}
                                </Slider>
                            )}
                        </div>
                    </div>
                </div>
            </Container>
        </div>
    );
};

export default WhiskasBlog;
