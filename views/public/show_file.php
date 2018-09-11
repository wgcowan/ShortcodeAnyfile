<?php
$width = isset($params['width'])
	? html_escape($params['width'])
	: '';
$height = isset($params['height'])
	? html_escape($params['height'])
	: '';
$img = isset($params['img'])
	? html_escape($params['img'])
	: 'false';
$anchor = isset($params['anchor'])
	? html_escape($params['anchor'])
	: 'false';
$lid = isset($params['id'])
	? html_escape($params['id'])
	: '';
$alt_string = isset($params['alt_string'])
	? html_escape($params['alt_string'])
	: '';
?>	
				<?php
				if ($img == "true"): {?>
					<img src="<?php echo img($lid);?>" title="<?php echo $alt_string?>" width=<?php echo $width;?> height=<?php echo $height;?>>
				<?php } else: {
					set_current_record('File',$file);
					$iTitle = metadata('file', array('Dublin Core', 'Title'));?>
					<?php if ($anchor == "file"): { ?>
						<a href="<?php echo record_url($file,'show');?>"">
							<?php echo file_image('thumbnail',array('title'=>$iTitle, 'width'=>$width, 'height'=>$height))?>
						</a>
					<?php } elseif ($anchor == "item"): { 						
						$item_id = metadata('File', 'item_id');
						$item = get_record_by_id('Item', $item_id);
						set_current_record('Item', $item);
						$iTitle = metadata('item', array('Dublin Core', 'Title'));
						echo link_to_item(file_image('thumbnail',array('title'=>$iTitle, 'width'=>$width, 'height'=>$height))); ?>
					<?php } else: { ?>
						<?php echo file_image('thumbnail',array('title'=>$iTitle, 'width'=>$width, 'height'=>$height))?>	
					<?php } endif;?>
				<?php } endif;?>

