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
						<img src="" alt="">
						<div class="slide__info"></div>
						<p>582-3W3 - 90h - Web</p>
						<a href="http://localhost/4w4/wordpress-5.6-fr_FR/wordpress/?p=58"></a>
						<p>Session : 3</p>
					</div>
				</article>
				<article>2</article>
				<article>3</article>
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