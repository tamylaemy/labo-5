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
/////////////////////// FRONT-PAGE.PHP

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
            $precedent = 0;
			while ( have_posts() ) :
				the_post();

				/* if (in_category('web')) {
					echo "<span>Web</span>";
				}

				if (in_category('jeu')) {
					echo "<span>Jeu</span>";
				}

				echo "<span style='color:crimson'> - " . get_field('type_de_cours') . "</span>"; */

                $titre = get_the_title();
				$sigle = substr($titre, 0, 7);
				$nbHeure = substr($titre, -4, 3);
				$titrePartiel = substr($titre, 8, -6);
                $session = substr($titre, 4,1);

				// $contenu = get_the_content();
				// $resume = substr($contenu, 0, 200);
				$typeCours = get_field('type_de_cours');
				?>

				<article>
					<p><?php echo $sigle . " - " . $typeCours; ?></p>
					<a href="<?php echo get_permalink() ?>"><?php echo $titrePartiel; ?></a>
					<p>Session : <?php echo $session; ?></p>
				</article>

				<?php
                /* if ($session != $precedent){
                    echo '<p>Session : ' . $session . '</p>';
                }
				$precedent = $session; */
				?>

				<p> <?php // echo  $typeCours . " - " . $session . " - " . $titre; ?> </p>
				<p> <?php // echo $resume; ?> </p>
				<?php

			endwhile;
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
