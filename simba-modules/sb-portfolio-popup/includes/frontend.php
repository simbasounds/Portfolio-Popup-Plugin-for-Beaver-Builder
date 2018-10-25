<?php global $wp_embed;

function fixurl($input){
	// in case scheme relative URI is passed, e.g., //www.google.com/
	$input = trim($input, '/');
	// If scheme not included, prepend it
	if (!preg_match('#^http(s)?://#', $input)) {
	    $input = 'http://' . $input;
	}
	$urlParts = parse_url($input);
	// remove www
	$domain = preg_replace('/^www\./', '', $urlParts['host']);
	return $domain;
} ?>

<div class="sbpp-grid">
	<?php for ($i = 0; $i < count($settings->portfolio_item); ++$i) :
		if (empty($settings->portfolio_item[ $i ])) {continue;}
	  $block_photo = $settings ->portfolio_item[$i] ->photo_src;
		$popup_photo = $settings ->portfolio_item[$i] ->popup_photo_src;
	  $popup_title = $settings ->portfolio_item[$i] ->label;
	  $popup_subtitle = $settings ->portfolio_item[$i] ->subtitle;
	  $popup_content = $settings ->portfolio_item[$i] ->content;
		$popup_url = $settings ->portfolio_item[$i] ->url;
		$popup_url_fix = fixurl($popup_url);
		$popup_url_title = $settings ->portfolio_item[$i] ->url_title;
		$url_text = "";
		if (!empty($popup_url)) {
			if (!empty($popup_url_title)) {
				$url_text = '<div id="grid-url" class="sbpp-grid-text fl-clearfix"><p>Visit <a href="'.$popup_url.'" target="_blank" title="'.$popup_url_title.'">'.$popup_url_title.'</a> in a new tab.</p></div>';
			} else {
				$url_text = '<div id="grid-url" class="sbpp-grid-text fl-clearfix"><p>Visit <a href="'.$popup_url.'" target="_blank">'.$popup_url_fix.'</a> in a new tab.</p></div>';
			}
		}
		?>
		<div class="sbpp-block">
			<div class="sbpp-img-holder">
				<img class="block-image" src="<?php echo $block_photo ?>">
			</div>
			<div class="sbpp-overlay">
				<div class="sbpp-popup-img-holder">
					<img class="imageresource" src="<?php echo $popup_photo ?>">
				</div>
				<h2 class="sbpp-grid-title">
					<?php echo $popup_title ?>
				</h2>
				<h3 class="sbpp-grid-subtitle">
					<?php echo $popup_subtitle ?>
				</h3>
				<div id="grid-text" class="sbpp-grid-text fl-clearfix">
					<?php echo wpautop($wp_embed->autoembed($popup_content)); ?>
				</div>
				<?php echo $url_text; ?>
			</div>
		</div>
	<?php endfor; ?>
</div>


<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
		<div class="sbpp-modal-header">
			<div class="modal-titles">
				<h2 class="modal-title" id="modalTitle"></h2>
				<h3 class="modal-subtitle" id="modalSubTitle"></h3>
			</div>
			<button type="button" class="close" data-dismiss="modal">
				<span class="x" aria-hidden="true"></span>
				<span class="sr-only">Close</span>
			</button>
		</div>
    <div class="modal-inner">
      <a class="modal-image-holder" href="" target="_self">
        <img src="" id="imagepreview" class="modal-image" width="222" >
      </a>
      <div class="modal-body">
        <div class="modal-text" id="modalText"><p></p></div>
      </div>
    </div>
		<div class="sbpp-modal-footer">
			<div class="modal-url" id="modalURL"><p></p></div>
		</div>
  </div>
</div>
