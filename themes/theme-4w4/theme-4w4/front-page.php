<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>
	<main id="primary" class="site-main">

	<?php 
		if (is_front_page()) : ?>
		<section class="carrousel">
				<div>1</div>
				<div>2</div>
				<div>3</div>
		</section>
		<button id='un'> 1 </button>
		<button id='deux'> 2 </button>
		<button id='trois'> 3 </button>
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

                $titre = get_the_title();
				$sigle = substr($titre, 0, 7);
				$nbHeure = substr($titre, -4, 3);
				$titrePartiel = substr($titre, 8, -6);
                $session = substr($titre, 4,1);
				$typeCours = get_field('type_de_cours');
				if ($precedent != $typeCours): ?>
				<?php if ($precedent != "XXXXXX"): ?>
					</section>
				<?php endif ?>

			<section>
				<?php endif ?>
				<article>
					<p><?php echo $sigle . " - " . $nbHeure . " - " . $typeCours; ?></p>
					<a href="<?php echo get_permalink() ?>"><?php echo $titrePartiel; ?></a>
					<p>Session : <?php echo $session; ?></p>
				</article>
		<?php 
			$precedent = $typeCours;
		endwhile; ?>
		</section> <!-- .cours section -->
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
