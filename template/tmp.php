<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Выше 3 Мета-теги ** должны прийти в первую очередь в голове; любой другой руководитель контент *после* эти теги -->
    <title>Task 12 PDO</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- Предупреждение: Respond.js не работает при просмотре страницы через файл:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script >
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand " href="#">Task 12 -- PDO</a>
        </div>
    </div>
</nav>
<div class="container center-block ">
    <div class="starter-template text-center">
        <?=$msg? '<p class="alert-danger">'.$msg : '</p>'?>

lala






    </div>
</div>


<footer class="modal-footer navbar-inverse navbar-fixed-bottom" style="padding: 3px;">
    <div class="container">
        <a class="navbar-brand" style="float: right" href="#">Task 12</a>
    </div>
</footer>
<!-- на jQuery (необходим для Bootstrap - х JavaScript плагины) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Включают все скомпилированные плагины (ниже), или включать отдельные файлы по мере необходимости -->
<script src="js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>