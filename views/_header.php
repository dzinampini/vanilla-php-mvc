<?php error_reporting(0);
$questions_json = '{
    "1": "This is the first question", 
    "2": "This is the second question", 
    "3": "This is the third question", 
    "4": "This is the fourth question", 
    "5": "This is the fifth question"
}'; ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title><?= $page_title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>


    </head>
    <body>