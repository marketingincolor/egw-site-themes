<?php
use Discussion\Modules\Header\Lib;

if(!function_exists('mkd_set_header_object')) {
    function mkd_set_header_object() {
        $header_type = 'header-type3';

        $object = Lib\HeaderFactory::getInstance()->build($header_type);
        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'mkd_set_header_object', 1);
}