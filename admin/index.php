<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="/admin/">
  <title>Administration</title>

  <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
  <?php ob_start(); ?>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=".">Administration</a>
      </div>

      <!-- Menu top -->
      <ul class="nav navbar-top-links navbar-right">
        <!-- Message -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-alerts">
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-comment fa-fw"></i> Contact
                  <span class="pull-right text-muted small">0</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-calendar"></i> Réservation
                  <span class="pull-right text-muted small">0</span>
                </div>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a class="text-center" href="#">
                <strong>Voir tous les messages</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </li>
        <!-- User -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <?= $_SESSION['username'] ?> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
            </li>
            <li class="divider"></li>
            <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
            </li>
          </ul>
        </li>
      </ul>

      <!-- Menu latéral -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="."><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-edit fa-fw"></i> Contenues<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <?php foreach (glob('../data/*.json') as $data) : ?>
                  <li>
                    <a href="edit/<?= split(".json",basename($data))[0] ?>"><?= ucfirst(split(".json",basename($data))[0]) ?></a>
                  </li>
                <? endforeach; ?>
              </ul>
            </li>
            <li>
              <a href="media"><i class="fa fa-picture-o fa-fw"></i> Média</a>
            </li>
            <li>
              <a href="parametres"><i class="fa fa-cogs fa-fw"></i> Paramètres</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="page-wrapper">
      <?php require 'router.php' ?>
    </div>

  </div>

  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="js/sb-admin-2.js"></script>
</body>
</html>
