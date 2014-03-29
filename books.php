<?php 
    require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SQL Injection demo">
    <meta name="author" content="Francesco Borzì">

    <title>SQL Injection Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Index</a></li>
          <li><a href="login1.php">Vulnerable Login</a></li>
          <li><a href="login2.php">Secure Login</a></li>
          <li><a href="books.php" class="active">Books</a></li>
        </ul>
		<h3 class="text-muted">SQL-Injection Demo</h3>
      </div>
      
      <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
          <form class="form-inline" role="form" action="books.php" method="GET">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Book title</label>
              <input type="text" name="title" class="form-control" placeholder="Book title">
            </div>
            <div class="form-group">
              <label class="sr-only" for="exampleInputPassword2">Book author</label>
              <input type="text" name="author" class="form-control"placeholder="Book author">
            </div>
            <button type="submit" class="btn btn-default">Search for a book...</button>
          </form>
        </div>  
      </div>
      
      <br>
      
      <table class="table table-bordered">
        <tr>
          <th>#ID</th>
          <th>Title</th>
          <th>Author</th>
        </tr>
      <?php
        $query = sprintf("SELECT * FROM books WHERE title = '%s' OR author = '%s';",
            $_GET['title'], $_GET['author']);

        $result = mysqli_query($connection, $query);

        while (($row = mysqli_fetch_row($result)) != null)
        {
            printf ("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
        }
      ?>
      </table>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>Query Executed:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre><?= $query ?></pre>
          </div>
        </div>
      </div>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>PHP Code:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre>
TODO
            </pre>
          </div>
        </div>
      </div>
      
      <br>
      <div class="footer">
        <p></p>Francesco Borzì - Computer Security Project</p>
      </div>

    </div> <!-- /container -->
	  
  </body>
</html>
