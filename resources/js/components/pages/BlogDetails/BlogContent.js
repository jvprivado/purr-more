import React, { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { Link, useParams } from "react-router-dom";
import "./blog-details.scss";
import Api from "../../Common/Api";
import { Helmet } from "react-helmet";

const BlogContent = () => {
    const { slug } = useParams();
    const [blogDetail, setBlogDetails] = useState([]);
    useEffect(() => {
        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/blog-details/${slug}`;
        const getData = async () => {
            await Api
                .get(url)
                .then((response) => {
                    setBlogDetails(response.data.blog);
                })
                .catch((err) => {
                    // todo : show error message
                    // setErrData(err);
                    console.log(err);
                });
        };

        getData();
    }, []);

    return (
        <div className="blog-content-main-wrap">
            <Helmet>
                <title>{blogDetail?.title + 'WHISKAS'}</title>
                <meta name="category" content="Health & Nutrition" />
                <meta name="description" content={blogDetail?.id === 1
                    ? "Choosing the right cat food plays a key role in your cat’s health, wellbeing and quality of life | WHISKAS Blog"
                    : "Whether you live in a big city or an acreage, interested in an exotic breed or more common domestic cat, raised in a barn or a bungalow, there's a right cat breed for you | WHISKAS Blog"} />
                <meta name="keywords" content={blogDetail?.id === 1
                    ? "cat, cat food, dry cat food, cat breed, whiskas cat food"
                    : "cat breeds, cat breeds Australia, breeds, cat breed, cat breeders, cat breeders Australia, Australian cat breeds, cat breeds in Australia"} />
            </Helmet>

            <Container className="g-0">
                <div className="blog-content-inner-wrap">
                    {blogDetail !== null ? (

                        <div>
                            <div className="blog-content-title">
                                <h1>Learn with WHISKAS®</h1>
                            </div>
                            <div className="blog-details-bottom-wrap">
                                <h4>{blogDetail?.title}</h4>
                                <p>{blogDetail?.creationTime}</p>
                                <div className="blog-details-image">
                                    <img src={blogDetail?.image}
                                        alt={blogDetail?.id === 1 ? "cat food" : "cat breeds"}
                                    />
                                </div>
                                <div className="blog-details-content">
                                    <div dangerouslySetInnerHTML={{ __html: blogDetail.description }} />
                                </div>
                            </div>

                            <div className="blog-details-bottom-button-wrap">
                                <Link to="/">Back to Purr More Hub</Link>
                            </div>
                        </div>
                    ) : (
                        <div className="blogNotFound">
                            <div className="error-code">
                                <h3>404</h3>
                            </div>
                            <div className="error-details">
                                <h3>Blog not found</h3>
                            </div>
                        </div>
                    )}
                </div>
            </Container>
        </div>
    );
};

export default BlogContent;
