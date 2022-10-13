import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import BlogDetails from "../components/pages/BlogDetails/BlogDetails";
import Home from "../components/pages/home/Home";
import Successful from "../components/pages/success/Successful";

export default function PurrRoutes() {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path="/thank-you" element={<Successful />} />
                <Route
                    exact path="/blog/:slug"
                    element={<BlogDetails />}
                />
                <Route exact path="/" element={<Home />} />
            </Routes>
        </BrowserRouter>
    );
}
