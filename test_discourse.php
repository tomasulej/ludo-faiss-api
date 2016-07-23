<?php

require_once "DiscourseAPI.php";

$api = new DiscourseAPI("komunita.ludoslovensky.sk", "2997d055a4938cfa77eda450bdbb96cf1503c1fdb2153edcf372b3c7564f771c", "http");

// create user
$r = $api->createUser('janka krásná11', 'janka11', 'janka11@ludoslovensky.sk', 'LudoLudoVedMaNeser');
print_r($r);

// in order to activate we need the id
$r = $api->getUserByUsername('janka11');
//print_r($r);

//echo "<BR><BR><BR>s";

// activate the user
$r = $api->activateUser($r->apiresult->user->id);
print_r($r);

//echo "<BR><BR><BR>";

$r = $api->getUserByUsername('janka11');
print_r($r);




$r = $api->deactivateUser($r->apiresult->user->id);
print_r($r);

echo "<BR><BR><BR>";

// create a category
//$r = $api->createCategory('a new category', 'cc2222');
//print_r($r);

//$catId = $r->apiresult->category->id;

// create a topic
//$r = $api->createTopic(
//    'This is the title of a brand new topic', 
//    "This is the body text of a brand new topic. I really don't know what to say",
//    $catId,
//    "johndoe"
//);
//print_r($r);

//$topicId = $r->apiresult->id;

//$r = $api->createPost(
//    'This is the body of a new post in an existing topic',
//    $topicId,
//    $catId,
//    'johndoe'
//);
    
// change sitesetting
// use 'true' and 'false' between quotes

//$r = $api->changeSiteSetting('invite_expiry_days', 29);
//print_r($r);


?>