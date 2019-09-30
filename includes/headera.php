<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Polovni automobili</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<script type="text/javascript" src="jquery-1.10.2.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#search").keyup(function() {
            var vrednost = $("#search").val();
            $.get("suggest.php", {
                    unos: vrednost
                },
                function(data) {
                    $("#livesearch").show();
                    $("#livesearch").html(data);
                });
        });
    });

    function place(ele) {
        $("#search").val(ele.innerHTML);
        $("#livesearch").hide();
    }
</script>


<body id="adminPage" onload="document.getElementById('txt').focus()">