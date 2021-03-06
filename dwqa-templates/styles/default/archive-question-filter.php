<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>

<style>
	
	h1 {margin-bottom:0px !important}
	
#dwqa-search {
    display: none !important;
}
.dwqa-question-filter a {
    margin-right: 5%;
}
</style>

<?php
/**
 * The template for displaying answers
 *
 * @package DW Question & Answer
 * @since DW Question & Answer 1.0.1
 */

global $dwqa_general_settings;
$sort = isset( $_GET['sort'] ) ? $_GET['sort'] : '';
$filter = isset( $_GET['filter'] ) ? $_GET['filter'] : 'all';
?>
<?php
if( current_user_can('editor') || current_user_can('administrator') ) {
     echo "<div class='dwqa-question-filter' style='display:block !important'>";
} else {
     echo "<div class='dwqa-question-filter' style='display:none'>";
}
?>

	<?php if ( !isset( $_GET['user'] ) ) : ?>
		<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'all' ) ) ) ?>" class="all <?php echo 'all' == $filter ? 'active' : '' ?>"><?php _e( 'ALL', 'dwqa' ); ?></a>
		<?php if ( dwqa_is_enable_status() ) : ?>
			<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'open' ) ) ) ?>" class="open <?php echo 'open' == $filter ? 'active' : '' ?>"><?php _e( 'Open', 'dwqa' ); ?></a>
			<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'resolved' ) ) ) ?>" class="resolved <?php echo 'resolved' == $filter ? 'active' : '' ?>"><?php _e( 'Resolved', 'dwqa' ); ?></a>
			<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'closed' ) ) ) ?>" class="closed <?php echo 'closed' == $filter ? 'active' : '' ?>"><?php _e( 'Closed', 'dwqa' ); ?></a>
		<?php endif; ?>
		<?php if ( is_user_logged_in() ) : ?>
            <a href="https://livingsober.org.nz/dwqa-question_category/help-request/">SITE HELP</a>
            <a href="https://livingsober.org.nz/dwqa-question_category/feature-suggestion/">FEATURE SUGGESTIONS</a>
            <a href="https://livingsober.org.nz/dwqa-question_category/technical-issue/">TECHNICAL ISSUES</a>
		<?php endif; ?>
	<?php else : ?>
		<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'all' ) ) ) ?>" class="all <?php echo 'all' == $filter ? 'active' : '' ?>"><?php _e( 'Questions', 'dwqa' ); ?></a>
		<a href="<?php echo esc_url( add_query_arg( array( 'filter' => 'subscribes' ) ) ) ?>" class="subscribes <?php echo 'subscribes' == $filter ? 'active' : '' ?>"><?php _e( 'Subscribes', 'dwqa' ); ?></a>
	<?php endif; ?>
</div>
