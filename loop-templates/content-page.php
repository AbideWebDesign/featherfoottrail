<?php
/**
 * Partial template for content in page.php
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php the_content(); ?>

<footer class="entry-footer">

	<?php edit_post_link( __( 'Edit', 'featherfoottrail' ), '<span class="edit-link">', '</span>' ); ?>

</footer><!-- .entry-footer -->

