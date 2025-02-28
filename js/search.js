(function () {
/* ==========================================================================
Constants, Variables, Data
========================================================================== */
const cards = document.querySelectorAll(".card");
const search = document.getElementById("search");

const search_timeout_interval = 500;  
let timer;               

/* ==========================================================================
Event Listeners
========================================================================== */
search.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer = setTimeout(Live_Search, search_timeout_interval);
});

/* ==========================================================================
Functions
========================================================================== */
function Live_Search() {
    const search_query = search.value.toLowerCase();

    for (let i = 0; i < cards.length; i++) {
        const title = cards[i].querySelector(".card__title").textContent.toLowerCase();

        if (title.includes(search_query)) {
            cards[i].classList.remove("is-hidden");
        } 
        else {
            cards[i].classList.add("is-hidden");
        }
    }
}
})();