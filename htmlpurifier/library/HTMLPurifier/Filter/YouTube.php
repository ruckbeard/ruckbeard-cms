<?php

class HTMLPurifier_Filter_YouTube extends HTMLPurifier_Filter
{

    /**
     * @type string
     */
    public $name = 'YouTube';

    /**
     * @param string $html
     * @param HTMLPurifier_Config $config
     * @param HTMLPurifier_Context $context
     * @return string
     */
    public function preFilter($html, $config, $context)
    {
        $pre_regex = '#<iframe[^>]+>.+?' .
            '//www.youtube.com/((?:v|cp)/[A-Za-z0-9\-_=]+).+?</iframe>#s';
        $pre_replace = '<span class="youtube-embed">\1</span>';
        return preg_replace($pre_regex, $pre_replace, $html);
    }

    /**
     * @param string $html
     * @param HTMLPurifier_Config $config
     * @param HTMLPurifier_Context $context
     * @return string
     */
    public function postFilter($html, $config, $context)
    {
        $post_regex = '#<span class="youtube-embed">((?:v|cp)/[A-Za-z0-9\-_=]+)</span>#';
        return preg_replace_callback($post_regex, array($this, 'postFilterCallback'), $html);
    }

    /**
     * @param $url
     * @return string
     */
    protected function armorUrl($url)
    {
        return str_replace('--', '-&#45;', $url);
    }

    /**
     * @param array $matches
     * @return string
     */
    protected function postFilterCallback($matches)
    {
        $url = $this->armorUrl($matches[1]);
        return '<iframe width="560" height="315" ' .
        'src="//www.youtube.com/' . $url . '" ' .
        'frameborder="0" ' .
        'allowfullscreen>' .
        '</iframe>';
    }
}

// vim: et sw=4 sts=4