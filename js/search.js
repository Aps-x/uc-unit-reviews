const cards = document.querySelectorAll('.card');
const search = document.getElementById("search");

function liveSearch() {
    let search_query = search.value.toLowerCase();

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector('.card__title').textContent.toLowerCase();

        if (title.includes(search_query)) {
            cards[i].classList.remove("is-hidden");
        } 
        else {
            cards[i].classList.add("is-hidden");
        }
    }
}

// Avoid blocking the event loop by adding a delay
let timer;               
const search_timeout_interval = 500;  

search.addEventListener('keyup', () => {
    clearTimeout(timer);
    timer = setTimeout(liveSearch, search_timeout_interval);
});