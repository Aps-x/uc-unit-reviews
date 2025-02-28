<?php require '../controllers/course.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Adam Seaton">
    <meta name="description" content="University of Canberra IT unit reviews">

    <title>UC Unit Reviews | <?= $course_info["title"]; ?></title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="course">
    <div class="texture"></div>

    <nav class="top-nav">
        <a href="../../index.view.php">
            <button class="button" type="submit">
                <span class="button__shadow"></span>
                <span class="button__edge"></span>
                <span class="button__front">← Go Back</span>
            </button>
        </a>
    </nav>

    <main class="course-main | content-column grid-auto-fit">
        <section class="flow">

            <h1 class="fw-bold fs-semilarge"><?= $course_info["title"] . " " . $course_info["id"]; ?> </h1>

            <h2 class="visually-hidden">Unit details</h2>

            <div class="star-rating" style="--rating: <?= $course_derived_info['avg_rating'] ?>;" aria-label="Rating of this product is <?= $course_derived_info['avg_rating'] ?> out of 5."></div>
            <p class="inline-block"><?= $course_derived_info["review_count"] ?></p>

            <div class="flexbox-grid | min-auto">
                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $course_derived_info["avg_enjoyability"] ?></span>
                    </div>
                    <p class="rating__label">Enjoyability</p>
                </div>

                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $course_derived_info["avg_usefulness"] ?></span>
                    </div>
                    <p class="rating__label">Usefulness</p>
                </div>

                <div class="rating">
                    <div class="rating__circle">
                        <span class="rating__value"><?= $course_derived_info["avg_manageability"] ?></span>
                    </div>
                    <p class="rating__label">Manageability</p>
                </div>
            </div>
            
            <h3 class="fw-bold fs-medium">Description</h3>

            <p>
                <?= $course_info["description"]; ?>
            </p>

            <h3 class="fw-bold fs-medium">Write A Review</h3>

            <form class="review-form" action="" method="post">
                <div>
                    <label for="terms">I understand not to be a dick</label>
                    <input type="checkbox" name="terms" id="terms">
                </div>

                <input class="review-form__input" type="text" name="" id="" placeholder="Title">

                <textarea class="review-form__textarea" name="" id="" placeholder="What was your experience? How difficult, enjoyable, and useful was this course for you?"></textarea>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="rating">Overall Rating:</label>
                    <input class="review-form__slider" type="range" name="rating" id="rating" min="0" max="5" placeholder="0" oninput="this.nextElementSibling.value = this.value">
                    <output for="rating">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="enjoyment">Enjoyability:</label>
                    <input class="review-form__slider" type="range" name="enjoyment" id="enjoyment" min="0" max="5" placeholder="0" oninput="this.nextElementSibling.value = this.value">
                    <output for="enjoyment">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="usefulness">Usefulness:</label>
                    <input class="review-form__slider" type="range" name="usefulness" id="usefulness" min="0" max="5" placeholder="0" oninput="this.nextElementSibling.value = this.value">
                    <output for="usefulness">3</output>
                </div>

                <div class="review-form__slider-group">
                    <label class="fw-bold" for="manageability">Manageability:</label>
                    <input class="review-form__slider" type="range" name="manageability" id="manageability" min="0" max="5" placeholder="0" oninput="this.nextElementSibling.value = this.value">
                    <output for="manageability">3</output>
                </div>

                <div class="review-form__input-group">
                    <label class="fw-bold" for="completion">Course Completion:</label>
                    <input class="review-form__input" type="text" name="completion" id="completion" placeholder="2023 S1">
                </div>

                <div class="review-form__input-group">
                    <label class="fw-bold" for="grade">Grade:</label>
                    <input class="review-form__input" type="number" name="grade" id="completion" min="0" max="100" value="50">
                </div>

                <button class="button" type="submit">
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
                        <p class="inline-block">Overall rating:</p>
                        <div class="star-rating" style="--rating: <?= $review['rating'] ?>;" aria-label="Rating of this product is <?= $course_derived_info['avg_rating'] ?> out of 5."></div>
                    </div>

                    <p class="review__body"><?= $review['text'] ?></p>

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

                    <div class="flexbox-grid | min-auto txt-center">
                        <div>
                            <p class="inline-block fw-bold">Term taken:</p>
                            <div class="inline-block"><?= $review['completion'] ?></div>
                        </div>
        
                        <div>
                            <p class="inline-block fw-bold">Grade:</p>
                            <div class="inline-block"><?= $review['grade'] ?></div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

        </section>
    </main>
</body>
</html>