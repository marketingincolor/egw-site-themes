<?php
namespace Discussion\Modules\Blog\Shortcodes\PostLayoutThree;

use Discussion\Modules\Blog\Shortcodes\Lib\ListShortcode;
/**
 * Class PostLayoutThree
 */
class PostLayoutThree extends ListShortcode {

	/**
	 * @var string
	 */

    private $base;
    private $css_class;
    private $shortcode_title;

    public function __construct() {
		$this->base = 'mkd_post_layout_three';
        $this->css_class = 'mkd-pl-three';
        $this->shortcode_title = 'Mikado Post Layout 3';

        parent::__construct($this->base, $this->css_class, $this->shortcode_title);

		add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * add params for shortcode in next function
     * function gets $base for each shortcode
     *
     * @see discussion_get_shortcode_params()
     */

    /**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 *
     * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
            'title_tag' => 'h5',
            'title_length' => '',
            'display_category' => 'yes',
            'display_comments' => 'yes',
            'display_date' => 'yes',
            'date_format' => 'd. F Y',
            'display_excerpt' => 'yes',
            'excerpt_length' => '10',
            'display_share' => 'no',
            'thumb_image_size' => '',
            'thumb_image_width' => '',
            'thumb_image_height' => ''
		);

		$params = shortcode_atts($args, $atts);
        $html = '';

        if($atts['query_result']->have_posts()):
            while ($atts['query_result']->have_posts()) : $atts['query_result']->the_post();

                //Get HTML from template
                $html .= discussion_get_list_shortcode_module_template_part('post-template-three', 'templates', '', $params);

            endwhile;
        else:
                $html .= $this->errorMessage();

        endif;
        wp_reset_postdata();

		return $html;
	}

    protected function getAdditionalClasses($params){
        $holder_classes = array();

        if (isset($params['skin']) && $params['skin'] !== '') {
            $holder_classes[] = $params['skin'];
        }

        return $holder_classes;
    }
}