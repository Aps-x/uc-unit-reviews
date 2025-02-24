const cards = document.querySelectorAll('.card');

function liveSearch() {
    let search_query = document.getElementById("search").value.toLowerCase();

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector('.card__title').textContent.toLowerCase();

        if (title.includes(search_query)) {
            cards[i].classList.remove("is-hidden");
        } else {
            cards[i].classList.add("is-hidden");
        }
    }
}

// A little delay
let typingTimer;               
let typeInterval = 500;  
let searchInput = document.getElementById('search');

searchInput.addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(liveSearch, typeInterval);
});