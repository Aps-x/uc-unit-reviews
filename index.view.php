<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UC Unit Reviews</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet"></head>

    <?php require 'php/index.php' ?>
    <script src="js/search.js" defer></script>
<body class="home">
    <div class="texture"></div>
    <header class="header | content-column flow">
        <h1 class="header__title">UC Unit Reviews</h1>
        <p class="header__subtitle">
            User submitted reviews (You've been warned) for a handful of UC courses.
        </p>
    </header>
    <main class="home__main | content-column">
        <section class="home__controls">
            <h2 class="visually-hidden">Controls</h2>

            <label class="visually-hidden" for="search">Search for a course: </label>
            <input class="search" id="search" type="text" placeholder="Search for a course">

            <label class="visually-hidden" for="dropdown">Sort by: </label>
            <select class="dropdown" id="dropdown">
                <option value="">Rating</option>
                <option value="">Alphabetical</option>
                <option value="">Enjoyability</option>
                <option value="">Usefulness</option>
                <option value="">Manageability</option>
            </select>
        </section>

        <section class="home__units">
            <h2 class="visually-hidden">Units</h2>

            <div class="home__grid | grid-auto-fill">
                <a href="">
                    <article class="card | flow">
                        <header class="card__header">
                            <h3 class="card__title">Database Design</h3>
                            <div>
                                <div class="card__star-rating">★★★★★</div>
                                <p class="card__review-count">80 Reviews</p>
                            </div>
                        </header>
    
    
                        <p class="card__description | line-clamp">
                            This unit introduces a practical approach to the development and design of 
                            database systems. The emphasis is placed on relational database management 
                            systems, their development and implementation in a modern organisational 
                            environment. The use of modern query languages for relational databases is 
                            discussed and experienced. Conceptual, logical and physical database design 
                            issues are also covered. Other topics include client server database computing 
                            and database administration issues. 
                        </p>
                    </article>
                </a>



                <a href="">
                    <article class="card | flow">
                        <header class="card__header">
                            <h3 class="card__title">Database Design</h3>
                            <div>
                                <div class="card__star-rating">★★★★★</div>
                                <p class="card__review-count">80 Reviews</p>
                            </div>
                        </header>
    
    
                        <p class="card__description | line-clamp">
                            This unit introduces a practical approach to the development and design of 
                            database systems. The emphasis is placed on relational database management 
                            systems, their development and implementation in a modern organisational 
                            environment. The use of modern query languages for relational databases is 
                            discussed and experienced. Conceptual, logical and physical database design 
                            issues are also covered. Other topics include client server database computing 
                            and database administration issues. 
                        </p>
                    </article>
                </a>


                <a href="">
                    <article class="card | flow">
                        <header class="card__header">
                            <h3 class="card__title">Database Design</h3>
                            <div>
                                <div class="card__star-rating">★★★★★</div>
                                <p class="card__review-count">80 Reviews</p>
                            </div>
                        </header>
    
    
                        <p class="card__description | line-clamp">
                            This unit introduces a practical approach to the development and design of 
                            database systems. The emphasis is placed on relational database management 
                            systems, their development and implementation in a modern organisational 
                            environment. The use of modern query languages for relational databases is 
                            discussed and experienced. Conceptual, logical and physical database design 
                            issues are also covered. Other topics include client server database computing 
                            and database administration issues. 
                        </p>
                    </article>
                </a>
            </div>
        </section>
    </main>
    <footer class="footer">
        <a href="https://github.com/Aps-x/uc-unit-reviews">This project is open source</a>
    </footer>
</body>
</html>