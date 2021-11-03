<?php 
  include 'conn.php';

  if(isset($_POST['done'])){
    $title = $_POST['title'];
    $body = $_POST['body'];

    $q = "INSERT INTO `note`(`title`, `body`) VALUES ('$title','$body')";

    $query = mysqli_query($con, $q);
    
  }

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">NoteBook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-3">
    <form method="post" action="home.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="body" id="body" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-primary" name="done">Submit</button>
    </form>
  </div>

  <div class="container my-4">
    <div class="row">
    
    <?php 
        include 'conn.php';
        
        $q = "SELECT * FROM note";
        
        $query = mysqli_query($con, $q);
        
        while($res = mysqli_fetch_array($query)) {

    ?>
    
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $res['title']; ?></h5>
            <p class="card-text"> <?php echo $res['body']; ?></p>
            <a href="delete.php?id=<?php echo $res['id']; ?>" class="btn btn-danger">Delete</a>
            <a href="update.php?id=<?php echo $res['id']; ?>" class="btn btn-primary">Update</a>
          </div>
        </div>
      </div>

      <?php
        };
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


</body>

</html>