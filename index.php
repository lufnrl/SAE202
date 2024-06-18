<?php
$titre = 'Jard\'Unis - Accueil';
$desc = 'Page d\'accueil de Jard\'Unis';
    require 'model/connectBD.php';
    require('composants/head.php');
    require('composants/header.php');
?> <div id="hero-image">
  <h1>JARD'UNIS</h1>
  <p>Ensemble, cultivons des espaces verts et développons une véritable culture du partage. Rejoignez-nous et découvrez les nombreux avantages du co-jardinage !</p>
  <a href="jardins.php">Réservez</a>
</div>
<div class="container">
  <div id="a-propos-container">
    <h2>Le concept de Jard'Unis</h2>
    <p>Notre site offre à chacun débutant ou expérimenté, la possibilité de réserver des parcelles de jardin pour cultiver, rencontrer d’autres passionnés et créer des liens. Notre plateforme facilite la mise en relation entre jardiniers de tous niveaux, favorisant le partage de connaissances et l'entraide. En cultivant ensemble, vous pouvez non seulement améliorer votre bien-être physique et mental, mais aussi participer à la création d'une communauté solidaire et écologique. Vous pouvez aussi mettre à disposition vos propres parcelles pour que d'autres jardiniers puissent en profiter.</p>
  </div>
  <div id="valeur-container">
    <h2>Nos valeurs</h2>
    <hr>
    <div id="valeur">
      <div class="valeur-fiche">
        <img src="./src/assets/img/icon3.png" alt="Icône bien-être et santé">
        <h3>Bien-être et santé</h3>
        <p>Le co-jardinage vous permet de cultiver des jardins partagés, favorisant votre activité physique et réduisant ainsi le risque de maladies chroniques. Il vous apaise également sur le plan mental, diminuant le stress et l’anxiété, et améliorant la qualité de votre sommeil.</p>
      </div>
      <div class="valeur-fiche">
        <img src="./src/assets/img/icon2.png" alt="Icône lien social">
        <h3>Lien social</h3>
        <p>Le co-jardinage vous permet de développer un esprit de communautarisme. Ces interactions permettent de réduire le sentiment d’isolement. Le co-jardinage offre la possibilité aux différentes générations de se rencontrer et d’apprendre les unes des autres.</p>
      </div>
      <div class="valeur-fiche">
        <img src="./src/assets/img/icon1.png" alt="Icône respect de l'environnement">
        <h3>Respect de l'environnement</h3>
        <p>Le co-jardinage contribue également à l’éducation et à la sensibilisation environnementale. Les participants apprennent sur les cycles de la nature, les techniques de jardinage durable, la biodiversité et l'importance de préserver les ressources naturelles.</p>
      </div>
    </div>
  </div>
  <div id="galerie-container">
    <h2>Nos potagers</h2>
    <hr>
    <div id="galerie">
      <div class="galerie-item large">
        <img src="./src/assets/img/potager2.jpg" alt="Image 1">
      </div>
      <div class="galerie-item small">
        <img src="./src/assets/img/potager1.jpg" alt="Image 2">
      </div>
      <div class="galerie-item small">
        <img src="./src/assets/img/potager3.jpg" alt="Image 3">
      </div>
      <div class="galerie-item large">
        <img src="./src/assets/img/potager4.jpg" alt="Image 4">
      </div>
    </div>
  </div>
  <div class="container-actualites">
    <div>
      <h2 class="title-blog-post">Les dernières actualités de Jard'Unis</h2>
      <hr>
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
              <p>Comment Démarrer un Projet de Cojardinage</p>
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
  <div class="carousel-container">
    <h2>Quelques avis</h2>
    <hr>
    <button class="carousel-button left" onclick="moveLeft()">&#10094;</button>
    <div class="carousel">
      <div class="carousel-content">
        <div class="carousel-item left-item">
          <div>
            <img src="src/assets/img/utilisateur1.jpg" alt="Utilisateur 1 Image">
            <h4>Karim</h4>
          </div>
          <p>Je suis très heureux de pouvoir à nouveau assouvir ma passion du jardinage, et mes enfants aussi. J’adore toucher la terre, c’est un réel plaisir de récolter ce que l’on a semé et de partager les récoltes avec d’autres personnes.</p>
          <p class="carousel-time">Il y a 1h</p>
        </div>
        <div class="carousel-item right-item">
          <div>
            <img src="src/assets/img/utilisateur2.jpg" alt="Utilisateur 2 Image">
            <h4>Juliette</h4>
          </div>
          <p>Je suis enchantée. Au-delà du jardinage, c’est une véritable aventure humaine. Et voir mon jardin ainsi entretenu me donne du courage.</p>
          <p class="carousel-time">Il y a 3j</p>
        </div>
        <div class="carousel-item left-item">
          <div>
            <img src="src/assets/img/utilisateur3.jpg" alt="Utilisateur 3 Image">
            <h4>Damien</h4>
          </div>
          <p>J’ai ce terrain mais je n’ai pas beaucoup de temps ni d’idées pour le faire fructifier. Je suis heureux que Hugo et Louise puissent en profiter. Ils me sont d’une grande aide. C’est un véritable échange gagnant-gagnant.</p>
          <p class="carousel-time">Il y a 5j</p>
        </div>
        <div class="carousel-item right-item">
          <div>
            <img src="src/assets/img/utilisateur4.jpg" alt="Utilisateur 4 Image">
            <h4>Monique</h4>
          </div>
          <p>Je n’ai jamais eu un jardin aussi beau et bien cultivé grâce à Sylvie. Une femme passionnée de jardinage et pleine d’idées.</p>
          <p class="carousel-time">Il y a 14h</p>
        </div>
      </div>
    </div>
    <button class="carousel-button right" onclick="moveRight()">&#10095;</button>
  </div>
</div>
<div id="remonter">
  <button class="button" onclick="scrollToTop()" title="Haut-de-page">
    <svg class="svgIcon" viewBox="0 0 384 512">
      <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"></path>
    </svg>
  </button>
</div>
<?php require("./composants/footer.php") ?> 