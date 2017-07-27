<?php
	/**
     * Load Saved Responsive Photo Gallery Settings
     */
	$PostId = $post->ID;
	$WRGF_Gallery_Settings = "WRGF_Gallery_Settings_".$PostId;
	$WRGF_Gallery_Settings = unserialize(get_post_meta( $PostId, $WRGF_Gallery_Settings, true));

    if($WRGF_Gallery_Settings['WL_Show_Gallery_Title'] && $WRGF_Gallery_Settings['WL_Hover_Color']) {
		$WL_Show_Gallery_Title  = $WRGF_Gallery_Settings['WL_Show_Gallery_Title'];
		$WL_Show_Image_Label    = $WRGF_Gallery_Settings['WL_Show_Image_Label'];
		$WL_Image_Label_Position= $WRGF_Gallery_Settings['WL_Image_Label_Position'];
        $WL_Hover_Animation     = $WRGF_Gallery_Settings['WL_Hover_Animation'];
        $WL_Gallery_Layout      = $WRGF_Gallery_Settings['WL_Gallery_Layout'];
        $WL_Thumbnail_Layout    = $WRGF_Gallery_Settings['WL_Thumbnail_Layout'];
        $WL_Hover_Color         = $WRGF_Gallery_Settings['WL_Hover_Color'];
		$WL_Hover_Text_Color    = $WRGF_Gallery_Settings['WL_Hover_Text_Color'];
		$WL_Footer_Text_Color  	= $WRGF_Gallery_Settings['WL_Footer_Text_Color'];
        $WL_Hover_Color_Opacity = $WRGF_Gallery_Settings['WL_Hover_Color_Opacity'];
        $WL_Font_Style          = $WRGF_Gallery_Settings['WL_Font_Style'];
		$WL_Custom_Css 			= $WRGF_Gallery_Settings['WL_Custom_Css'];
    } else {
		$WL_Show_Gallery_Title  = "yes";
		$WL_Show_Image_Label    = "yes";
		$WL_Image_Label_Position= "hover";
		$WL_Hover_Animation     = "stroke";
		$WL_Gallery_Layout      = "col-md-6";
		$WL_Thumbnail_Layout    = "same-size";
		$WL_Hover_Color         = "#0AC2D2";
		$WL_Hover_Text_Color    = "#FFFFFF";
		$WL_Footer_Text_Color  	= "#000000";
		$WL_Hover_Color_Opacity = "yes";
		$WL_Font_Style          = "Arial";
		$WL_Custom_Css 			= "";
    }
?>

		
		
<input type="hidden" id="wl_wrgf_action" name="wl_wrgf_action" value="wl-wrgf-save-settings">
<table class="form-table">
	<tbody>
		
		<tr>
			<th scope="row"><label>Show Gallery Title</label></th>
			<td>
				<?php if(!isset($WL_Show_Gallery_Title)) $WL_Show_Gallery_Title = "yes"; ?>
				<input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title" value="yes" <?php if($WL_Show_Gallery_Title == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title" value="no" <?php if($WL_Show_Gallery_Title == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes/No option to hide or show gallery title.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Show Image Label</label></th>
			<td>
				<?php if(!isset($WL_Show_Image_Label)) $WL_Show_Image_Label = "yes"; ?>
				<input type="radio" name="wl-show-image-label" id="wl-show-image-label" value="yes" <?php if($WL_Show_Image_Label == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-show-image-label" id="wl-show-image-label" value="no" <?php if($WL_Show_Image_Label == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes/No option to hide or show label on image.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Image Label Position</label></th>
			<td>
				<?php if(!isset($WL_Image_Label_Position)) $WL_Image_Label_Position = "hover"; ?>
				<input type="radio" name="wl-image-label-position" id="wl-image-label-position" value="hover" <?php if($WL_Image_Label_Position == 'hover' ) { echo "checked"; } ?>> On Hover &nbsp;&nbsp;
				<input type="radio" name="wl-image-label-position" id="wl-image-label-position" value="footer" <?php if($WL_Image_Label_Position == 'footer' ) { echo "checked"; } ?>> On Footer
				<p class="description">Select option to show image label on Hover or Footer.</p>
			</td>
		</tr>
	
		<tr>
			<th scope="row"><label>Image Hover Animation</label></th>
			<td>
				<?php if(!isset($WL_Hover_Animation)) $WL_Hover_Animation = "stroke"; ?>
				<select name="wl-hover-animation" id="wl-hover-animation">
					<optgroup label="Select Animation">
						<option value="stroke" <?php if($WL_Hover_Animation == 'stroke') echo "selected=selected"; ?>>Stroke</option>
					</optgroup>
				</select>
				<p class="description">Choose an animation effect apply on images after mouse hover.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label>Gallery Layout</label></th>
			<td>
				<?php if(!isset($WL_Gallery_Layout)) $WL_Gallery_Layout = "col-md-6"; ?>
				<select name="wl-gallery-layout" id="wl-gallery-layout">
					<optgroup label="Select Gallery Layout">
						<option value="col-md-6" <?php if($WL_Gallery_Layout == 'col-md-6') echo "selected=selected"; ?>>Two Column</option>
						<option value="col-md-4" <?php if($WL_Gallery_Layout == 'col-md-4') echo "selected=selected"; ?>>Three Column</option>
					</optgroup>
				</select>
				<p class="description">Choose a column layout for image gallery.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Thumbnail Layout</label></th>
			<td>
				<?php if(!isset($WL_Thumbnail_Layout)) $WL_Thumbnail_Layout = "same-size"; ?>
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="same-size" <?php if($WL_Thumbnail_Layout == 'same-size' ) { echo "checked"; } ?>> Show Same Size Thumbnails
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="masonry" <?php if($WL_Thumbnail_Layout == 'masonry' ) { echo "checked"; } ?>> Show Masonry Style Thumbnails
				<input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout" value="original" <?php if($WL_Thumbnail_Layout == 'original' ) { echo "checked"; } ?>> Show Original Image As Thumbnails
				<p class="description">Select an option for thumbnail layout setting.</p>
				<p class="description">If Same Size Thumbnail option selected than minimum image size required in following layouts:</p>
				<p class="description">Minimum image size required in 2 Column Gallery Layout: 500x500px</p>
				<p class="description">Minimum image size required in 3 Column Gallery Layout: 400x400px</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Hover Color</label></th>
			<td class="image_color">
				<?php if(!isset($WL_Hover_Color)) $WL_Hover_Color = "#0AC2D2"; ?>
				<input type="radio" name="wl-hover-color" id="wl-hover-color" value="#0AC2D2" <?php if($WL_Hover_Color == '#0AC2D2' ) { echo "checked"; } ?>><label style="color:#0AC2D2;">Color1</label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="wl-hover-color" id="wl-hover-color" value="#000000" <?php if($WL_Hover_Color == '#000000' ) { echo "checked"; } ?>><label style="color:#000000;">Color2</label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="wl-hover-color" id="wl-hover-color" value="#dd4242" <?php if($WL_Hover_Color == '#dd4242' ) { echo "checked"; } ?>><label style="color:#dd4242;">Color3</label>
				<p class="description">Choose a Image Hover Color.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Hover Text Color</label></th>
			<td class="image_color">
				<?php if(!isset($WL_Hover_Text_Color)) $WL_Hover_Text_Color = "#FFFFFF"; ?>
				<input type="radio" name="wl-hover-text-color" id="wl-hover-text-color" value="#FFFFFF" <?php if($WL_Hover_Text_Color == '#FFFFFF' ) { echo "checked"; } ?>><label>White</label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="wl-hover-text-color" id="wl-hover-text-color" value="#000000" <?php if($WL_Hover_Text_Color == '#000000' ) { echo "checked"; } ?>><label>Black</label>&nbsp;&nbsp;&nbsp;
				<p class="description">Choose a Image Hover Text Color.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Footer Text Color</label></th>
			<td class="image_color">
				<?php if(!isset($WL_Footer_Text_Color)) $WL_Footer_Text_Color = "#000000"; ?>
				<input type="radio" name="wl-footer-text-color" id="wl-footer-text-color" value="#FFFFFF" <?php if($WL_Footer_Text_Color == '#FFFFFF' ) { echo "checked"; } ?>><label>White</label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="wl-footer-text-color" id="wl-footer-text-color" value="#000000" <?php if($WL_Footer_Text_Color == '#000000' ) { echo "checked"; } ?>><label>Black</label>&nbsp;&nbsp;&nbsp;
				<p class="description">Choose a Color for Footer Text.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Hover Color Opacity</label></th>
			<td>
				<?php if(!isset($WL_Hover_Color_Opacity)) $WL_Hover_Color_Opacity = "yes"; ?>
				<input type="radio" name="wl-hover-color-opacity" id="wl-hover-color-opacity" value="yes" <?php if($WL_Hover_Color_Opacity == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="wl-hover-color-opacity" id="wl-hover-color-opacity" value="no" <?php if($WL_Hover_Color_Opacity == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">Select Yes/No option for hover color opacity on images.</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label>Caption Font Style</label></th>
			<td>
				<select  name="wl-font-style" class="standard-dropdown" id="wl-font-style">
					<optgroup label="Default Fonts">
						<option value="Arial" <?php selected($WL_Font_Style, 'Arial' ); ?>>Arial</option>
						<option value="_arial_black" <?php selected($WL_Font_Style, 'Arial Black' ); ?>>Arial Black</option>
						<option value="Courier New" <?php selected($WL_Font_Style, 'Courier New' ); ?>>Courier New</option>
						<option value="georgia" <?php selected($WL_Font_Style, 'Georgia' ); ?>>Georgia</option>
						<option value="grande"<?php selected($WL_Font_Style, 'Grande' ); ?>>Grande</option>
						<option value="_helvetica_neue" <?php selected($WL_Font_Style, 'Helvetica Neue' ); ?>>Helvetica Neue</option>
						<option value="_impact" <?php selected($WL_Font_Style, 'Impact' ); ?>>Impact</option>
						<option value="_lucida" <?php selected($WL_Font_Style, 'Lucida' ); ?>>Lucida</option>
						<option value="_lucida"<?php selected($WL_Font_Style, 'Lucida Grande' ); ?>>Lucida Grande</option>
						<option value="_OpenSansBold" <?php selected($WL_Font_Style, 'OpenSansBold' ); ?>>OpenSansBold</option>
						<option value="_palatino" <?php selected($WL_Font_Style, 'Palatino' ); ?>>Palatino</option>
						<option value="_sans" <?php selected($WL_Font_Style, 'Sans' ); ?>>Sans</option>
						<option value="_sans" <?php selected($WL_Font_Style, 'Sans-Serif' ); ?>>Sans-Serif</option>
						<option value="_tahoma" <?php selected($WL_Font_Style, 'Tahoma' ); ?>>Tahoma</option>
						<option value="_times"<?php selected($WL_Font_Style, 'Times New Roman' ); ?>>Times New Roman</option>
						<option value="_trebuchet" <?php selected($WL_Font_Style, 'Trebuchet' ); ?>>Trebuchet</option>
						<option value="_verdana" <?php selected($WL_Font_Style, 'Verdana' ); ?>>Verdana</option>
					</optgroup>
				</select>
				<p class="description">Choose a caption font style.</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Custom CSS','WRGF_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if(!isset($WL_Custom_Css)) $WL_Custom_Css = ""; ?>
				<textarea id="wl-custom-css" name="wl-custom-css" type="text" class="" style="width:80%"><?php echo $WL_Custom_Css; ?></textarea>
				<p class="description">
					<?php _e('Enter any custom css you want to apply on this gallery.','WRGF_TEXT_DOMAIN')?><br>
					<?php _e('Note: Please Do Not Use <b>Style</b> Tag With Custom CSS.','WRGF_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
	</tbody>
</table>