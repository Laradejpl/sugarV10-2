<?php
include __DIR__ . '/config/headerAdmin.php';
?>

<style type="text/css">
			body { background-color: grey;color:lime; }
			
			.title { font-family: Impact; font-size: 30px; margin: 0px 0 -20px 0; text-align: center; text-shadow: 0 0 0.5em #686868; }
			.box { width: 936px; margin: 40px auto; }
			.top { background-image: url(assets/img/top.png); height: 43px; }
			.middle { background-image: url(assets/img/middle.png); padding: 0 35px; margin-top: -19px; }
			.bottom { background-image: url(assets/img/bottom.png); height: 42px; }
			table { margin-left: 40px; margin-top: 40px; }
			td { vertical-align: top; padding-right: 20px; font-variant: small-caps; }
			textarea { width: 600px; border: 1px solid #abadb3; background-color: #f0f0f0; }
			input[type=text] { width: 300px; border: 1px solid #abadb3; background-color: #f0f0f0; }
			fieldset { border: none; }
			#toogle { margin: 0 10px 0 10px; cursor: pointer; }
			h3 { font-size: 19px; text-align: center; font-variant: small-caps; }
			hr { border: none; border-bottom: 2px dashed #6c6c6c; width: 700px; margin: 60px auto 20px auto; }
			.message { color: grey; text-align: center; }
			fieldset table { margin-top: 10px; }
			fieldset td { padding-right: 60px; border-bottom: 1px dashed #c6c6c6; }
			#member_list { display: none;}
		</style>
<div class="container">
	<div class="row">
		<div class="col-10">


		<div class="title">NewsLetter</div>
		<div class="box ">
			<div class="top"></div>
			<div class="middle">
				<h3>Envoyer une newsletter</h3>
				<div class="message"><?php echo $reply; ?></div>
				<?php echo $content; ?>
				
			</div>
			<div class="bottom"></div>
		</div>



		</div>
	</div>
</div>
		
	</body>
</html>