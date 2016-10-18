<?php

echo 'Running upgrade: '.get_class($this).'\n <br> \n';


$installer = $this;
$installer->startSetup();
$installer->run("
       CREATE TABLE `{$installer->getTable('blogmate/blogpost')}` (
        'blogpost_id' int(11) NOT NULL auto_increment,
        `title` text,
        `post` text,
        `date` datetime default NULL,
        `timestamp` timestamp not null DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`blogpost_id`)
       ) engine=InnoDB DEFAULT CHARSET=utf8;
       
       INSERT INTO `{$installer->getTable('blogmate/blogpost')}` VALUES (1, 'Example Title', 'This is an example blog post, feel free to delete it', '2016-10-18 11:20:00', '2016-10-18 11:21:00');

")

