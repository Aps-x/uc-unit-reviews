// This method of preventing users from submitting multiple reviews is easy to work around if
// you know what you are doing, but it is fine for the purpose of this website.
(function () {
/* ==========================================================================
Constants, Variables, Data
========================================================================== */
const SUBMIT_BUTTON = document.getElementById("submit");
const REVIEW_FORM = document.getElementById("review_form");
const COURSE_ID = SUBMIT_BUTTON.dataset.course;

/* ==========================================================================
Event Listeners
========================================================================== */
SUBMIT_BUTTON.addEventListener("click", function() {
    SUBMIT_BUTTON.disabled = true;
    Add_Course_To_Reviewed_List(COURSE_ID);
});

/* ==========================================================================
Functions
========================================================================== */
function Add_Course_To_Reviewed_List(course_id) {
    let reviewed_courses = JSON.parse(localStorage.getItem('reviewed_courses')) || [];

    if (!reviewed_courses.includes(course_id)) {
        reviewed_courses.push(course_id);
        localStorage.setItem('reviewed_courses', JSON.stringify(reviewed_courses));
    }
}

function Check_If_Course_Reviewed(course_id) {
    let reviewed_courses = JSON.parse(localStorage.getItem('reviewed_courses')) || [];
    
    if (reviewed_courses.includes(course_id)) {
        REVIEW_FORM.ariaHidden = true;
        REVIEW_FORM.classList.add('is-hidden');
        Insert_Review_Submitted_Message();
    }
}

function Insert_Review_Submitted_Message() {
    let message = document.createElement("p");
    message.textContent = "You have submitted your review";
    message.classList.add("fw-bold", "fs-semimedium");
    REVIEW_FORM.insertAdjacentElement("afterend", message);
}

/* ==========================================================================
Runtime
========================================================================== */
Check_If_Course_Reviewed(COURSE_ID);
})();