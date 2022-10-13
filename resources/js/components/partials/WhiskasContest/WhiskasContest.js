import React, { useState } from "react";
import { Col, Container, Form, Row } from "react-bootstrap";
import ReCAPTCHA from "react-google-recaptcha";
import { useNavigate } from "react-router-dom";
import { toast, ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import Api from "../../Common/Api";
import Loader from "../loader/Loader";
import bgImage from "./img/bgImage.png";
import navIconActive from "./img/iconActive.svg";
import navDeIconActive from "./img/iconDeactive.svg";
import MinTc from "./MinTc";
import "./musicContest.scss";

const WhiskasContest = () => {
    const history = useNavigate();

    const [recaptchaState, setRecaptcha] = useState(false);
    const [inputField, setInputField] = useState(0);
    const [page, setPage] = useState(0);
    const [errData, setErrData] = useState({ status: "", errors: [] });
    const [fieldErrData, setFieldErrData] = useState(false);
    const [fieldErrDataFile, setFieldErrDataFile] = useState(false);
    const [formSubmitMain, setFormSubmitMain] = useState(false);
    const [loader, setLoader] = useState(false);
    const [fileSizeError, setFileSizeError] = useState(false);
    const [fileTypeError, setFileTypeError] = useState(false);
    const [formData, setFormData] = useState({
        pur: "",
        cat_number: 0,
        cat_names: "",
        cat_means: "field_not_required",
        email: "",
        firstname: "",
        lastname: "",
        phone: "",
        agreementTC: false,
        agreementPromotion: false,
    });

    const FormTitles = ["Sign Up", "Personal Info"];
    const onInputChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    function checkFileTypeError(e) {
        const fileType = e.target.files[0].type;
        const regex = new RegExp("video/|audio/");
        if (regex.test(fileType)) {
            return false;
        } else {
            return true;
        }
    }

    function handleFileUpload(e) {
        setFormData((formData) => ({ ...formData, [e.target.name]: "" }));
        const { name, files } = e.target;

        if (checkFileTypeError(e)) {
            setFileTypeError(true);
            toast.error("Please upload a video/audio file");
            return;
        } else {
            setFileTypeError(false);
        }

        if (files[0].size > 157286400) {
            setFileSizeError(true);
            toast.error("Please upload a file no larger than 150mb");
        } else {
            setFormData({ ...formData, [name]: files[0] });
            setFileSizeError(false);
        }
    }

    function navigateNextStep() {
        // todo: keep values from previous step
        if (page === FormTitles.length - 1) {
            // console.log(formData);
            // todo: check
        } else {
            if (formData.pur === "" || formData.cat_names === "") {
                document
                    .getElementById("step1-error-content")
                    .classList.remove("d-none");
                setFieldErrDataFile(true);
            } else {
                setPage((currPage) => currPage + 1);
            }
        }
    }

    const showErrorMessage = (errors) => {
        if (errors.pur) {
            toast("Failed to upload your Purr.", { appearance: "error" });
            setFormData({ ...formData, pur: "" });
            setFieldErrDataFile(true);
        }
        /* todo: if (errors.email){
            toast("Invalid email address.", {appearance: 'error'});
        }
        if (errors.phone){
            toast("Invalid phone number.", {appearance: 'error'});
        }*/
    };

    const handleFormSubmit = async (e) => {
        e.preventDefault();
        if (
            formData.firstname === "" ||
            formData.lastname === "" ||
            formData.email === "" ||
            formData.phone === "" ||
            formData.agreementTC === false ||
            formData.agreementPromotion === false
        ) {
            setFormSubmitMain(true);
            document
                .getElementById("step2-error-content")
                .classList.remove("d-none");
            return;
        }

        setLoader(true);
        let formDataToSubmit = new FormData();
        for (let key in formData) {
            formDataToSubmit.append(key, formData[key]);
        }

        let originString = window.location.origin;
        const url = originString.replace('www.', '') + `/api/store`;

        await Api.post(url, formDataToSubmit)
            .then((res) => {
                history("thank-you");
            })
            .catch((err) => {
                toast(JSON.stringify(err.response.data.message), { appearance: "error" });
                setErrData({
                    status: err.response.status,
                    errors: err.response.data.errors,
                });
                setLoader(false);
                showErrorMessage(err.response.data.errors);
            });
    };

    return (
        <div id="potmc">
            {loader ? <Loader /> : ""}
            <div className="music-playerinner-wrap">
                <Container className="g-0">
                    <div className="music-player-inner-content-wrap with-bg-color">
                        <div
                            className="music-contest-toptitle-wrap"
                            style={{ backgroundImage: `url(${bgImage})` }}
                        >
                            <span>
                                <h1>PURR of the Month</h1>
                                <h5>
                                    PURR to <span>Win</span>!
                                </h5>
                            </span>
                        </div>
                        <div className="music-contest-content-wrap">
                            <div className="text-wrapper">
                                <h4 className="contest-title">
                                    {" "}
                                    Want to share your feline’s purr loud and
                                    proud?{" "}
                                </h4>
                                <p className="contest-description">
                                    Simply upload your cat’s best Purr and leave
                                    us your details below for your chance to win
                                    a <strong>$250 VISA e-Gift card</strong>*. Your cat’s
                                    Purr may also be featured on this page and
                                    on TikTok, with a new winner each month!
                                </p>
                            </div>
                        </div>
                        <div
                            className={
                                inputField
                                    ? "music-contest-data-upload-wrap file-upload-proccesing"
                                    : "music-contest-data-upload-wrap "
                            }
                        >
                            <div className="content-content-main-form">
                                <div className="form">
                                    <div className="progressbar">
                                        <div>
                                            {page === 0 ? (
                                                <div className="form-navbar-main-btn-area-">
                                                    <button className="form-navbar-main-kmgf p-0">
                                                        <img
                                                            src={navIconActive}
                                                            alt="Step 1 icon"
                                                        />
                                                    </button>
                                                    <img
                                                        src={navDeIconActive}
                                                        alt="Step 2 icon"
                                                    />
                                                    <p>Step 1 of 2 </p>
                                                </div>
                                            ) : page == 1 ? (
                                                <div
                                                    className="form-navbar-main-btn-area-next"
                                                    onClick={() => {
                                                        setPage(
                                                            (currPage) =>
                                                                currPage - 1
                                                        );
                                                    }}
                                                >
                                                    <button className=" ">
                                                        <img
                                                            src={navIconActive}

                                                        />
                                                    </button>
                                                    <img
                                                        src={navIconActive}

                                                    />
                                                    <p>Step 2 of 2 </p>
                                                </div>
                                            ) : (
                                                ""
                                            )}
                                        </div>
                                    </div>
                                    <Form
                                        onSubmit={handleFormSubmit}
                                        className="form-container"
                                    >
                                        <div className="form-content-view">
                                            {/* {errData} */}
                                            {page === 0 ? (
                                                <>
                                                    <Row>
                                                        <Col lg={12}>
                                                            <Form.Group className="mb-5">
                                                                <h4 className="contest-title text-black">
                                                                    Upload Your
                                                                    Purr
                                                                </h4>
                                                                <Form.Text
                                                                    className={`mt-4 mb-2 d-block contest-description
                                                                ${fieldErrDataFile &&
                                                                            formData.pur ===
                                                                            ""
                                                                            ? "text-danger"
                                                                            : ""
                                                                        }`}
                                                                >
                                                                    Share your
                                                                    cat’s Purr
                                                                    video or
                                                                    sound file
                                                                    with us!{""}
                                                                    <span
                                                                        style={{
                                                                            color: "red",
                                                                        }}
                                                                    >
                                                                        *
                                                                    </span>
                                                                </Form.Text>{" "}
                                                                {!fileSizeError &&
                                                                    formData.pur !==
                                                                    "" ? (
                                                                    <Form.Text
                                                                        className={`mb-3 d-block contest-description text-black`}
                                                                    >
                                                                        {
                                                                            formData
                                                                                .pur
                                                                                .name
                                                                        }
                                                                    </Form.Text>
                                                                ) : (
                                                                    <Form.Text
                                                                        className={`mb-3 d-block contest-description ${fileSizeError || fileTypeError
                                                                                ? "text-danger ctv-video"
                                                                                : "text-black"
                                                                            }`}
                                                                    >
                                                                        Video or sound file should be between 10-30s long and no larger than 150MB.
                                                                    </Form.Text>
                                                                )}
                                                                <Col lg={6}>
                                                                    <Form.Control
                                                                        type="file"
                                                                        accept="video/*, audio/*"
                                                                        onChange={(
                                                                            e
                                                                        ) =>
                                                                            handleFileUpload(
                                                                                e,
                                                                                setFieldErrDataFile(
                                                                                    false
                                                                                )
                                                                            )
                                                                        }
                                                                        name="pur"
                                                                        id="files"
                                                                        required
                                                                    />
                                                                </Col>
                                                            </Form.Group>
                                                        </Col>
                                                    </Row>

                                                    <Row>
                                                        <Col lg={12}>
                                                            <h4 className="contest-title text-black">
                                                                About Your Cat
                                                            </h4>
                                                            <Form.Text
                                                                className={`mb-3 d-block contest-description
                                                            ${fieldErrDataFile &&
                                                                        formData.cat_names ===
                                                                        ""
                                                                        ? "text-danger"
                                                                        : ""
                                                                    }`}
                                                            >
                                                                What is the name
                                                                of your cat?{""}
                                                                <span
                                                                    style={{
                                                                        color: "red",
                                                                    }}
                                                                >
                                                                    *
                                                                </span>
                                                            </Form.Text>
                                                            <Form.Group className="mb-3">
                                                                <Form.Control
                                                                    type="text"
                                                                    placeholder="Your cat's name"
                                                                    name="cat_names"
                                                                    required
                                                                    value={
                                                                        formData.cat_names
                                                                    }
                                                                    style={
                                                                        fieldErrDataFile &&
                                                                            formData.cat_names ===
                                                                            ""
                                                                            ? {
                                                                                borderColor:
                                                                                    "red",
                                                                            }
                                                                            : {}
                                                                    }
                                                                    onChange={(
                                                                        e
                                                                    ) =>
                                                                        onInputChange(
                                                                            e,
                                                                            setFieldErrData(
                                                                                false
                                                                            )
                                                                        )
                                                                    }
                                                                />
                                                            </Form.Group>
                                                        </Col>
                                                    </Row>

                                                    <div
                                                        id="step1-error-content"
                                                        className="d-none"
                                                    >
                                                        <div className="mt-5 text-center">
                                                            <Form.Text className="text-danger my-5 d-block">
                                                                Please complete
                                                                the required
                                                                fields
                                                            </Form.Text>
                                                        </div>
                                                    </div>
                                                </>
                                            ) : page === 1 ? (
                                                <div className="sign-up-container">
                                                    <h4 className="mb-4">
                                                        About You
                                                    </h4>
                                                    <>
                                                        <Row>
                                                            <Col lg={6}>
                                                                <Form.Group className="mb-2">
                                                                    <Form.Text
                                                                        className={`d-block contest-description
                                                                ${fieldErrDataFile &&
                                                                                formData.firstname ===
                                                                                ""
                                                                                ? "text-danger"
                                                                                : ""
                                                                            }`}
                                                                    >
                                                                        First
                                                                        Name
                                                                        <span
                                                                            style={{
                                                                                color: "red",
                                                                            }}
                                                                        >
                                                                            *
                                                                        </span>
                                                                    </Form.Text>
                                                                    <Form.Control
                                                                        type="text"
                                                                        name="firstname"
                                                                        required
                                                                        autoFocus
                                                                        value={
                                                                            formData.firstname
                                                                        }
                                                                        onChange={(
                                                                            e
                                                                        ) =>
                                                                            onInputChange(
                                                                                e,
                                                                                setFormSubmitMain(
                                                                                    false
                                                                                )
                                                                            )
                                                                        }
                                                                    />
                                                                    {formSubmitMain ? (
                                                                        <p
                                                                            style={{
                                                                                color: "red",
                                                                            }}
                                                                        >
                                                                            Please
                                                                            complete
                                                                            the
                                                                            required
                                                                            fields
                                                                        </p>
                                                                    ) : (
                                                                        ""
                                                                    )}
                                                                </Form.Group>
                                                            </Col>
                                                            <Col lg={6}>
                                                                <Form.Group className="mb-2">
                                                                    <Form.Text className="d-block contest-description">
                                                                        Last
                                                                        Name
                                                                        <span
                                                                            style={{
                                                                                color: "red",
                                                                            }}
                                                                        >
                                                                            *
                                                                        </span>
                                                                    </Form.Text>
                                                                    <Form.Control
                                                                        type="text"
                                                                        name="lastname"
                                                                        required
                                                                        value={
                                                                            formData.lastname
                                                                        }
                                                                        onChange={(
                                                                            e
                                                                        ) =>
                                                                            onInputChange(
                                                                                e
                                                                            )
                                                                        }
                                                                    />
                                                                </Form.Group>
                                                            </Col>
                                                            <Col lg={6}>
                                                                <Form.Group className="mb-2">
                                                                    <Form.Text
                                                                        className={`d-block contest-description ${errData.errors &&
                                                                                errData
                                                                                    .errors
                                                                                    .email
                                                                                ? "text-danger"
                                                                                : ""
                                                                            }`}
                                                                    >
                                                                        Email
                                                                        Address
                                                                        <span
                                                                            style={{
                                                                                color: "red",
                                                                            }}
                                                                        >
                                                                            *
                                                                        </span>
                                                                    </Form.Text>
                                                                    <Form.Control
                                                                        type="email"
                                                                        name="email"
                                                                        required
                                                                        value={
                                                                            formData.email
                                                                        }
                                                                        style={
                                                                            errData.errors &&
                                                                                errData
                                                                                    .errors
                                                                                    .email
                                                                                ? {
                                                                                    borderColor:
                                                                                        "red",
                                                                                }
                                                                                : {}
                                                                        }
                                                                        onChange={(
                                                                            e
                                                                        ) =>
                                                                            onInputChange(
                                                                                e
                                                                            )
                                                                        }
                                                                    />
                                                                    {errData.errors &&
                                                                        errData
                                                                            .errors
                                                                            .email ? (
                                                                        <p
                                                                            style={{
                                                                                color: "red",
                                                                            }}
                                                                        >
                                                                            {
                                                                                errData
                                                                                    .errors
                                                                                    .email
                                                                            }
                                                                        </p>
                                                                    ) : (
                                                                        ""
                                                                    )}
                                                                </Form.Group>
                                                            </Col>
                                                            <Col lg={6}>
                                                                <Form.Group className="mb-2">
                                                                    <Form.Text
                                                                        className={`d-block contest-description ${errData.errors &&
                                                                                errData.errors.phone
                                                                                ? "text-danger"
                                                                                : ""
                                                                            }`}
                                                                    >
                                                                        Phone Number<span style={{ color: "red" }}>*</span>
                                                                    </Form.Text>
                                                                    <Form.Control
                                                                        type="number"
                                                                        name="phone"
                                                                        required
                                                                        placeholder={"0400 000 000"}
                                                                        value={formData.phone}
                                                                        minLength={10}
                                                                        style={
                                                                            errData.errors &&
                                                                                errData.errors.phone
                                                                                ? { borderColor: "red" }
                                                                                : {}
                                                                        }
                                                                        onChange={(e) =>
                                                                            onInputChange(e)
                                                                        }
                                                                        onBlur={(e) => {
                                                                            if (formData.phone.length < 10) {
                                                                                setErrData({
                                                                                    errors: { 'phone': "Phone number must not be less than 10 digits." }
                                                                                })
                                                                            } else {
                                                                                setErrData({
                                                                                    errors: { 'phone': "" }
                                                                                })
                                                                            }
                                                                        }}
                                                                    />
                                                                    {errData.errors &&
                                                                        errData.errors.phone !== "" ? (
                                                                        <p style={{ color: "red" }}>
                                                                            {errData.errors.phone}
                                                                        </p>
                                                                    ) : (
                                                                        ""
                                                                    )}
                                                                </Form.Group>
                                                            </Col>{" "}
                                                            <Col lg={12}>
                                                                <div className="form-checkbox-main-wrap mt-4">
                                                                    <div className="single-checkbox-wrap">
                                                                        <input
                                                                            required={
                                                                                true
                                                                            }
                                                                            type="checkbox"
                                                                            id="agreementTC"
                                                                            name="agreementTC"
                                                                            onChange={(
                                                                                e
                                                                            ) => {
                                                                                setFormData(
                                                                                    {
                                                                                        ...formData,
                                                                                        agreementTC:
                                                                                            e
                                                                                                .target
                                                                                                .checked,
                                                                                    }
                                                                                );
                                                                            }}
                                                                        />
                                                                        <label htmlFor="agreementTC">
                                                                            I
                                                                            have
                                                                            read
                                                                            and
                                                                            agreed
                                                                            to
                                                                            the{" "}
                                                                            <a
                                                                                href="https://www.whiskas.com.au/purr-of-the-month-terms"
                                                                                target="_blank"
                                                                            >
                                                                                {" "}
                                                                                terms
                                                                                and
                                                                                conditions.{" "}
                                                                            </a>{" "}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </Col>
                                                            <Col lg={12}>
                                                                <div className="form-checkbox-main-wrap mt-4">
                                                                    <div className="single-checkbox-wrap">
                                                                        <input
                                                                            required={
                                                                                true
                                                                            }
                                                                            type="checkbox"
                                                                            id="agreementPromotion"
                                                                            name="agreementPromotion"
                                                                            onChange={(
                                                                                e
                                                                            ) => {
                                                                                setFormData(
                                                                                    {
                                                                                        ...formData,
                                                                                        agreementPromotion:
                                                                                            e
                                                                                                .target
                                                                                                .checked,
                                                                                    }
                                                                                );
                                                                            }}
                                                                        />
                                                                        <label htmlFor="agreementPromotion">
                                                                            <span className="consent-spacer">
                                                                                I
                                                                                am
                                                                                over
                                                                                16
                                                                                years
                                                                                old,
                                                                                and
                                                                                would
                                                                                like
                                                                                to
                                                                                receive
                                                                                promotions,
                                                                                pet
                                                                                care
                                                                                tips
                                                                                and
                                                                                info
                                                                                &
                                                                                new
                                                                                product
                                                                                developments
                                                                                from
                                                                                { }
                                                                                <a
                                                                                    href="https://www.mars.com/privacy"
                                                                                    target="_blank"
                                                                                >
                                                                                    {" "}
                                                                                    Mars
                                                                                    Petcare
                                                                                    and
                                                                                    its
                                                                                    affiliates{" "}
                                                                                </a>{" "}
                                                                                .
                                                                            </span>
                                                                            <span className="spacer" />
                                                                            <span className="consent-spacer">
                                                                                I
                                                                                understand
                                                                                that
                                                                                I
                                                                                may
                                                                                change
                                                                                these
                                                                                preferences
                                                                                at
                                                                                any
                                                                                time
                                                                                by
                                                                                clicking
                                                                                the
                                                                                unsubscribe
                                                                                link
                                                                                in
                                                                                any
                                                                                communication
                                                                                I
                                                                                receive.
                                                                            </span>
                                                                            <span className="spacer" />
                                                                            <span className="consent-spacer">
                                                                                We
                                                                                may
                                                                                use
                                                                                your
                                                                                personal
                                                                                information
                                                                                for
                                                                                research
                                                                                to
                                                                                enhance
                                                                                our
                                                                                product
                                                                                and
                                                                                service
                                                                                offerings.
                                                                                You
                                                                                can
                                                                                find
                                                                                out
                                                                                how
                                                                                and
                                                                                for
                                                                                what
                                                                                purposes
                                                                                Mars
                                                                                Petcare
                                                                                and
                                                                                its
                                                                                affiliates
                                                                                collects,
                                                                                uses
                                                                                and
                                                                                may
                                                                                disclose
                                                                                your
                                                                                personal
                                                                                information.
                                                                                You
                                                                                can
                                                                                also
                                                                                discover
                                                                                how
                                                                                to
                                                                                contact
                                                                                us
                                                                                with
                                                                                your
                                                                                privacy
                                                                                questions,
                                                                                and
                                                                                exercise
                                                                                your
                                                                                privacy
                                                                                rights,
                                                                                via
                                                                                the{" "}
                                                                                <a
                                                                                    href="https://www.mars.com/privacy-policy-australia"
                                                                                    target="_blank"
                                                                                >
                                                                                    Mars
                                                                                    Privacy
                                                                                    Statement
                                                                                </a>

                                                                                .
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </Col>
                                                        </Row>
                                                        <div className="google-captcha">
                                                            <ReCAPTCHA
                                                                sitekey="6LcryZkfAAAAAEDSc4qRoVwO8jdiWk-w7jHKVssp"
                                                                onChange={() =>
                                                                    setRecaptcha(
                                                                        !recaptchaState
                                                                    )
                                                                }
                                                            />
                                                        </div>
                                                    </>
                                                </div>
                                            ) : (
                                                ""
                                            )}
                                        </div>
                                        <div
                                            id="step2-error-content"
                                            className="d-none"
                                        >
                                            <div className="mt-5 text-center">
                                                <Form.Text className="text-danger my-5 d-block">
                                                    Please complete the required
                                                    fields
                                                </Form.Text>
                                            </div>
                                        </div>
                                        <div className="mt-5">
                                            {page == 0 ? (
                                                <div className="form-navbar-main-btn-area">
                                                    {/* {fieldErrData} */}
                                                    <p
                                                        className="next-form-button-fmgfd"
                                                        onClick={
                                                            navigateNextStep
                                                        }
                                                    >
                                                        {page ===
                                                            FormTitles.length - 1
                                                            ? "Submit"
                                                            : "Next"}
                                                    </p>
                                                </div>
                                            ) : page == 1 ? (
                                                <div className="form-navbar-main-btn-area next">
                                                    <button
                                                        className="preview-back-btn"
                                                        disabled={page == 0}
                                                        onClick={() => {
                                                            setPage(
                                                                (currPage) =>
                                                                    currPage - 1
                                                            );
                                                            setRecaptcha(false);
                                                        }}
                                                    >
                                                        Back
                                                    </button>

                                                    <button
                                                        disabled={
                                                            !recaptchaState
                                                        }
                                                        type="submit"
                                                        onClick={() => {
                                                            if (
                                                                page ===
                                                                FormTitles.length -
                                                                1
                                                            ) {
                                                                setFormData(
                                                                    formData
                                                                );
                                                            } else {
                                                                setPage(
                                                                    (
                                                                        currPage
                                                                    ) =>
                                                                        currPage +
                                                                        1
                                                                );
                                                            }
                                                        }}
                                                    >
                                                        {page ===
                                                            FormTitles.length - 1
                                                            ? "Put my best Purr forward"
                                                            : "Next"}
                                                    </button>
                                                </div>
                                            ) : (
                                                ""
                                            )}
                                        </div>
                                        {page === FormTitles.length - 1 ? (
                                            ""
                                        ) : (
                                            <MinTc />
                                        )}
                                    </Form>
                                </div>
                            </div>
                        </div>
                    </div>
                </Container>
            </div>
            <ToastContainer />
        </div>
    );
};

export default WhiskasContest;
