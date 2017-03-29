<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  
      {$page_title|default:basename(dirname($smarty.server.PHP_SELF))}
    </title>
    
    <script type="text/javascript">
    // for Safari browser, deal with back button
    window.onpageshow = function (event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
    </script>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" />

  {block name="localstyle"}{/block}
</head>
<body>     
  <header>
    <div>
      <img class="img-responsive" src="img/header.png" />
      <span class='login'>{$session->login->name|default}</span>
    </div>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" 
                  class="navbar-toggle collapsed" 
                  data-toggle="collapse" 
                  data-target="#toggleMenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">Home</a>
        </div>

        <div class="collapse navbar-collapse" 
             id="toggleMenu">
          <ul class="nav navbar-nav">
            {include file="links.tpl"}
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="container-fluid">{block name="content"}{/block}</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
