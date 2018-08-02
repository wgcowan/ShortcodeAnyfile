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
?>	
				<?php
				if ($img == "true"): {?>
					<img src="<?php echo img($lid);?>" width=<?php echo $width;?> height=<?php echo $height;?>>
				<?php } else: {
					$file = get_record_by_id('File',$lid);
					set_current_record('File',$file);
					$iTitle = metadata('file', array('Dublin Core', 'Title'));?>
					<?php if ($anchor == "true"): { ?>
						<a href="<?php echo record_url($file,'show');?>"">
							<?php echo file_image('thumbnail',array('alt'=>$iTitle, 'width'=>$width, 'height'=>$height))?>
						</a>
					<?php } else: { ?>
						<?php echo file_image('thumbnail',array('alt'=>$iTitle, 'width'=>$width, 'height'=>$height))?>	
					<?php } endif;?>
				<?php } endif;?>

