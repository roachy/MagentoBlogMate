<?php

class Magentotutorial_Blogmate_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blogmate/blogpost', 'blogpost_id');
    }
}