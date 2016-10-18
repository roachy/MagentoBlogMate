<?php

class Magentotutorial_Blogmate_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    protection function _construct()
    {
        $this->_init('blogmate/blogpost');
    }

}