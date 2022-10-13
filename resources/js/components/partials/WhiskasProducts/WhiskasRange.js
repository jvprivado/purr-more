import React, { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import Slider from "react-slick/lib/slider";
import Api from "../../Common/Api";
import "./whiskas-range.scss";

const WhiskasRange = () => {
    const settings = {
        dots: true,
        infinite: true,
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
                    dots: true,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
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
    const [product, setProduct] = useState([]);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/products`;
        Api.get(url).then((response) => {
            setProduct(response.data);
        });
    }, []);

    return (
        <div className="wiskas-range-content-main-wrap">
            <Container className="g-0">
                <div className="wiskas-range-content-title">
                    <h3>Shop Our Range</h3>
                    <p>
                        Browse our range of products at Coles and other
                        participating retailers.
                    </p>
                </div>
                <div className="wiskas-content-slider-main-wrap">
                    <div className="wiskas-slider">
                        <div className="slider-items-main-wrap">
                            {product.length <= 0 ? (
                                <h3 className="text-danger text-center">
                                    No products to display at this moment...
                                </h3>
                            ) : (
                                <Slider {...settings}>
                                    {product?.products?.map((product, i) => (
                                        <a
                                            className="single-slide-range-item"
                                            key={1}
                                            href={product.link}
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            <div className="product-slider-image-view">
                                                <img
                                                    src={product?.image}
                                                    alt={product.title}
                                                />
                                            </div>
                                            <div className="single-video-content-bottom-wrap">
                                                <div className="single-video-content-top text-center">
                                                    <h4>{product.title}</h4>
                                                    <p>{product.subtitle}</p>
                                                </div>
                                            </div>
                                        </a>
                                    ))}

                                    { }
                                </Slider>
                            )}
                        </div>
                    </div>
                </div>
            </Container>
        </div>
    );
};

export default WhiskasRange;
