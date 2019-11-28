<main id="contact">

  <!--Contact form-->
  <div id="form-div">

    <section>
      <div class="box">
        <div class="content">

         <form action="<?php echo WEBROOT ?>Contact/index" class="form" id="form1"method="POST" enctype="multipart/form-data">

          <p class="name">
            <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
          </p>

          <p class="email">
            <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
          </p>

          <p class="text">
            <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
          </p>

          <div class="submit">

            <input type="submit" value="SEND" id="button-blue"/>
            <div class="ease"></div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>

<!--  -->
</main>


