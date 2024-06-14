<?php
    require 'model/connectBD.php';
    require 'composants/head.php';
    require 'composants/header.php';
?>

<section id="contact">
  
    <h1 class="section-header">Contact</h1>
    
    <div class="contact-wrapper">
  
    <!-- Left contact page --> 
    
    <form id="contact-form" class="form-horizontal" role="form" method="post" action="traitements/verifFormContact.php">
       
      <div class="form-group">
          <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="" required>
          <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" value="" required>
      </div>

      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="" required>

      <textarea class="form-control" rows="10" placeholder="Message" name="message" required></textarea>
      
      <button class="btn btn-primary send-button" id="submit" type="submit" value="ENVOYER">
          <div class="alt-send-button">
            <span class="send-text">ENVOYER</span>
          </div>
      </button>
      
    </form>
    
  <!-- Right contact page --> 
    
    <div class="direct-contact-container">

    <ul class="contact-list">
      <li class="list-item"><i class="fas fa-home"></i><p class="contact-text place">Association des jardins ouvriers et familiaux de Troyes</p></li>
      <li class="list-item"><i class="fas fa-map-marker-alt"></i><p class="contact-text place">125 AVENUE ROBERT SCHUMANN 10000 TROYES</p></li>
      <li class="list-item"><i class="fas fa-phone-alt"></i><p class="contact-text phone"><a href="tel:+33 3 25 80 97 04" title="Appelez">+33 3 25 80 97 04</a></p></li>
      <li class="list-item"><i class="fas fa-envelope"></i><p class="contact-text gmail"><a href="mailto:lesjardinsouvriers3@outlook.fr" title="Envoyez un mail">lesjardinsouvriers3@outlook.fr</a></p></li>
    </ul>

    </div>
    
    </div>
  
</section>  
  
  


<?php require("./composants/footer.php") ?>

<script src="./src/assets/js/script.js"></script>

