<?php
/**
 * Created by PhpStorm.
 * User: olegaliullov
 * Date: 05.04.16
 * Time: 18:03
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        #metro-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
        #metro-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
        #metro-list li:hover{background:#F0F0F0;}
    </style>
</head>
<body>
<form id="orderFormd" name="orderFromd" action="" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
Введите станцию метро:
    <input name='metro' class=form-control placeholder='Станция метро' id=metro_search type='text'>
<div id=suggesstion-box></div>
<button type="submit" class="btn btn-primary">Отправить</button>
</form>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        console.log( "ready!" );
        getMetro();

    });
</script>

<script type="text/javascript">

    function selectMetro(val) {
        $("#metro_search").val(val);
        $("#suggesstion-box").hide();
    }

</script>

<script>

    function getMetro() {
        $("#metro_search").keyup(function () {
            $.ajax({
                type: "POST",
                url: "readMetrostations.php",
                data: 'keyword=' + $(this).val(),
                beforeSend: function () {
                    $("#metro_search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function (data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#metro_search").css("background", "#FFF");
                }
            });
        });
    }


</script>


</body>
</html>

