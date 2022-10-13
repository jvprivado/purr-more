import React from "react";
import ReactDOM from "react-dom";
import "./app-level.css";
import PurrRoutes from "./PurrRoutes";

ReactDOM.render(
    <React.StrictMode>
        <PurrRoutes />
    </React.StrictMode>,
    document.getElementById("app")
);
