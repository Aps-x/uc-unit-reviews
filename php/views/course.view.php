<?php require '../controllers/course.controller.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Adam Seaton">
    <meta name="description" content="University of Canberra IT unit reviews">
    <meta name="keywords" content="University, Canberra, UC, Unit, Course, Reviews, IT, Software, Engineering">
    <link rel="shortcut icon" href="../../images/favicon.jpg" type="image/x-icon">

    <title>UC Unit Reviews | <?= $course_info["title"]; ?></title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">

    <script src="../../js/prevent_multiple_review_submission.js" defer></script>
    <script src="../../js/show_hide_review_text.js" defer></script>
</head>
<body class="course">
    <div class="texture"></div>

    <nav class="top-nav">
        <a href="../../index.php" class="button">
            <span class="button__shadow"></span>
            <span class="button__edge"></span>
            <span class="button__front">← Go Back</span>
        </a>
    </nav>

    <main class="course-main | content-column grid-auto-fit">
        <section class="flow">

            <h1 class="fw-bold fs-semilarge"><?= $course_info["title"] . "" . $course_info["id"]; ?> </h1>

            <h2 class="visually-hidden">Unit details</h2>

            <div class="star-rating" style="--rating: <?= $derived_course_info['avg_rating'] ?>;" aria-label="Rating of this product is <?= $derived_course_info['avg_rating'] ?> out of 5."></div>
            <p class="inline-block"><?= $derived_course_info["review_count"] ?></p>

            <div class="flexbox-grid | min-auto">
                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $derived_course_info["avg_enjoyability"] ?></span>
                    </div>
                    <p class="rating__label">Enjoyability</p>
                </div>

                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $derived_course_info["avg_usefulness"] ?></span>
                    </div>
                    <p class="rating__label">Usefulness</p>
                </div>

                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $derived_course_info["avg_manageability"] ?></span>
                    </div>
                    <p class="rating__label">Manageability</p>
                </div>
            </div>
            
            <h3 class="fw-bold fs-medium">Description</h3>

            <p><?= $course_info["description"]; ?></p>

            <h2 class="fw-bold fs-medium">Write A Review</h2>

            <form class="review-form" method="post" id="review_form">
                <label class="visually-hidden" for="title">Title your review:</label>
                <input class="review-form__input" type="text" name="title" id="title" placeholder="Title">

                <label class="visually-hidden" for="text">Write your review:</label>
                <textarea class="review-form__textarea" name="text" id="text" placeholder="What was your experience? How difficult, enjoyable, and useful was this course for you?"></textarea>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="rating">Overall Rating:</label>
                    <input class="review-form__slider" type="range" name="rating" id="rating" min="0" max="5" oninput="this.nextElementSibling.value = this.value">
                    <output for="rating">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="enjoyability">Enjoyability:</label>
                    <input class="review-form__slider" type="range" name="enjoyability" id="enjoyability" min="0" max="5" oninput="this.nextElementSibling.value = this.value">
                    <output for="enjoyability">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="usefulness">Usefulness:</label>
                    <input class="review-form__slider" type="range" name="usefulness" id="usefulness" min="0" max="5" oninput="this.nextElementSibling.value = this.value">
                    <output for="usefulness">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="manageability">Manageability:</label>
                    <input class="review-form__slider" type="range" name="manageability" id="manageability" min="0" max="5" oninput="this.nextElementSibling.value = this.value">
                    <output for="manageability">3</output>
                </div>

                <div class="review-form__input-group">
                    <label class="fw-bold" for="completion">Course Completion:</label>
                    <input class="review-form__input" type="text" name="completion" id="completion" placeholder="2023 S1">
                </div>

                <div class="review-form__input-group">
                    <label class="fw-bold" for="grade">Grade:</label>
                    <input class="review-form__input" type="number" name="grade" id="grade" min="0" max="100" value="50">
                </div>

                <button class="button" id="submit" name="review" type="submit" data-course="<?= $course_info["id"]; ?>">
                    <span class="button__shadow"></span>
                    <span class="button__edge"></span>
                    <span class="button__front">Submit</span>
                </button>
            </form>
            
        </section>

        <section>
            <h2 class="fw-bold fs-extramedium">Reviews</h2>  
            <?php foreach ($course_reviews as $review): ?>
                <article class="review | flow">
                    <h3 class="review__title"><?= $review['title'] ?></h3>

                    <div>
                        <p class="inline-block fw-bold">Overall rating:</p>
                        <div class="star-rating" style="--rating: <?= $review['rating'] ?>;" aria-label="Rating of this product is <?= $derived_course_info['avg_rating'] ?> out of 5."></div>
                    </div>

                    <p class="review__body | line-clamp" id="<?= $review['id'] ?>"><?= $review['text'] ?></p>

                    <button class="review__show-hide-btn" aria-expanded="false" aria-controls="<?= $review['id'] ?>">
                        See more
                    </button>

                    <div class="flexbox-grid | min-auto">
                        <div class="rating">
                            <div class="rating__circle">
                                <span class="rating__value"><?= $review['enjoyability'] ?></span>
                            </div>
                            <p class="rating__label">Enjoyment</p>
                        </div>
        
                        <div class="rating">
                            <div class="rating__circle">
                                <span class="rating__value"><?= $review['usefulness'] ?></span>
                            </div>
                            <p class="rating__label">Usefulness</p>
                        </div>
        
                        <div class="rating">
                            <div class="rating__circle">
                                <span class="rating__value"><?= $review['manageability'] ?></span>
                            </div>
                            <p class="rating__label">Manageability</p>
                        </div>
                    </div>

                    <div class="flexbox-grid | min-auto txt-center fw-bold">
                        <p>Term taken: <span class="fw-regular"><?= $review['completion'] ?></span></p>
                        <p>Grade: <span class="fw-regular"><?= $review['grade'] ?></span></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>