<?php
   
namespace u8202112;


use u8202112\User;
use u8202112\Comment;
use DateTime;

require './vendor/autoload.php';

$us1 = new User (1001,"John","gribabas@mail.com","000234");
echo "User1 created ".$us1->getCreationDate()->format("Y-m-d H:i:s")."\n";
$us2 = new User (1231,"Bob","grib@mail.com","04534");
echo "User2 created ".$us1->getCreationDate()->format("Y-m-d H:i:s")."\n";
$us3 = new User (1000,"Steve","babas@mail.com","086564");
echo "User3 created ".$us1->getCreationDate()->format("Y-m-d H:i:s")."\n";
$wrong_user = new User(100,"00023","bbibba","2030303030300302");

echo "End of validation. \n";

sleep(2);

$dateTime = new DateTime('2023-01-01 09:00:00');

$comments = [
    new Comment(new User(1111,"Shlep","arbuz@mail.com","ooasod03"),"FIRST LAB IS VERY NICE"),
    new Comment(new User(1341,"Sanek","tsar@mail.com","434ffzsde"),"I LIKE BANANAS"),
    new Comment(new User(1777,"Blat","blatnoy@mail.com","777777777"),"777777"),  
];
foreach ($comments as $comm){
    if(($comm->getUser()->getCreationDAte() > $dateTime)){
        echo $comm->getUser()->getCreationDate()->format('Y-m-d H:i:s')."\n";
        }
    }




