<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= BASEURL?>images/Kostifyop.png" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?=BASEURL?>css/error.css">
        <title>Kostify | 403 Forbidden</title>
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
                        <span class="home__subtitle">Error 403 Forbidden</span>
                        <h1 class="home__title">Ups Nggaboleh yaa &#128545</h1>
                        
                        <a href="/kostifynative/public/" class="home__button">
                            Go Home
                        </a>
                    </div>

                    <div class="home__img">
                        <img src="<?=BASEURL?>images/403error.png" alt="">
                        <div class="home__shadow"></div>
                    </div>
                </div>

                <footer class="home__footer">
                    
                    <span><a href="https://ndfproject.my.id">ndfproject.my.id</a> |<a href="https://kostify.my.id"> kostify.my.id </a>| <a href="https://arabisgroup.cloud">arabisgroup.cloud</a> </span>
                </footer>
            </section>
        </main>

        <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

        <script src="assets/vendor/scrollreveal/errormain.js"></script>
    </body>
</html>