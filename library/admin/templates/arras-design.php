<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); } ?>
<?php global $arras_registered_alt_layouts; ?>

<?php
$style_dir = dir(TEMPLATEPATH . '/css/styles/');
if ($style_dir) {
	while(($file = $style_dir->read()) !== false) {
		if(is_valid_arras_style($file)) $styles[substr($file, 0, -4)] = $file;
	}
}
?>

<div id="design" class="padding-content">

<h3><?php _e('Overall Design', 'arras') ?></h3>
<table class="form-table">

<tr valign="top">
<th scope="row"><label for="arras-layout-col"><?php _e('Overall Layout', 'arras') ?></label></th>
<td>
<?php echo arras_form_dropdown('arras-layout-col', $arras_registered_alt_layouts, arras_get_option('layout')) ?><br />
<?php _e('Once you have changed your layout settings, you will need to regenerate the thumbnails using the <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/">Regenerate Thumbnails</a> plugin.', 'arras') ?>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="arras-style"><?php _e('Default Style', 'arras') ?></label></th>
<td>
<?php echo arras_form_dropdown('arras-style', $styles, arras_get_option('style') ) ?><br />
<?php printf( __('Alternate stylesheets are placed in %s.', 'arras'), '<code>wp-content/themes/' .get_stylesheet(). '/css/styles/</code>' ) ?>
</td>
</tr>

</table>

<p class="submit">
<input class="button-primary" type="submit" name="save" value="<?php _e('Save Changes', 'arras') ?>" />
</p>

</div><!-- #design -->
