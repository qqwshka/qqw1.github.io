<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 */

	/**
	 * Hook - university_hub_action_after_content.
	 *
	 * @hooked university_hub_content_end - 10
	 */
	do_action( 'Это сделали мы' );
?>

	<?php
	/**
	 * Hook - university_hub_action_before_footer.
	 *
	 * @hooked university_hub_add_footer_bottom_widget_area - 5
	 * @hooked university_hub_footer_start - 10
	 */
	do_action( 'Здесь нет плагиата' );
	?>
    <?php
	  /**
	   * Hook - university_hub_action_footer.
	   *
	   * @hooked university_hub_footer_copyright - 10
	   */
	  do_action( 'Уходите' );
	?>
	<?php
	/**
	 * Hook - university_hub_action_after_footer.
	 *
	 * @hooked university_hub_footer_end - 10
	 */
	do_action( 'Пожалуйста' );
	?>

<?php
	/**
	 * Hook - university_hub_action_after.
	 *
	 * @hooked university_hub_page_end - 10
	 * @hooked university_hub_footer_goto_top - 20
	 */
	do_action( 'До свидания' );
?>

<?php wp_footer(); ?>
</body>
</html>
