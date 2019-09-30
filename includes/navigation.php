<nav id="main-navbar" class="navbar navbar-inverse navbar-expand-lg">
  <div class="container-fluid">
    <div class="navbar-header" style="display: inline;">
      <img src="images/kost.jpg" height="40px" width="60px">
      <a id="brand" class="navbar-brand" href="index.php">
        <h2><strong>Polovni automobili</strong></h2>
      </a>
      <img src="images/kost.jpg" height="40px" width="60px">
    </div>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">Početna</a></li>
      <li class="nav-item"><a class="nav-link" href="register.php">Registracija</a></li>
      <?php if (isset($_SESSION['username'])) { ?>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
        <?php if ($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item"><a class="nav-link" href="insert.php">Izmeni oglase</a></li>
        <?php
        }
        if ($_SESSION['role'] == 'subscriber') { ?>
          <li class="nav-item"><a class="nav-link" href="add_page.php">Dodaj automobil</a></li>
        <?php   }
      }
      ?>
    </ul>

    <?php if (!isset($_SESSION['username'])) {  ?>
      <form class="form-inline" action="login.php" method="post">
        <div class="input-group">
          <input type="text" name="username" class="form-control" placeholder="Korisničko ime">
          <input type="password" name="password" class="form-control" placeholder="Lozinka">
          <button class="btn btn-success" type="submit" name="login">Prijavi se</button>
        </div>
      </form>
    <?php } ?>
  </div>
</nav>