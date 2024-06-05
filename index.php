
<?php
require 'model/connectBD.php';
require('composants/head.php');
require('composants/header.php');
?>

    <div id="hero-image">
        <h1>Potagers Partagés</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sunt suscipit sit quas blanditiis asperiores quibusdam provident quidem facilis libero ratione eius soluta nihil vero officia, dicta magni quasi enim.</p>
        <a href=#>En savoir plus</a>
    </div>

    <div id="a-propos-container">
        <h2>A propos</h2>
        <hr>
        <div id="a-propos">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis officia corporis at, dolorem vitae unde fuga aperiam minima beatae amet ipsa aliquid perspiciatis sint commodi sunt alias ut reiciendis molestiae.</p>
        </div>
    </div>

    <div class="carousel-container">
        <h2>Actualités</h2>
        <hr>
        <button class="carousel-button left" onclick="moveLeft()">&#10094;</button>
        <div class="carousel">
            <div class="carousel-content">
            <div class="carousel-item">
                <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                <div>
                <h3>Titre de l'actualité</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis officia corporis at, dolorem vitae unde fuga aperiam minima beatae amet ipsa aliquid perspiciatis sint commodi sunt alias ut reiciendis molestiae.</p>
                <a href=#>Lire</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                <div>
                <h3>Titre de l'actualité</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis officia corporis at, dolorem vitae unde fuga aperiam minima beatae amet ipsa aliquid perspiciatis sint commodi sunt alias ut reiciendis molestiae.</p>
                <a href=#>Lire</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://media.istockphoto.com/id/1418173645/fr/photo/jardin-potager.jpg?s=612x612&w=0&k=20&c=s7I6neg1CBE0kl0dcBJbv2Y5VpsjySfxCUsS2eLH4zE=" alt="Article Image">
                <div>
                <h3>Titre de l'actualité</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut rem animi nam enim quasi. Repellat, suscipit. Illo at ab laudantium sequi laborum quos numquam ex aliquam! Explicabo, quod itaque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, laboriosam iure consequatur maxime et exercitationem, minima placeat obcaecati esse, consequuntur dolores quia iste nesciunt eligendi quibusdam amet quam voluptatibus omnis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis officia corporis at, dolorem vitae unde fuga aperiam minima beatae amet ipsa aliquid perspiciatis sint commodi sunt alias ut reiciendis molestiae.</p>
                <a href=#>Lire</a>
                </div>
            </div>
            </div>
        </div>
        <button class="carousel-button right" onclick="moveRight()">&#10095;</button>
    </div>

    <script src="./src/assets/js/script.js"></script>
    
<?php
require('composants/footer.php');
?>