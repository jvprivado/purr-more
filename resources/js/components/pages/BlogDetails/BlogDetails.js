import React, {useEffect} from "react";
import {useLocation} from "react-router-dom";
import MainFooter from "../../Common/Footer/MainFooter";
import MainHeader from "../../Common/Header/MainHeader";
import Hero from "../../partials/Hero/Hero";
import BlogContent from "./BlogContent";

const BlogDetails = () => {
    const {pathname} = useLocation();
    useEffect(() => {
        window.scrollTo(0, 0);
    }, [pathname]);
    return (
        <div>
            <MainHeader/>
            <Hero/>
            <BlogContent/>
            <MainFooter/>
        </div>
    );
};

export default BlogDetails;
