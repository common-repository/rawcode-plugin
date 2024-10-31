<div class="wrap">
<h2>Raw Content Settings</h2>
<p>Directions: Enter a 'Description/Title' to help you identify and remember what 
and where code content is used in your site. Next paste or enter code into "Content/Code" 
text area. To insert the code into the content of a post or page, copy the replacement tag 
on the left into the content at the location you want the code to be displayed. Multiple 
tags can be used together for form a page/post.</p>

<form method="post" action="options.php">
<?php settings_fields('rawcode_options'); ?>

<table class="form-table">
<tr>
  <th colspan="3"><h4 style="margin: 0;">Replacement Tag</h4></th>
</tr>
<?php for( $i = 1; $i < 10; $i++) { ?>
<tr valign="top">
  <th scope="row" style="width:130px; font-weight: bold;">@@rawcode_<?php echo $i; ?></th>
  <td width="100">Description/Note:<br/>Content/Code:</td>
  <td><input type="text" name="rawcode_note_<?php echo $i; ?>" style="width:607px;" value="<?php echo addslashes(get_option('rawcode_note_'.$i)); ?>"/>
      <br/>
      <textarea name="rawcode_content_<?php echo $i; ?>" cols="80" rows="10"><?php echo htmlentities(get_option('rawcode_content_'.$i)); ?></textarea>
  </td>
</tr>
<?php } ?>

</table>
<input type="hidden" name="action" value="update" />
<p class="submit">
  <input type="submit" class="button-primary" value="Save Changes" />
</p>
</form>
</div>
