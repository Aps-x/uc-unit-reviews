(function () {
/* ==========================================================================
Constants, Variables, Data
========================================================================== */
const CARDS = document.querySelectorAll(".card");
const SEARCH = document.getElementById("search");

const SEARCH_TIMEOUT_INTERVAL = 500;  
let timer;               

/* ==========================================================================
Event Listeners
========================================================================== */
SEARCH.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer = setTimeout(Live_Search, SEARCH_TIMEOUT_INTERVAL);
});

/* ==========================================================================
Functions
========================================================================== */
function Live_Search() {
    const search_query = SEARCH.value.toLowerCase();

    for (let i = 0; i < CARDS.length; i++) {
        const title = CARDS[i].querySelector(".card__title").textContent.toLowerCase();

        if (title.includes(search_query)) {
            CARDS[i].classList.remove("is-hidden");
        } 
        else {
            CARDS[i].classList.add("is-hidden");
        }
    }
}
})();