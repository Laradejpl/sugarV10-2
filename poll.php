<?php
require_once __DIR__ . '/config/bootstrap.php';
include __DIR__ . '/config/header.php';
?>
<style>
  body{
    background:url(table-de-billard.jpg) no-repeat;
		background-attachment: fixed;
		background-size: cover;
  }
</style>
<div class="container">
    <div class="row">
    <div class="col-12 btn btn-success #00C851"><a  href="accueil.php"style="color:white;">retour</a></div>
    </div>
</div>

<!-- Place this code where you'd like the game to appear -->
<div class="miniclip-game-embed" data-game-name="8-ball-pool-multiplayer" data-theme="5" data-width="1010" data-height="640" data-language="fr"><a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/">Play 8 Ball Pool</a></div>
<p style="text-align:center;">
    <a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/" target="_blank">Play 8 Ball Pool</a> -
    <a href="https://www.miniclip.com/games/genre-3/" target="_blank">More Jeux de type Jeux de sport</a> -
    <a href="https://www.miniclip.com/terms" target="_blank">Terms and Conditions</a> -
    <a href="https://www.miniclip.com/privacy" target="_blank">Privacy Policy</a>
</p>
<!-- Insert this code before your </body> tag -->
<script src="//static.miniclipcdn.com/js/game-embed.js"></script>