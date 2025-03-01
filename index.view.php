<?php require 'php/controllers/index.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Adam Seaton">
    <meta name="description" content="University of Canberra IT unit reviews">

    <title>UC Unit Reviews</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">

    <script src="js/search.js" defer></script>
    <script src="js/sort.js" defer></script>
</head>
<body class="home">

    <div class="texture"></div>

    <header class="header | content-column flow">
        <h1 class="header__title">UC Unit Reviews</h1>
        <p class="header__subtitle">
            User submitted reviews (You've been warned) for a handful of UC courses.
        </p>
    </header>

    <main class="home-main | content-column">
        <section class="home-controls">
            <h2 class="visually-hidden">Controls</h2>

            <label class="visually-hidden" for="search">Search for a course: </label>
            <input class="search" id="search" type="text" placeholder="Search for a course">

            <label class="visually-hidden" for="dropdown">Sort by: </label>
            <select class="dropdown" id="dropdown">
                <option value="rating">Rating</option>
                <option value="alpha-a-z">Alphabetical (A-Z)</option>
                <option value="alpha-z-a">Alphabetical (Z-A)</option>
            </select>
        </section>

        <section class="home-units">
            <h2 class="visually-hidden">Units</h2>

            <div class="home-grid | grid-auto-fill">
                <?php foreach ($courses_list as $course): ?>
                    <?php $derived_course_info = Get_Derived_Course_Info_Array($conn, $course['id']); ?>
                    <article class="card">
                        <a href="php/views/course.view.php?course=<?= urlencode($course['id']) ?>" class="flow">
                            <header class="card__header">
                                <h3 class="card__title"><?= $course['title'] ?> (<?= $course['id'] ?>)</h3>

                                <div>
                                    <div class="star-rating" style="--rating: <?= $derived_course_info['avg_rating'] ?>;" aria-label="Rating of this product is <?= $derived_course_info['avg_rating'] ?> out of 5."></div>
                                    <p><?= $derived_course_info['review_count'] ?> Reviews</p>
                                </div>
                            </header>
                            
                            <p class="card__description | line-clamp"><?= $course['description'] ?></p>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>This project is unofficial and is not affiliated or endorsed in any way by the University of Canberra</p>
        <a href="https://github.com/Aps-x/uc-unit-reviews">This project is open source</a>
    </footer>
</body>
</html>