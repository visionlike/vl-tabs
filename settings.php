<div class="wrap" style="height:100%;">
<h2 style="margin:0 0 15px 0;">VisionLike - CSS Tabs</h2>
<form method="post" action="options.php"> 
<?php @settings_fields('vl_tabbing'); ?>
<?php @do_settings_fields('vl_tabbing'); ?>

<?php
$default_animation = get_option('vl_tabbing_default_animation');
$animation_css = get_option('vl_tabbing_animation_css');
$style_css = get_option('vl_tabbing_style_css');
$default_width = get_option('vl_tabbing_default_width');
$editor_button = get_option('vl_tabbing_editor_button');
$tab_title_char_with = get_option('vl_tabbing_tab_title_char_with');
?>

<table>
<tr style="vertical-align:top;">
<td style="background:#fff; height:100%; border:#DDD 1px solid; padding:30px; vertical-align:top;">
	<table class="form-table" style="white-space:nowrap;">  
		<tr>
			<th scope="row">Animation CSS</th>
			<td>
				<label for="animation_css">			
				<input id="animation_css" type="checkbox" name="vl_tabbing_animation_css" value="1"<?php if(isset($animation_css) && $animation_css) { echo ' checked="checked"'; } ?> />
				If you want Animations, activate it.
				</label>
				<?php if(isset($animation_css) && $animation_css == '') { ?><input type="hidden" name="vl_tabbing_default_animation" value="" /><?php } ?>
			</td>		
		</tr>
		<?php if(isset($animation_css) && $animation_css) { ?>
		<tr>
			<th scope="row"><label for="default_animation">Default Animation</label></th>
			<td>
				<select name="vl_tabbing_default_animation" id="default_animation">
					<option value=""<?php if(!$default_animation) { echo ' selected="selected"'; } ?>>no animation</option>
					<optgroup label="Attention Seekers">
					<option value="bounce"<?php if($default_animation == 'bounce') { echo ' selected="selected"'; } ?>>bounce</option>
					<option value="flash"<?php if($default_animation == 'flash') { echo ' selected="selected"'; } ?>>flash</option>
					<option value="pulse"<?php if($default_animation == 'pulse') { echo ' selected="selected"'; } ?>>pulse</option>
					<option value="shake"<?php if($default_animation == 'shake') { echo ' selected="selected"'; } ?>>shake</option>
					<option value="swing"<?php if($default_animation == 'swing') { echo ' selected="selected"'; } ?>>swing</option>
					<option value="tada"<?php if($default_animation == 'tada') { echo ' selected="selected"'; } ?>>tada</option>
					<option value="wobble"<?php if($default_animation == 'wobble') { echo ' selected="selected"'; } ?>>wobble</option>
					</optgroup>

					<optgroup label="Bouncing Entrances">
					<option value="bounceIn"<?php if($default_animation == 'bounceIn') { echo ' selected="selected"'; } ?>>bounceIn</option>
					<option value="bounceInDown"<?php if($default_animation == 'bounceInDown') { echo ' selected="selected"'; } ?>>bounceInDown</option>
					<option value="bounceInLeft"<?php if($default_animation == 'bounceInLeft') { echo ' selected="selected"'; } ?>>bounceInLeft</option>
					<option value="bounceInRight"<?php if($default_animation == 'bounceInRight') { echo ' selected="selected"'; } ?>>bounceInRight</option>
					<option value="bounceInUp"<?php if($default_animation == 'bounceInUp') { echo ' selected="selected"'; } ?>>bounceInUp</option>
					</optgroup>

					<optgroup label="Fading Entrances">
					<option value="fadeIn"<?php if($default_animation == 'fadeIn') { echo ' selected="selected"'; } ?>>fadeIn</option>
					<option value="fadeInDown"<?php if($default_animation == 'fadeInDown') { echo ' selected="selected"'; } ?>>fadeInDown</option>
					<option value="fadeInDownBig"<?php if($default_animation == 'fadeInDownBig') { echo ' selected="selected"'; } ?>>fadeInDownBig</option>
					<option value="fadeInLeft"<?php if($default_animation == 'fadeInLeft') { echo ' selected="selected"'; } ?>>fadeInLeft</option>
					<option value="fadeInLeftBig"<?php if($default_animation == 'fadeInLeftBig') { echo ' selected="selected"'; } ?>>fadeInLeftBig</option>
					<option value="fadeInRight"<?php if($default_animation == 'fadeInRight') { echo ' selected="selected"'; } ?>>fadeInRight</option>
					<option value="fadeInRightBig"<?php if($default_animation == 'fadeInRightBig') { echo ' selected="selected"'; } ?>>fadeInRightBig</option>
					<option value="fadeInUp"<?php if($default_animation == 'fadeInUp') { echo ' selected="selected"'; } ?>>fadeInUp</option>
					<option value="fadeInUpBig"<?php if($default_animation == 'fadeInUpBig') { echo ' selected="selected"'; } ?>>fadeInUpBig</option>
					</optgroup>

					<optgroup label="Flippers">
					<option value="flipInX"<?php if($default_animation == 'flipInX') { echo ' selected="selected"'; } ?>>flipInX</option>
					<option value="flipInY"<?php if($default_animation == 'flipInY') { echo ' selected="selected"'; } ?>>flipInY</option>
					</optgroup>

					<optgroup label="Lightspeed">
					<option value="lightSpeedIn"<?php if($default_animation == 'lightSpeedIn') { echo ' selected="selected"'; } ?>>lightSpeedIn</option>
					</optgroup>

					<optgroup label="Rotating Entrances">
					<option value="rotateIn"<?php if($default_animation == 'rotateIn') { echo ' selected="selected"'; } ?>>rotateIn</option>
					<option value="rotateInDownLeft"<?php if($default_animation == 'rotateInDownLeft') { echo ' selected="selected"'; } ?>>rotateInDownLeft</option>
					<option value="rotateInDownRight"<?php if($default_animation == 'rotateInDownRight') { echo ' selected="selected"'; } ?>>rotateInDownRight</option>
					<option value="rotateInUpLeft"<?php if($default_animation == 'rotateInUpLeft') { echo ' selected="selected"'; } ?>>rotateInUpLeft</option>
					<option value="rotateInUpRight"<?php if($default_animation == 'rotateInUpRight') { echo ' selected="selected"'; } ?>>rotateInUpRight</option>
					</optgroup>

					<optgroup label="Specials">
					<option value="hinge"<?php if($default_animation == 'hinge') { echo ' selected="selected"'; } ?>>hinge</option>
					<option value="rollIn"<?php if($default_animation == 'rollIn') { echo ' selected="selected"'; } ?>>rollIn</option>
					</optgroup>
				</select>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<th scope="row">Style CSS</th>
			<td>
				<label for="style_css">
				<input id="style_css" type="checkbox" name="vl_tabbing_style_css" value="1"<?php if(isset($style_css) && $style_css) { echo ' checked="checked"'; } ?>>
				 For your own Stylesheet, deactivate it.
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row">Default width</th>
			<td>
				<input type="text" name="vl_tabbing_default_width" value="<?php echo $default_width; ?>" /> in px<br />
				For 100% leave it blank.
			</td>
		</tr>
		<tr>
			<th scope="row">Tab Title char width</th>
			<td>
				<input type="text" name="vl_tabbing_tab_title_char_with" value="<?php echo $tab_title_char_with; ?>" /> in px<br />
				The width of a single char.
			</td>
		</tr>		
		<tr>
			<th scope="row">Editor Shortcode Button</th>
			<td>
				<label for="editor_button">
				<input id="editor_button" type="checkbox" name="vl_tabbing_editor_button" value="1"<?php if(isset($editor_button) && $editor_button) { echo ' checked="checked"'; } ?>>
				Add a Button to the Visuell Editor.
				</label>
			</td>
		</tr>	
		<tr>
			<th colspan="2">
				<?php @submit_button(); ?>
				
				visionlike
			</th>
		</tr>
	</table>
</td>
<td><div style="width:50px; height:50px;"></div></td>
<td style="min-width:650px; vertical-align:top;">
<h3 style="margin:0 0 15px 0;">CSS Tab Example</h3>
<strong>Shortcode</strong><br />
<textarea style="width:100%; height:76px; font-size:12px; margin-bottom:30px;">
<?php 

$options = ' ';

if($default_width) {
	$options .= 'width="'.$default_width.'" ';
}

if($default_animation) {
	$options .= 'ani="'.$default_animation.'" ';
}

$options = rtrim($options);

?>
[tabbing<?php echo $options; ?>]
[tab name="Testing #01" check="1"]Content #01[/tab]
[tab name="Testing #02"]Content #02[/tab]
[/tabbing]</textarea>
<strong>Example</strong><br />
<div id="admin_tab_example">

<div style="width:<?php echo ($default_width) ? $default_width.'px' : ''; ?>;" class="tabbing" id="tabbing-1"><ul class="ultab">
<li class="litab"><input type="radio" id="tab1" name="tabs1" checked=""><label class="labeltab" for="tab1" style="width:108px; left:0px;">A. Einstein</label><div style="width:<?php echo ($default_width) ? $default_width.'px' : ''; ?>;" class="tab-content ct" id="tab-content-1"><?php if($default_animation) { ?><div class="vl-tabbing-animated <?php echo $default_animation; ?>"><?php } ?>
<div style="display:table; margin-bottom:15px;">
<div style="display:table-row;">
<div style="display:table-cell; vertical-align:middle;">
<img alt="Albert Einstein" src="<?php echo plugins_url( 'pics/einstein.jpg', __FILE__ ) ?>" style="width:100px; height:auto; margin-right:20px; border:#97BF0D 2px solid; display:block;">
</div>
<div style="display:table-cell; vertical-align:middle;">
<p><strong>Only two things are infinite</strong>, the universe and human stupidity, and I’m not sure about the former.</p>
<p><strong>Albert Einstein</strong> - <em>1879 Ulm - † 18. April 1955 Princeton</em></p>
</div>
</div>
</div>
<strong style="background:#D1D1D1; border-bottom:#999 1px solid; padding:8px; display:block;">Theoretical Physicist</strong>
<p style="background:#F1F1F1; padding:10px;">Albert Einstein was a German-born theoretical physicist who developed the general theory of relativity, one of the two pillars of modern physics. While best known for his mass&ndash;energy equivalence formula E = mc², he received the 1921 Nobel Prize in Physics "for his services to theoretical physics, and especially for his discovery of the law of the photoelectric effect". The latter was pivotal in establishing quantum theory.</p>
<?php if($default_animation) { ?></div><?php } ?>
</div></li>

<li class="litab"><input type="radio" id="tab2" name="tabs1"><label class="labeltab" for="tab2" style="width:92px; left:109px;">M.L. King</label><div style="width:<?php echo ($default_width) ? $default_width.'px' : ''; ?>;" class="tab-content ct" id="tab-content-2"><?php if($default_animation) { ?><div class="vl-tabbing-animated <?php echo $default_animation; ?>"><?php } ?>
<div style="display:table; margin-bottom:15px;">
<div style="display:table-row;">
<div style="display:table-cell; vertical-align:middle;">
<img alt="Martin Luther King" src="<?php echo plugins_url( 'pics/king.jpg', __FILE__ ) ?>" style="width:100px; height:auto; margin-right:20px; border:#97BF0D 2px solid; display:block;">
</div>
<div style="display:table-cell; vertical-align:middle;">
<p><strong>In the End </strong>, we will remember not the words of our enemies, but the silence of our friends.</p>
<p><strong>Martin Luther King</strong> - <em>1929 Atlanta - † 1968 Memphis</em></p>
</div>
</div>
</div>
<strong style="background:#D1D1D1; border-bottom:#999 1px solid; padding:8px; display:block;">Minister</strong>
<p style="background:#F1F1F1; padding:10px;">Martin Luther King Jr. was an American Baptist minister and activist who was a leader in the African-American Civil Rights Movement. He is best known for his role in the advancement of civil rights using nonviolent civil disobedience based on his Christian beliefs.</p>
<?php if($default_animation) { ?></div><?php } ?>
</div></li>

<li class="litab"><input type="radio" id="tab3" name="tabs1"><label class="labeltab" for="tab3" style="width:100px; left:202px;">P. Ustinov</label><div style="width:<?php echo ($default_width) ? $default_width.'px' : ''; ?>;" class="tab-content ct" id="tab-content-3"><?php if($default_animation) { ?><div class="vl-tabbing-animated <?php echo $default_animation; ?>"><?php } ?>
<div style="display:table; margin-bottom:15px;">
<div style="display:table-row;">
<div style="display:table-cell; vertical-align:middle;">
<img alt="Peter Ustinov" src="<?php echo plugins_url( 'pics/ustinov.jpg', __FILE__ ) ?>" style="width:100px; height:auto; margin-right:20px; border:#97BF0D 2px solid; display:block;">
</div>
<div style="display:table-cell; vertical-align:middle;">
<p><strong>Corruption is nature’s way</strong> of restoring our faith in democracy.</p>
<p><strong>Peter Ustinov</strong> -<em>1921 London - † 2004 Genolier</em></p>
</div>
</div>
</div>
<strong style="background:#D1D1D1; border-bottom:#999 1px solid; padding:8px; display:block;">English Actor</strong>
<p style="background:#F1F1F1; padding:10px;">Sir Peter Alexander Ustinov, CBE FRSA was an English actor, writer and dramatist. He was also renowned as a filmmaker, theatre and opera director, stage designer, author, screenwriter, comedian, humorist, newspaper and magazine columnist, radio broadcaster, and television presenter. A noted wit and raconteur, he was a fixture on television talk shows and lecture circuits for much of his career. He was also a respected intellectual and diplomat who, in addition to his various academic posts, served as a Goodwill Ambassador for UNICEF and President of the World Federalist Movement.</p>
<?php if($default_animation) { ?></div><?php } ?>
</div></li>

<li class="litab"><input type="radio" id="tab4" name="tabs1"><label class="labeltab" for="tab4" style="width:84px; left:303px;">S. Freud</label><div style="width:<?php echo ($default_width) ? $default_width.'px' : ''; ?>;" class="tab-content ct" id="tab-content-4"><?php if($default_animation) { ?><div class="vl-tabbing-animated <?php echo $default_animation; ?>"><?php } ?>
<div style="display:table; margin-bottom:15px;">
<div style="display:table-row;">
<div style="display:table-cell; vertical-align:middle;">
<img alt="Sigmund Freud" src="<?php echo plugins_url( 'pics/freud.jpg', __FILE__ ) ?>" style="width:100px; height:auto; margin-right:20px; border:#97BF0D 2px solid; display:block;">
</div>
<div style="display:table-cell; vertical-align:middle;">
<p><strong>Most people do not really want freedom</strong>, because freedom involves responsibility, and most people are frightened of responsibility.</p>
<p><strong>Sigmund Freud</strong> - <em>1856 Freiberg - † 1939 London</em></p>
</div>
</div>
</div>
<strong style="background:#D1D1D1; border-bottom:#999 1px solid; padding:8px; display:block;">Neurologist</strong>
<p style="background:#F1F1F1; padding:10px;">Sigmund Freud was an Austrian neurologist and the founder of psychoanalysis, a clinical method for treating psychopathology through dialogue between a patient and a psychoanalyst. Freud was born to Galician Jewish parents in the Moravian town of Freiberg, in the Austro-Hungarian Empire. He qualified as a doctor of medicine in 1881 at the University of Vienna. Upon completing his habilitation in 1885, he was appointed a docent in neuropathology and became an affiliated professor in 1902. Freud lived and worked in Vienna, having set up his clinical practice there in 1886. In 1938 Freud left Austria to escape the Nazis. He died in exile in the United Kingdom in 1939.</p>
<?php if($default_animation) { ?></div><?php } ?>
</div></li>
</ul></div>

</div>
<strong>style.css</strong> (Example for your own style.css)<br />
<textarea style="width:100%; height:130px; font-size:12px;">
<?php echo file_get_contents(dirname(__FILE__).'/css/style.css'); ?>
</textarea>
</td>
</tr>
</table>
</form>
</div>

<script>

jQuery('.form-table input, .form-table select').on('change keyup', function() {
	
	var acss = jQuery('input[name="vl_tabbing_animation_css"]:checked').val();
	var da = jQuery('select[name="vl_tabbing_default_animation"]').val();
	var sc = jQuery('input[name="vl_tabbing_style_css"]:checked').val();
	var dw = jQuery('input[name="vl_tabbing_default_width"]').val();
	var cw = jQuery('input[name="vl_tabbing_tab_title_char_with"]').val();

	if(dw) { dwtc = dw-30; } else { dwtc = ''; }
	
	jQuery('.tabbing').width(dw);
	jQuery('.tab-content').width(dwtc);
	
	if(sc) {
		jQuery('#vl-tabbing-style-css').attr('href','<?php echo plugins_url( '/css/style.css' , __FILE__ ); ?>');
	} else {
		jQuery('#vl-tabbing-style-css').attr('href','');		
	}
	
	if(!jQuery('.vl-tabbing-animated').length) {
		jQuery('.tabbing .tab-content').wrapInner('<div class="vl-tabbing-animated"></div>');
	}
	
	if(acss) {
		jQuery('.vl-tabbing-animated').attr('class','').addClass('vl-tabbing-animated').addClass(da);
	} else {
		jQuery('.vl-tabbing-animated').attr('class','').addClass('vl-tabbing-animated');
	}
	
	var width_up = 0;
	jQuery('.tabbing .labeltab').each(function(index){
		
		var text = jQuery(this).text().length;
		
		width = (text*cw)+20;
		var left = width_up;
		
		jQuery(this).width(width);
		jQuery(this).css('left',left+'px');

		width_up = width_up+width+1;
		
	});
	
});
	
jQuery('textarea').click(function(e) {

	e.target.select();
	document.execCommand('copy');
	jQuery(this).before('<div class="updated settings-error notice is-dismissible" id="setting-error-settings_updated"><p><strong>Already Copied!</strong></p></div>');
	jQuery('.updated').delay(1000).fadeOut(500);
	
	jQuery(e.target).one('mouseup', function(e) {
		e.preventDefault();
	});

});
</script>