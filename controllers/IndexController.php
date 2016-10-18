<?php

class Magentotutorial_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {

    public function dumpPostsAction()
    {
        $params = $this->getRequest()->getParams(); // Gets any parameters passed in the URL
        $blog_post = Mage::getModel('blogmate/blogpost'); // Gets our model so we can use methods from said model

        echo('Loading post number'.$params['id']); // Echos the post ID
        $blog_post->load($params['id']); // Load all data assigned to that ID (Will only work when hooked up to a DB)

        $outputData = $blog_post->getData(); // Assign the data to a variable
        var_dump($outputData); // Dump it into the website so we can what's going on under the bonnet
    }


}