setTimeout(function () {
    //end of call stack so it has access to data variable

    const isSingleCase = document.querySelector(".tmpl_type_rmg_single_case");
    // Only run code if this is the single case view
    if (isSingleCase) {
        // Wrap in anonymous IIFE function - prevent variables set to global.
        (function () {
            "use strict";

            const get = function (selector) {
                return document.querySelector(selector);
            };

            const getCurrentUrl = function () {
                return window.location.href;
            };

            const removeClass = function (element, className) {
                if (element.classList.contains(className)) {
                    element.classList.remove(className);
                }
            };

            const addClass = function (element, className) {
                if (!element.classList.contains(className)) {
                    element.classList.add(className);
                }
            };

            const hide = function (element) {
                if (!element.classList.contains("hidden")) {
                    addClass(element, "hidden");
                }
            };

            const createMarkUp = function (
                elementType,
                classList,
                innerText,
                innerMarkup
            ) {
                const newElement = document.createElement(elementType);
                if (classList.length > 0) {
                    newElement.classList = classList.join(" ");
                }
                if (innerText) {
                    newElement.innerText = innerText;
                }
                if (innerMarkup) {
                    newElement.innerHTML = innerMarkup;
                }
                return newElement;
            };

            const pageElements = {
                templateNav: get(".gallery-nav"),
                prevBtn: get(".case-prev"),
                nextBtn: get(".case-next"),
                patientTitle: get(".single-case-title"),
                patientDesc: get(".patient-details"),
                imagesWrap: get(".img-wrap"),
                pageSEOTitle: get("title"),
                body: get("body"),
                caseWrap: get(".case-wrap"),
            };

            // Set up event listeners on first page load.
            // Will wipe out nav buttons and create our own after first click.
            const templateNavEvents = function () {
                if (pageElements.prevBtn) {
                    pageElements.prevBtn.addEventListener(
                        "click",
                        showNextPrevCase
                    );
                }

                if (pageElements.nextBtn) {
                    pageElements.nextBtn.addEventListener(
                        "click",
                        showNextPrevCase
                    );
                }

                window.addEventListener("popstate", showNextPrevCase);
            };

            // Create our own nav to replace templates
            const createNav = function () {
                const speedBtnPrev = createMarkUp(
                    "a",
                    ["button-gallery-nav button-gallery-prev case-prev"],
                    "",
                    '<i class="fas fa-chevron-left"></i> Previous'
                );
                const speedBtnNext = createMarkUp(
                    "a",
                    ["button-gallery-nav button-gallery-next case-next"],
                    "",
                    'Next <i class="fas fa-chevron-right"></i>'
                );
                speedBtnPrev.addEventListener("click", showNextPrevCase);
                speedBtnNext.addEventListener("click", showNextPrevCase);
                pageElements.templateNav.innerHTML = "";
                pageElements.templateNav.appendChild(speedBtnPrev);
                pageElements.templateNav.appendChild(speedBtnNext);

                // Create selectors for new buttons
                pageElements.speedBtnPrev = speedBtnPrev;
                pageElements.speedBtnNext = speedBtnNext;
            };

            const showNextButton = function (caseNumberToDisplay) {
                if (caseNumberToDisplay === 1) {
                    addClass(pageElements.speedBtnNext, "first-patient");
                    // pageElements.speedBtnNext.innerText = 'See More Patients';
                } else {
                    removeClass(pageElements.speedBtnNext, "first-patient");
                    // pageElements.speedBtnNext.innerText = '';
                }
                removeClass(pageElements.speedBtnNext, "hidden");
            };

            const displayOrHideNavButtons = function (
                caseNumberToDisplay,
                numberOfTotalCases
            ) {
                if (caseNumberToDisplay < numberOfTotalCases) {
                    showNextButton(caseNumberToDisplay);
                } else {
                    hide(pageElements.speedBtnNext);
                }

                // Display/Hide Prev button if there is not a previous case.
                if (caseNumberToDisplay > 1) {
                    if (
                        pageElements.speedBtnPrev.classList.contains("hidden")
                    ) {
                        pageElements.speedBtnPrev.classList.remove("hidden");
                    }
                } else {
                    pageElements.speedBtnPrev.classList.add("hidden");
                }
            };

            const prevOrNextCase = function (evt) {
                console.log(evt.target);
                if (evt.target.classList.contains("case-next")) {
                    console.log("add 1");
                    return +1;
                } else {
                    return -1;
                }
            };

            const displayCaseTitleAndDetails = function (caseToDisplay) {
                const caseTitle = caseToDisplay.new_title;
                const caseDescription = caseToDisplay.post_content;

                const caseWrap = pageElements.caseWrap;
                const detailsWrap = get(".patient-details");
                const detailsHeading = get(".patient-details span");
                // const detailsElement = get('.patient-details .patient-desc');
                const patientDetails = get(".patient-details p");

                const newDetailsWrap = document.createElement("div");

                newDetailsWrap.classList.add("patient-details");
                // newDetailsWrap.innerHTML = "<span>Patient Details</span>" + caseDescription;
                newDetailsWrap.innerHTML = caseDescription;

                pageElements.patientTitle.innerText = caseTitle;

                // If there is a case description.
                if (caseDescription !== "") {
                    // Show the string 'Patient Details' if its not there.
                    if (detailsWrap === null) {
                        caseWrap.appendChild(newDetailsWrap);
                    } else {
                        detailsWrap.innerHTML = caseDescription;
                        // detailsWrap.innerHTML = "<span>Patient Details</span>" + caseDescription;
                    }
                }

                // If there is not a case description.
                if (caseDescription === "") {
                    if (detailsWrap) {
                        detailsWrap.innerHTML = "";
                    }
                }
            };

            const makeImage = function (imgSet, beforeOrAfter) {
                const imgWrap = createMarkUp("div", [
                    beforeOrAfter + "-img",
                    "img-frame",
                ]);
                const imgEl = createMarkUp("img", [], null);
                const label =
                    beforeOrAfter.charAt(0).toUpperCase() +
                    beforeOrAfter.slice(1);
                const beforeLabelWrap = createMarkUp(
                    "div",
                    ["bna-label"],
                    label
                );

                if (beforeOrAfter === "before") {
                    imgEl.src = imgSet.before_image_path;
                } else {
                    imgEl.src = imgSet.after_image_path;
                }

                imgWrap.appendChild(imgEl);
                imgWrap.appendChild(beforeLabelWrap);
                return imgWrap;
            };

            const makeAndDisplayImages = function (caseToDisplay) {
                const beforeAndAfters = caseToDisplay.images;
                // clear current case on the page before adding the new one.
                pageElements.imagesWrap.innerHTML = "";

                beforeAndAfters.forEach(function (imgSet) {
                    // Before Img
                    const beforeImgWrap = makeImage(imgSet, "before");
                    // After Img
                    const afterImgWrap = makeImage(imgSet, "after");

                    pageElements.imagesWrap.appendChild(beforeImgWrap);
                    pageElements.imagesWrap.appendChild(afterImgWrap);
                });
            };

            const getSiteUrl = function () {
                return silvr_data.siteUrl;
            };

            const getCurrentCaseNumberfromUrl = function () {
                return getCurrentUrl().split("-").pop().replace("/", "");
            };

            const getCurrentCategoryFromUrl = function () {
                const indexOfGallery = getCurrentUrl().lastIndexOf("gallery");
                const indexOfPatient = getCurrentUrl().lastIndexOf("/patient");
                return getCurrentUrl()
                    .substring(indexOfGallery, indexOfPatient)
                    .replace("gallery/", "");
            };

            const updateSEOTitle = function (caseBeingDisplayed) {
                const newTitle = caseBeingDisplayed.new_title;
                pageElements.pageSEOTitle.innerText = newTitle;
            };

            const updateBodyClass = function (caseToDisplay) {
                let bodyClassArray = Array.from(pageElements.body.classList);

                bodyClassArray.forEach(function (item, index) {
                    if (item.includes("patient-")) {
                        item = caseToDisplay.new_title
                            .toLowerCase()
                            .replace(" ", "-");
                        bodyClassArray[index] = item;
                    }
                });
                pageElements.body.classList = bodyClassArray.join(" ");
            };

            const updateURL = function (caseToDisplay) {
                const updatedCaseURL = caseToDisplay.new_title
                    .toLowerCase()
                    .replace(" ", "-");
                history.pushState(updatedCaseURL, null, updatedCaseURL);
            };

            const getRestApiRoute = function () {
                return (
                    getSiteUrl() +
                    "/rmg__api/case/?in_cat=" +
                    getCurrentCategoryFromUrl() +
                    "/"
                );
            };

            const getCases = function () {
                fetch(getRestApiRoute())
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (cases) {
                        return setUp(cases);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            };

            // Kick off app.

            // Set up event listeners on template nav buttons and window.
            templateNavEvents();

            getCases();

            // Gets assigned in setUp() - setUp waits for fetch to get cases.
            let speedGallery;

            // This gets called after cases have been recevied from api - fetch.
            const setUp = function (cases) {
                // Set speedGallery to the closure
                speedGallery = showGallery(cases);
                speedGallery();
            };

            // Make function to pass in event to speedGallery.
            function showNextPrevCase(evt) {
                speedGallery(evt);
            }

            // Closure function - returns a function
            function showGallery(cases) {
                // Get case to display - start with the case that was opened by looking at the URL.
                let caseNumberToDisplay = Number(getCurrentCaseNumberfromUrl());

                // Set this to first case opened - will keep track of previously viewed case.
                let prevCaseNumber; // = Number(getCurrentCaseNumberfromUrl());

                // Detect if browser buttons were used.
                let usedPopState = false;

                // Create app nav after first click on template nav buttons.
                // Only run once.
                let createdNav = false;

                // Function that get's returned - gets run on every case change.
                const displayCase = function (evt) {
                    // Only run this if the case changes, not on load.
                    if (evt) {
                        prevCaseNumber = history.state;

                        if (evt.type === "click") {
                            evt.preventDefault();

                            // Only run once.
                            if (createdNav === false) {
                                createNav();
                                createdNav = true;
                            }

                            usedPopState = false;
                            caseNumberToDisplay += prevOrNextCase(evt);
                        }

                        if (evt.type === "popstate") {
                            usedPopState = true;
                            caseNumberToDisplay = Number(
                                getCurrentCaseNumberfromUrl()
                            );
                        }
                    }

                    // Get the case to display from the cases Array.

                    console.log("Patient " + caseNumberToDisplay);
                    let caseToDisplay = cases[caseNumberToDisplay - 1];

                    // Only manually update URL if browser buttons were not used to change case.
                    if (usedPopState === false) {
                        updateURL(caseToDisplay);
                    }

                    // Send user to previous page before getting to a single case view - where they came from.
                    if (prevCaseNumber === null) {
                        window.history.back();
                    }

                    updateSEOTitle(caseToDisplay);

                    // updateMetaDescription(caseToDisplay);

                    updateBodyClass(caseToDisplay);

                    displayCaseTitleAndDetails(caseToDisplay);

                    makeAndDisplayImages(caseToDisplay);

                    if (createdNav === true) {
                        displayOrHideNavButtons(
                            caseNumberToDisplay,
                            cases.length
                        );
                    }
                }; //End of DisplayCase

                return displayCase;
            }
        })(); //End of IIFE
    } // End of if statments
}, 0);

/*
Todo:
- Create updateMetaDescription function - with fall back if no description.
- Think about how to implment pure funcitons - virtual dom...
- How to use the reduce function??
- polyfill for fetch. - IE.
- Intergrate into plugin.
*/
