(function () {
/* ==========================================================================
Constants, Variables, Data
========================================================================== */
const REVIEWS = document.querySelectorAll(".review");

/* ==========================================================================
Functions
========================================================================== */
function Is_Text_Overflowing(element) {
    return element.scrollWidth > element.clientWidth || element.scrollHeight > element.clientHeight;
}

function Find_Long_Reviews() {
    REVIEWS.forEach(review => {
        const review_body_text = review.querySelector(".review__body");
    
        if (Is_Text_Overflowing(review_body_text)) {
            // Long review found
            Enable_Show_Hide_Button(review);
        } 
    });
}

function Enable_Show_Hide_Button(review) {
    const review_body_text = review.querySelector(".review__body");
    const show_hide_button = review.querySelector(".review__show-hide-btn");
    
    show_hide_button.style.display = "inline";

    show_hide_button.addEventListener("click", () => {

        // Review is expanded
        if (show_hide_button.getAttribute("aria-expanded") === "true") {
            review_body_text.classList.toggle("line-clamp");
            show_hide_button.setAttribute("aria-expanded", false);
            show_hide_button.innerHTML = `See More <span class="visually-hidden"> of the above review</span>`;
        }
        // Review is hidden
        else {
            review_body_text.classList.toggle("line-clamp");
            show_hide_button.setAttribute("aria-expanded", true);
            show_hide_button.innerHTML = `See Less <span class="visually-hidden"> of the above review</span>`;
        }
    });
}

/* ==========================================================================
Runtime
========================================================================== */
Find_Long_Reviews();
})();