<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

 // code origin

get_header();
?>
	<main id="primary" class="site-main">

	<?php 
		if (is_front_page()) : ?>
		<section class="carrousel">
				<article class="slide_conteneur">
					<div class="slide">
						<img width="150" height="100" src="http://localhost/4w4/wordpress-5.6-fr_FR/wordpress/wp-content/uploads/2021/03/illustration-developpement-web_71609-1327.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
						<div class="slide__info">
							<p>582-3W3 - 90h - Web</p>
							<a href="http://localhost/4w4/wordpress-5.6-fr_FR/wordpress/582-3w3-creation-de-sites-web-dynamiques-90h/">Création de Sites Web Dynamique</a>
							<p>Session : 3</p>
						</div>
					</div>
				</article>
				<article class="slide_conteneur">
					<div class="slide">
						<img src="" alt="">
						<div class="slide__info">
							<p>582-1M1 - 75h - Spécifique</p>
							<a href="http://localhost/4w4/wordpress-5.6-fr_FR/wordpress/description-du-cours-582-1m1-creation-video-2/">Création Vidéo</a>
							<p>Session : 1</p>
						</div>
					</div>
				</article>
				<article class="slide_conteneur">
					<div class="slide">
						<img src="" alt="">
						<div class="slide__info">
							<p>582-1J1 - 75h - Jeu</p>
							<a href="http://localhost/4w4/wordpress-5.6-fr_FR/wordpress/582-1j1-animation-et-interactivite-en-jeu-75h/">Animation et Interactivité en Jeu</a>
							<p>Session : 1</p>
						</div>
					</div>
				</article>
		</section>
		<section class="boutons">
			<button id='un' class='un'> 1 </button>
			<button id='deux' class='deux'> 2 </button>
			<button id='trois' class='trois'> 3 </button>
		</section>
		<?php endif ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<section class="liste-cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			while ( have_posts() ) :
				the_post();
				convertirTableau($tPropriete);

				if ($precedent != $tPropriete['typeCours']): ?>
				<?php if ($precedent != "XXXXXX"): ?>
					</section>
				<?php endif ?>
				<h2><?php echo $tPropriete['typeCours']; ?></h2>

			<section>
				<?php endif ?>
				<?php get_template_part( 'template-parts/content', 'cours-article' ); ?>
		<?php 
			$precedent = $tPropriete['typeCours'];
		endwhile; ?>
		</section> <!-- fin .cours section -->
		<?php endif; ?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriete) {
	$tPropriete['titre'] = get_the_title();
	$tPropriete['sigle'] = substr($tPropriete['titre'], 0, 7);
	$tPropriete['nbHeure'] = substr($tPropriete['titre'], -4, 3);
	$tPropriete['titrePartiel'] = substr($tPropriete['titre'], 8, -6);
	$tPropriete['session'] = substr($tPropriete['titre'], 4,1);
	$tPropriete['typeCours'] = get_field('type_de_cours');
}