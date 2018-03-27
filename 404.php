<?php

	get_header();
	?>
<div class="error404">
<h1>Seite nicht gefunden (Fehlercode 404)</h1>
<p>Leider existiert diese Seite nicht, oder Sie haben nicht die erforderlichen Rechte um den Inhalt anzuzeigen.</p>
<a href="<?php echo home_url(); ?>" >Zurück zur Startseite</a>
</div>
<?php	
	get_footer();
?>