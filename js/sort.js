(function () {
/* ==========================================================================
Constants, Variables, Data
========================================================================== */
const CARDS = document.querySelectorAll(".card");
const DROPDOWN = document.getElementById("dropdown");

/* ==========================================================================
Event Listeners
========================================================================== */
DROPDOWN.addEventListener("change", (event) => {
    Sort_Cards(event.target.value);
});

/* ==========================================================================
Functions
========================================================================== */
function Sort_Cards(criteria) {
    let sorted_cards;

    if (criteria === "rating") {
        sorted_cards = Array.from(CARDS).sort((a, b) => {
            const rating_a = parseFloat(getComputedStyle(a.querySelector(".star-rating")).getPropertyValue("--rating")) || 0;
            const rating_b = parseFloat(getComputedStyle(b.querySelector(".star-rating")).getPropertyValue("--rating")) || 0;
            return rating_b - rating_a;
        });
    }
    else if (criteria === "alpha-a-z") {
        sorted_cards = Array.from(CARDS).sort((a, b) => {
            const title_a = a.querySelector(".card__title").textContent.trim().toLowerCase();
            const title_b = b.querySelector(".card__title").textContent.trim().toLowerCase();
            return title_a.localeCompare(title_b);
        });
    }
    else if (criteria === "alpha-z-a") {
        sorted_cards = Array.from(CARDS).sort((a, b) => {
            const title_a = a.querySelector(".card__title").textContent.trim().toLowerCase();
            const title_b = b.querySelector(".card__title").textContent.trim().toLowerCase();
            return title_b.localeCompare(title_a);
        });
    }

    sorted_cards.forEach((card, index) => {
        card.style.order = index;
    });
}
/* ==========================================================================
Runtime
========================================================================== */
Sort_Cards("rating");
})();