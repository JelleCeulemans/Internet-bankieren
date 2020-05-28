<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Internetbankieren</title>

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">



    <!-- Bootstrap CSS -->
    <?php echo pasStylesheetAan("bootstrap.css"); ?>

    <?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
    <?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>
    <?php echo haalJavascriptOp("bs_validator.js"); ?>

    <!-- font awesome (CDN) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <script>
        var site_url = '<?php echo site_url(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        .nav-link {
            font-weight: bold;
        }
        .text-danger {
            font-size: 0.8em;
        }
        #kaartlezer {
            border: 5px solid #ccc;
            width: 400px;
            padding: 20px;
            border-radius: 20px;


        }
        #kaartlezer:hover {
            box-shadow: 5px 5px 5px #bbb;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <?php echo anchor('/home/index', 'internetbankieren', array('class' => 'navbar-brand')); ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php echo anchor('/home/theorie', 'Theorie', array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo anchor('/aanmelden/index', 'Aanmelden', array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo anchor('/rekeningBekijken/index', 'Rekening Bekijken', array('class' => 'nav-link')); ?>
                </li>
		<li class="nav-item">
                    <?php echo anchor('/overschrijvenNaarJezelf/index', 'Overschrijven naar jezelf', array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo anchor('/overschrijvenNaarAnderen/index', 'Overschrijven naar anderen', array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo anchor('/quiz/index', 'Quiz', array('class' => 'nav-link')); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <h1 class="mt-5"><?php echo $titel; ?></h1>
    <div><?php echo $inhoud; ?></div>
</div>
</body>
</html>