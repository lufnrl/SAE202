<?php
    require('composants/head.php');
    require('composants/header.php');
?>

    <div id="hero-image">
        <h1>Potagers Partagés</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sunt suscipit sit quas blanditiis asperiores quibusdam provident quidem facilis libero ratione eius soluta nihil vero officia, dicta magni quasi enim.</p>
        <a href=#>Réservez</a>
    </div>

    <div id="a-propos-container">
        <h2>Notre concept</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>     
    </div>

    <div id="valeur-container">
        <h2>Nos valeurs</h2>
        <hr>
        <div id="valeur">
            <div class="valeur-fiche">
                <img src="./src/assets/img/icon3.png">
                <h3>Bien-être et santé</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit exercitationem voluptas sunt fugit, tempore corporis, nemo fuga natus dolorem sint non rem dolore nihil. Dolor pariatur molestiae beatae illo ut.</p>
            </div>
            <div class="valeur-fiche">
                <img src="./src/assets/img/icon2.png">
                <h3>Lien social</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit exercitationem voluptas sunt fugit, tempore corporis, nemo fuga natus dolorem sint non rem dolore nihil. Dolor pariatur molestiae beatae illo ut.</p>
            </div>
            <div class="valeur-fiche">
                <img src="./src/assets/img/icon1.png">
                <h3>Respect de l'environnement</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit exercitationem voluptas sunt fugit, tempore corporis, nemo fuga natus dolorem sint non rem dolore nihil. Dolor pariatur molestiae beatae illo ut.</p>
            </div>
        </div>
    </div>

    <div id="galerie-container">
        <h2>Nos potagers</h2>
        <hr>
        <div id="galerie">
            <div class="galerie-item large"><img src="./src/assets/img/potager2.jpg" alt="Image 1"></div>
            <div class="galerie-item small"><img src="./src/assets/img/potager1.jpg" alt="Image 2"></div>
            <div class="galerie-item small"><img src="./src/assets/img/potager3.jpg" alt="Image 3"></div>
            <div class="galerie-item large"><img src="./src/assets/img/potager4.jpg" alt="Image 4"></div>
        </div>
    </div>

    <div class="carousel-container">
        <h2>Quelques avis</h2>
        <hr>
        <button class="carousel-button left" onclick="moveLeft()">&#10094;</button>
        <div class="carousel">
            <div class="carousel-content">
                <div class="carousel-item left-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item right-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item left-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item right-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>
            </div>
        </div>
        <button class="carousel-button right" onclick="moveRight()">&#10095;</button>
    </div>

    <?php require("./composants/footer.php") ?>

    <script src="./src/assets/js/script.js"></script>