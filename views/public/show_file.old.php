<?php
$width = isset($params['width'])
	? html_escape($params['width'])
	: '';
$height = isset($params['height'])
	? html_escape($params['height'])
	: '';
?>	
				<?php
				set_current_record('File',$file);
				$item_id = metadata('File', 'item_id');
				$item = get_record_by_id('Item', $item_id);
				set_current_record('Item', $item);
				$iTitle = metadata('File', array('Dublin Core', 'Title'));?>
				<div id="distimeline" class="column-center-idhp colleft" style="margin-top:-3.5em;">
					<a href="<?php echo record_url($item,'show');?>">
					<?php echo file_image('square_thumbnail',array('width'=>$width, 'height'=>$height))?>
					</a>
				</div>

