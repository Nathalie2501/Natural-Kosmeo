<main id="addTutos">

  <?php
  echo '<section>';
  if (isset($NewTutos)) 
  {
    echo '<p>'.$NewTutos->getNom().'</p>';
    echo '<img src="'.WEBROOT.'img/'.$NewTutos->getImg().'">';
    echo '<p>'.$NewTutos->getDescription().'</p>';
  }
  echo '</section>';

  ?>
  <!--form adding steps-->
  <section>
    <!--input hidden pour envoyer l'id du nouveau tutos-->
    <input type="hidden" name="fk_tutos" value="<?= $NewTutos->getId() ?>">


    <form id="regForm" action="<?php echo WEBROOT ?>Etapes/addEtapes" method="POST" enctype="multipart/form-data" id="formTutos">

      <h1>Saisie de votre tuto beauté :</h1>

      <!-- One "tab" for each step in the form: -->
      <div class="tab"> Première étape 
        <p><input name="nom" placeholder="Titre..." oninput="this.className = ''"></p>
        
        <p><input name="description" type="textarea" placeholder="Description..." oninput="this.className = ''"></p>
        <p><input name="img" type="file" placeholder="Image..." oninput="this.className = ''"></p>
      </div>

      <div class="tab"> Ingrédients

        <p><input name="quantite" placeholder="Quantité..." oninput="this.className = ''"></p>
        <p><input name="unite" placeholder="Unité (cl, gr, ...)..." oninput="this.className = ''"></p>
        <p><input name="nom" placeholder="Nom de l'ingrédients..." oninput="this.className = ''"></p>
      </div>

      <div class="tab"> Matériels

        <p><input name="nom" placeholder="Ustensiles, récipients..." oninput="this.className = ''"></p>
        
      </div>


      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>

      <!--Circles which indicates the steps of the form:--> 
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
      
    </form>
  </section>



</main>



