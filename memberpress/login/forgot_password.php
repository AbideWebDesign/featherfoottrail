<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<div class="mp_wrapper bg-primary p-4 mt-4">
  <h3 class="text-white"><?php _ex('Request a Password Reset', 'ui', 'memberpress'); ?></h3>
  <form name="mepr_forgot_password_form" id="mepr_forgot_password_form" class="mepr-form" action="" method="post">
    <?php /* nonce not necessary on this form seeing as the user isn't logged in yet */ ?>
    <div class="mp-form-row mepr_forgot_password_input">
      <label for="mepr_user_or_email" class="text-white"><?php _ex('Enter Your Username or Email Address', 'ui', 'memberpress'); ?></label>
      <input type="text" name="mepr_user_or_email" id="mepr_user_or_email" value="<?php echo isset($mepr_user_or_email)?esc_html($mepr_user_or_email):''; ?>" />
    </div>
    <?php MeprHooks::do_action('mepr-forgot-password-form'); ?>
    <div class="mp-spacer">&nbsp;</div>
    <div class="submit">
      <input type="submit" name="wp-submit" id="wp-submit" class="button-primary mepr-share-button" value="<?php _ex('Request Password Reset', 'ui', 'memberpress'); ?>" />
      <input type="hidden" name="mepr_process_forgot_password_form" value="true" />
    </div>
  </form>
</div>
