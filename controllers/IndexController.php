<?php

class Magentotutorial_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {

    /**
     * A controller function that dumps all the
     */

    public function dumpPostsAction()
    {
        $params = $this->getRequest()->getParams(); // Gets any parameters passed in the URL
        $blog_post = Mage::getModel('blogmate/blogpost'); // Gets our model so we can use methods from said model

        echo('Loading post number'.$params['id']); // Echos the post ID
        $blog_post->load($params['id']); // Load all data assigned to that ID (Will only work when hooked up to a DB)

        $outputData = $blog_post->getData(); // Assign the data to a variable
        var_dump($outputData); // Dump it into the website so we can what's going on under the bonnet
    }

    /**
     * A controller function used to create a new post with preset data (C)
     */

    public function createNewPostAction()
    {
        $blog_post = Mage::getModel('blogmate/blogpost'); // Pull the model once more for use in this function
        $blog_post->setTitle('Default'); // Use Varien, set the data to be passed into the title column as Default
        $blog_post->setPost('This post is a blank template, and can be re-worked however you wish.'); // Set the post text to be a placeholder
        $blog_post->save(); // Save and send to database

        echo($blog_post->getTitle() . ' has been created sucessfully'); // Let the user know that the post has been created
    }

    /**
     * A controller function used to view all the posts in the table (R)
     */

    public function viewAllPostsAction()
    {
        $posts = Mage::getModel('blogmate/blogspot')->getCollection(); // Get all the entries in the table (I think?)

        foeach($posts as $post){ // Foreach row we find in the database
            echo '<h3>'.$post->getTitle().'</h3>'; // Echo the title into a h3 tag
            echo nl2br($blogpost->getPost()); // Ask Asif about this function
        }

    }

    /**
     * A controller function used to edit posts (U)
     * param ($id)
     */

    public function editPostAction()
    {

        $params = $this->getRequest()->getParams(); // Get any parameters passed through the URL

        $blog_post = Mage::getModel('blogmate/blogpost');
        $blog_post->load($params['id']); // Load the ID into the model
        $blog_post->setTitle('I need to learn how to pass form values in Magento');
        $blog_post->save();

        echo('Post '.$params['id'].' has been successfully edited');
    }

    /**
     * A controller function to delete posts (D)
     */
    
    public function delPostAction()
    {
        $params = $this->getRequest()->getParams();
        $blog_post = Mage::getModel('blogmate/blogpost');
        $blog_post->load($params['id']);
        $blog_post->delete();
    }


}