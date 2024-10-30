<script type="text/javascript">
<!--
function r34co_toggle(elem, method) {
	jQuery('#_r34co_' + method).val(elem.checked ? 1 : 0);
	if (elem.checked) { jQuery('#r34co_' + method + '_options_wrapper').slideDown(); }
	else {
		jQuery('#r34co_' + method + '_options_wrapper input[type=checkbox]').each(function() {
			jQuery(elem).prop('checked',false);
		});
		jQuery('#r34co_' + method + '_options_wrapper input[type=hidden]').each(function() {
			jQuery(elem).val('');
		});
		jQuery('#r34co_' + method + '_options_wrapper').slideUp();
	}
}
// -->
</script>

<div class="wrap">

	<h2>Core Options by Room 34</h2>
	<p>This tool allows you to selectively activate or disable various enhancements in the Core Options plugin.</p>
	
	<ul>
		<?php
		foreach (array_keys((array)$opt_groups) as $opt_group) {
			?>
			<li><a href="#r34co-<?php echo sanitize_title($opt_group); ?>"><?php echo $opt_group; ?></a></li>
			<?php
		}
		?>
	</ul>

	<form method="post" action="">
	<div class="metabox-holder">
		<?php
		wp_nonce_field('room-34-core-options','r34co-nonce');
	
		foreach ((array)$opt_groups as $opt_group => $options) {
			?>
			<p id="r34co-<?php echo sanitize_title($opt_group); ?>"><small><a href="#top">Back to Top</a></small></p>
			<hr />
			<h2><?php echo $opt_group; ?></h2>
			<?php
			foreach ((array)$options as $opt_key) {
				$option = $this->options[$opt_key];
				$option_current = get_option('r34co_'.$option['method']);
				switch ($option['type']) {
					case 'select':
						?>
						<div class="postbox">
							<h3 class="hndle"><span><?php echo $option['title']; ?></span></h3>
							<div class="inside">
								<select name="r34co[<?php echo $option['method']; ?>]" id="r34co_<?php echo $option['method']; ?>">
									<?php
									foreach ((array)$option['options'] as $val => $text) {
										?>
										<option value="<?php echo esc_attr($val); ?>"<?php
										if ($val === $option_current) {
											echo ' selected="selected"';
										}
										?>><?php echo $text; ?></option>
										<?php
									}
									?>
								</select>
								<p><?php echo $option['description']; ?></p>
							</div>
						</div>
						<?php
						break;
					case 'textarea':
						?>
						<div class="postbox">
							<h3 class="hndle"><span><?php echo $option['title']; ?></span></h3>
							<div class="inside">
								<p><?php echo $option['description']; ?></p>
								<textarea name="r34co[<?php echo $option['method']; ?>]" id="r34co_<?php echo $option['method']; ?>" style="height: 12em; width: 100%;"><?php echo get_option('r34co_'.$option['method']); ?></textarea>
							</div>
						</div>
						<?php
						break;
					case 'checkbox_multiple':
					case 'checkbox':
					default:
						?>
						<div class="postbox">
							<h3 class="hndle"><span><?php echo $option['title']; ?></span></h3>
							<div class="inside">
								<p>
									<input type="hidden" name="r34co[<?php echo $option['method']; ?>]" id="_r34co_<?php echo $option['method']; ?>" value="<?php echo esc_attr($option_current); ?>" /><input type="checkbox" name="r34co_<?php echo $option['method']; ?>" id="r34co_<?php echo $option['method']; ?>" value="1" onchange="r34co_toggle(this, '<?php echo $option['method']; ?>');"<?php
									if (!empty($option_current)) {
										echo ' checked="checked"';
									}
									?> />
									<label for="r34co_<?php echo $option['method']; ?>"><?php echo $option['description']; ?></label>
								</p>
								<?php
								if (!empty($option['options'])) {
									?>
									<div id="r34co_<?php echo $option['method']; ?>_options_wrapper" style="display: <?php echo !empty($option_current) ? 'block' : 'none'; ?>; padding-left: 2em;">
										<?php
										foreach ((array)$option['options'] as $label => $function) {
											$lbl = strtolower(preg_replace('/[\W]+/','',$label));
											$option_option_current = get_option('r34co_'.$option['method'].'_'.$lbl);
											?>
											<div>
												<input type="hidden" name="r34co[<?php echo $option['method']; ?>_<?php echo $lbl; ?>]" id="_r34co_<?php echo $option['method']; ?>_<?php echo $lbl; ?>" value="<?php echo esc_attr($option_option_current); ?>" /><input type="checkbox" name="r34co_<?php echo $option['method']; ?>_<?php echo $lbl; ?>" id="r34co_<?php echo $option['method']; ?>_<?php echo $lbl; ?>" value="1" onchange="jQuery('#_r34co_<?php echo $option['method']; ?>_<?php echo $lbl; ?>').val(this.checked ? 1 : 0);"<?php
												if (!empty($option_option_current)) {
													echo ' checked="checked"';
												}
												?> />
												<label for="r34co_<?php echo $option['method']; ?>_<?php echo $lbl; ?>"><?php echo $label; ?></label>
											</div>
											<?php
										}
										?>
										</div>
									<?php
								}
								?>
							</div>
						</div>
						<?php
						break;
				}
			}
		}
		?>
	
		<input type="submit" value="Save Changes" class="button button-primary" />
	</div>
	</form>

	<p class="alignright"><em><?php echo $this->name; ?> version <?php echo $this->version; ?></em></p>
</div>
