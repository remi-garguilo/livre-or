<?php
$pageTitle = "Nous contactez";
$pageDescription = "Nous conctactez grace à ce formulaire";
?>

<div data-aos="zoom-in" class="contact">
  <h1>Formulaire de contact</h1>
  <form>
    <label for="fname">Nom </label>
    <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">
    <label for="fname">Prénom</label>
    <input type="text" id="lname" name="lastname" placeholder="Votre prénom">
    <label for="sujet">Sujet</label>
    <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">

    <label for="emailAddress">Email</label>
    <input id="emailAddress" type="email" name="email" placeholder="Votre email">


    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Votre message" style="height:100px"></textarea>

    <input type="submit" value="Envoyer">
  </form>
</div>
