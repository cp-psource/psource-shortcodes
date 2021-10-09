<?php defined( 'ABSPATH' ) or exit; ?>

<div class="notice notice-info upfront-shortcodes-notice-rate">

	<?php echo get_avatar( 'ano.vladimir@gmail.com', 60, '', __( 'Vladimir Anokhin', 'upfront-shortcodes' ) ); ?>

	<div class="upfront-shortcodes-notice-rate-content">

		<div class="upfront-shortcodes-notice-rate-content-text">
			<p><?php _e( 'Hello', 'upfront-shortcodes' ); ?>,</p>
			<p><?php _e( 'my name is Vladimir Anokhin. I am the developer of the UpFront Shortcodes plugin.<br>If you like this plugin, please write a few words about it at wordpress.org or twitter. Your opinion will help other people.', 'upfront-shortcodes' ); ?></p>
			<p><?php _e( 'Thank you!', 'upfront-shortcodes' ); ?></p>
		</div>

		<p class="upfront-shortcodes-notice-rate-actions">
			<a href="<?php echo $this->get_dismiss_link(); ?>" class="button button-primary" onclick="window.open('https://wordpress.org/support/plugin/upfront-shortcodes/reviews/?rate=5&filter=5#new-post');"><?php _e( 'Rate plugin', 'upfront-shortcodes' ); ?></a>
			<a href="<?php echo $this->get_dismiss_link( true ); ?>"><?php _e( 'Remind me later', 'upfront-shortcodes' ); ?></a>
			<a href="<?php echo $this->get_dismiss_link(); ?>" class="upfront-shortcodes-notice-rate-dismiss"><?php _e( 'Dismiss', 'upfront-shortcodes' ); ?></a>
		</p>

	</div>

</div>

<style>
	.upfront-shortcodes-notice-rate {
		position: relative;
		padding: 15px 20px;
	}
	.upfront-shortcodes-notice-rate .avatar {
		position: absolute;
		left: 20px;
		top: 20px;
		border-radius: 50%;
	}
	.upfront-shortcodes-notice-rate-content {
		margin-left: 80px;
	}
	.upfront-shortcodes-notice-rate-content-text p {
		font-size: 15px;
	}
	p.upfront-shortcodes-notice-rate-actions {
		margin-top: 15px;
	}
	p.upfront-shortcodes-notice-rate-actions a {
		vertical-align: middle !important;
	}
	p.upfront-shortcodes-notice-rate-actions a + a {
		margin-left: 20px;
	}
	.upfront-shortcodes-notice-rate-dismiss {
		position: absolute;
		top: 10px;
		right: 10px;
		padding: 10px 15px 10px 21px;
		font-size: 13px;
		line-height: 1.23076923;
		text-decoration: none;
	}
	.upfront-shortcodes-notice-rate-dismiss:before {
		position: absolute;
		top: 8px;
		left: 0;
		margin: 0;
		-webkit-transition: all .1s ease-in-out;
		transition: all .1s ease-in-out;
		background: 0 0;
		color: #b4b9be;
		content: "\f153";
		display: block;
		font: 400 16px / 20px dashicons;
		height: 20px;
		text-align: center;
		width: 20px;
	}
	.upfront-shortcodes-notice-rate-dismiss:hover:before {
		color: #c00;
	}
</style>
