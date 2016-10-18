<?php

class Magentotutorial_Blogmate_IndexController extends Mage_Core_Controller_Front_Action {

    /**
     * A controller function that dumps pretty much everything for a post
     */

    public function dumpAction()
    {
        $params = $this->getRequest()->getParams(); // Gets any parameters passed in the URL
        $blog_post = Mage::getModel('blogmate/blogpost'); // Gets our model so we can use methods from said model

        echo('Loading post number'.$params['id']); // Echos the post ID
        $blog_post->load($params['id']); // Load all data assigned to that ID (Will only work when hooked up to a DB)

        $outputData = $blog_post->getData(); // Assign the data to a variable

        return $outputData;
    }

    /**
     * A controller function used to create a new post with preset data (C)
     */

    public function createAction()
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

    public function viewAllAction()
    {
        $posts = Mage::getModel('blogmate/blogspot')->getCollection(); // Get all the entries in the table (I think?)

        foeach($posts as $post){ // Foreach row we find in the database
            echo '<h3>'.$post->getTitle().'</h3>'; // Echo the title into a h3 tag
            echo nl2br($blogpost->getPost());
        }

    }

    /**
     * A controller function used to edit posts (U)
     * param ($id)
     */

    public function editAction()
    {

        $params = $this->getRequest()->getParams(); // Get any parameters passed through the URL, in this case we need an ID so we can find the post to edit

        $blog_post = Mage::getModel('blogmate/blogpost');
        $blog_post->load($params['id']); // Load the ID into the model
        $blog_post->setTitle('I need to learn how to pass form values in Magento');
        $blog_post->save(); // Send to DB

        echo('Post '.$params['id'].' has been successfully edited');
    }

    /**
     * A controller function to delete posts (D)
     */

    public function deleteAction()
    {
        $params = $this->getRequest()->getParams();
        $blog_post = Mage::getModel('blogmate/blogpost');
        $blog_post->load($params['id']);
        $blog_post->delete();
    }

    /**
     * A controller function to get the count of all our blog posts
     */

    public function countAction()
    {

        // Get the collection of posts from the table
        $post_collection = Mage::getModel('blogmate/blogpost')->getCollection();

        if(!count($post_collection))
        {
            echo("Beam me up Scotty, there's nothing here");
            exit;
        }

        echo('There are currently'.count($post_collection).' that have been created');

    }

    /**
     * A controller function used to view a blog post on a fresh page
     */

    public function viewAction()
    {
        $param = $this->getRequest()->getParam('id'); // Set up ID Parameter in the get request
        $posts = Mage::getModel('blogmate/blogspot')->getCollection(); // Get collection of blog posts from table
        $data = $posts->addFieldToFilter('blogpost_id', $param)->getfirstItem(); // Get first item we find that matches the ID
        return $data; // Return the value for output use.
    }

    /**
     * A controller function that handles comments
     */

    public function viewComments(){
        // we'll get there eventually
    }

}
