
<?php
require 'model/connectBD.php';
require('composants/head.php');
require('composants/header.php');
?>

    <div id="hero-image">
        <h1>Potagers Partagés</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sunt suscipit sit quas blanditiis asperiores quibusdam provident quidem facilis libero ratione eius soluta nihil vero officia, dicta magni quasi enim.</p>
        <a href=#>Réservez</a>
    </div>

    <div id="a-propos-container">
        <h2>Qui nous sommes</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis officia corporis at, dolorem vitae unde fuga aperiam minima beatae amet ipsa aliquid perspiciatis sint commodi sunt alias ut reiciendis molestiae.</p>
        <div id="a-propos">
            <div class="valeur"><img src="./src/assets/img/icon1.png"></div>
            <div class="valeur"><img src="./src/assets/img/icon2.png"></div>
            <div class="valeur"><img src="./src/assets/img/icon3.png"></div>
        </div>
    </div>

    <div class="carousel-container">
        <h2>Ce qu'ils en pensent</h2>
        <hr>
        <button class="carousel-button left" onclick="moveLeft()">&#10094;</button>
        <div class="carousel">
            <div class="carousel-content">
                <div class="carousel-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item">
                    <div>
                        <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                        <h4>Utilisateur</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. </p>
                    <p>Il y a 1h</p>
                </div>

                <div class="carousel-item">
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
    
<?php
require('composants/footer.php');
?>