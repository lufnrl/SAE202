<?php
    require('composants/head.php');
    require('composants/header.php');
?>

<div id="hero-image">
    <h1>Potagers Partagés</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sunt suscipit sit quas blanditiis asperiores quibusdam provident quidem facilis libero ratione eius soluta nihil vero officia, dicta magni quasi enim.</p>
    <a href=#>Réservez</a>
</div>

<div class="container">

    <div class="container">
        <div class="row">
            <div>
                <h2 class="title-blog-post">Les dernières <span class="news-title">actualités</span> de Jard'Unis</h2>
                <hr>
            </div>
        </div>
        <div class="grid">
            <div>
                <div class="card">
                    <img src="https://media.ouest-france.fr/v1/pictures/MjAyMDAxYTIwY2VkYTQ5ZDg5MTJiMjJiNjVlOWE4NDYwNDc5M2E?width=1260&height=708&focuspoint=50%2C25&cropresize=1&client_id=bpeditorial&sign=f67a91b52254588966b1c0a8a7044e608df233526a129b54cac8c9aad62c58fd" class="card-img-top" alt="Opération de nettoyage">
                    <div class="card-body">
                        <h5 class="card-title">Les Avantages du Cojardinage</h5>
                        <div class="list-item-blog">
                            <p>Une Nouvelle Façon de Cultiver en Communauté</p>
                            <p>15 juin 2024</p>
                        </div>
                        <a href="#" class="link-blog">Lire l'article</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <img src="https://images.ladepeche.fr/api/v1/images/view/603c69b5d286c24f523e17ba/large/image.jpg?v=1" class="card-img-top" alt="Conférence sur la biodiversité">
                    <div class="card-body">
                        <h5 class="card-title">Démarrer un Projet de Cojardinage</h5>
                        <div class="list-item-blog">
                            <p>Comment Démarrer un Projet de Cojardinage dans Votre Quartier</p>
                            <p>22 juillet 2024</p>
                        </div>
                        <a href="#" class="link-blog">Lire l'article</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <img src="https://almagrownintown.fr/cdn/shop/products/Collection-ATELIER-agriculture-urbaine-apprendre-a-jardiner-en-ville-ALMA-GROWN-IN-TOWN_2000x.jpg?v=1610129284" class="card-img-top" alt="Campagne Océans Propres">
                    <div class="card-body">
                        <h5 class="card-title">Le Cojardinage Urbain</h5>
                        <div class="list-item-blog">
                            <p>Réponses à Vos Questions</p>
                            <p>1er août 2024</p>
                        </div>
                        <a href="#" class="link-blog">Lire l'article</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 90vw;
            margin: 100px auto;
            padding: 0 20px;
        }

        .title-blog-post {
            text-align: left;
            font-size: 2em;
        }


        row, hr {
            margin: 10px 0 50px 0;
            max-width: 200px;
            border: 2px solid #84A170;
            height: 0px;
            width: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(600px, 1fr));
            gap: 20px;
        }

        .card {
            overflow: hidden;
            margin: 20px 20px 20px 0;
            transform: scale(1.0);
            transition: transform 0.5s;
        }

        .card:hover {
            transform: scale(1.05);
            transition: transform 0.5s;
            cursor: pointer;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding-top: 20px;
        }

        .card-title {
            font-size: 1.5em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .list-item-blog {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: gray;
            font-weight: lighter;
        }

        .link-blog {
            color: #84A170;
            text-decoration: none;
        }
    </style>

    <div id="a-propos-container">
        <h2>À propos de Jard'Unis</h2>
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
</div>

<?php require("./composants/footer.php") ?>

<div id="remonter">
    <button class="button" onclick="scrollToTop()" title="Haut-de-page">
        <svg class="svgIcon" viewBox="0 0 384 512" fill="darkgreen">
            <path
                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
            ></path>
        </svg>
    </button>
</div>


    <script src="./src/assets/js/script.js"></script>

<style>
    body {
        background-color: #f5efe6;
    }

    #link-inscription {
        background-color: #84A170;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    #hero-image {
        height: 60vh;
        background-position: center;
    }

    #hero-image a {
        background-color: #84A170;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    #a-propos-container {
        background-color: #8E9B6D;
        max-width: 90vw;
        margin: 100px auto;
        text-align: center;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #a-propos-container p {
        text-align: center;
    }

    #valeur-container {
        margin: 0;
        padding: 100px;
    }

    .valeur-fiche {
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .valeur-fiche h3 {
        font-weight: bold;
        text-align: left;
    }

    .valeur-fiche p {
        text-align: left;
    }

    .valeur-fiche img {
        max-width: 150px;
    }

    .carousel-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #footer-reseaux-sociaux {
        background-color: #84A170;
    }

    #footer-colonne {
        background-color: #84A170;
    }

    #footer-mentions-legales {
        background-color: #84A170;
    }
</style>