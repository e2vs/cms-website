    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand">Hallintapaneeli</span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="./"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Asetukset</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Artikkelit
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="?s=newpost">Kirjoita uusi</a></li>
                <li><a href="?s=posts">Kaikki artikkelit</a></li> 
              </ul>
            </li>
            <li><a href="?s=users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Käyttäjät</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="?s=user"><strong><?php echo $_SESSION['user_name'] ?></strong></a></li>
            <li><a href="index.php?logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Kirjaudu ulos</a></li>
          </ul>
        </div>
      </div>
    </nav>