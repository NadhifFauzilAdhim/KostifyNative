<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= BASEURL?>images/Kostifyop.png" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?=BASEURL?>css/error.css">
        <title>Kostify | 404 Not Found</title>
    </head>
    <body>
        <header class="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="<?=BASEURL?>/images/kostifyop.png" width="100px" alt="">
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#" class="nav__link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__link">Contact</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>
                </div>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
        </header>

        <main class="main">
            <section class="home">
                <div class="home__container container">
                    <div class="home__data">
                        <span class="home__subtitle">Error 404 Not Found</span>
                        <h1 class="home__title">Yahh ngga ketemu &#128546</h1>
                        <p class="home__description">
                            We can't seem to find the page <br> you are looking for.
                        </p>
                        <a href="/kostifynative/public/" class="home__button">
                            Go Home
                        </a>
                    </div>

                    <div class="home__img">
                        <img src="<?=BASEURL?>images/ghost-img.png" alt="">
                        <div class="home__shadow"></div>
                    </div>
                </div>

                <footer class="home__footer">
                    
                    <span>ndfproject.my.id</span>
                </footer>
            </section>
        </main>

        <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

        <script src="assets/vendor/scrollreveal/errormain.js"></script>
    </body>
</html>