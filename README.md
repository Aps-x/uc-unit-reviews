# uc-unit-reviews

![Image](https://github.com/user-attachments/assets/b7a5235f-b3a5-4fe9-ab9f-1e5fd4363989)

## Overview

I made this website to learn PHP and back-end web development. This website allows users to create and view reviews for units at the University of Canberra. I don't have access to the UC courses database, so I manually added courses relevant to IT students as I assumed they would be the primary users of this website, if it gets used at all lol. 

This is my first project in PHP, so that part of the codebase might not be amazing, but I am really proud of the frontend and I think it is my best work so far. 
### CSS
All of my styles are in the single stylesheet because I knew it was going to be a small site. The organisation of my style.css file follows the 7-1 pattern and, as always, I am following the BEM naming convention to organise my styles into components. This is the first project where I used container queries and SASS mixins. Container queries are really nice; I enjoyed working with them and found them very intuitive. I used one mixin for the box shadow that is used on the cards, search bar, and sort dropdown. You could definitely go crazy and use mixins as a replacement for layout classes, but I don’t think that is a good idea at this time. Still pretty neat for repeating a class across different classes that need slight variations.
### PHP
My experience with PHP was really nice and simple. I liked that I could just link files instead of having a framework do a ton of magic behind the curtains. When I used ASP.NET for university, I found it to be a bit of a frustrating blackbox, but now that I have used PHP, I appreciate all the heavy-lifting it was doing for me and I now understand the reasons behind its opinionated structure.
### JS
Before this project, I thought that separate Javascript files were totally disconnected from one another. However, I learnt that they do in fact share a global scope. I used IIFEs (Immediately Invoked Function Expression) to prevent polluting the global scope and keep each file completely separate.

![Image](https://github.com/user-attachments/assets/96a8db83-fa90-48e3-b59a-13bd64a40183)
