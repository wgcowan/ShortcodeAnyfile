<?php

class ShortcodeMyfilePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head');

    public function setUp()
    {
        add_shortcode('myfile', array('ShortcodeMyfilePlugin', 'myfile'));
        parent::setUp();
    }

    public function hookPublicHead($args)
    {
 		/**queue_css_file('jquery.fancybox');
		queue_css_file('jquery.fancybox-buttons');
		queue_js_file('jquery.fancybox.pack');
	    queue_js_file('jquery.fancybox-buttons');
		**/
    }

	/**
     * Build HTML for the carousel
     * @param array $args
     * @param Zend_View $view
     * @return string HTML to display
     */
    public static function myfile($args, $view)
    {
        static $id_suffix = 0;
        if (isset($args['is_featured'])) {
            $params['group'] = $args['group'];
        }

        if (isset($args['tags'])) {
            $params['tags'] = $args['tags'];
        }

        if (isset($args['user'])) {
            $params['user'] = $args['user'];
        }

        if (isset($args['id'])) {
            $params['range'] = $args['id'];
        }

        if (isset($args['width'])) {
            $params['width'] = $args['width'];
        }

        if (isset($args['height'])) {
            $params['height'] = $args['height'];
        }

        if (isset($args['num'])) {
            $limit = $args['num'];
        } else {
            $limit = 10;
        }
		$params['hasImage'] = 1;
		$id = explode(',',$args['id']);
	
       	$file = get_record_by_id('File', $args['id']);
        //handle the configs for jCarousel
        $configs = array('carousel' => array());

        //carousel configs
        if(isset($args['speed'])) {
            if(is_numeric($args['speed'])) {
                $configs['carousel']['animation'] = (int) $args['speed'];
            } else {
                $configs['carousel']['animation'] = $args['speed'];
            }
        }
        if(isset($args['showtitles']) && $args['showtitles'] == 'true') {
            $configs['carousel']['showTitles'] = true;
        }
        //autoscroll configs
        if(isset($args['autoscroll']) && $args['autoscroll'] == 'true') {
            $configs['autoscroll'] = array();
            if(isset($args['interval'])) {
                $configs['autoscroll']['interval'] = (int) $args['interval'];
            }
        }
        $html = $view->partial('show_file.php', array('file' => $file, 'id_suffix' => $id_suffix, 'params' => $args, 'configs' => $configs));
        $id_suffix++;
        return $html;
    }
}
