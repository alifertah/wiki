<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=home">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php 
        if(isset($_SESSION['user_type'])){
          if($_SESSION['user_type'] === 'admin'){
            echo ("
            <div class='dropdown'>
            <button class='btn  dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Actions
            </button>
            <ul class='dropdown-menu'>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='index.php?page=categories'>categories</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='index.php?page=tags'>Tags</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='index.php?page=dashboard'>Dashboard</a>
            </li>
              <form method='post' action='index.php?page=logout'>
                <li><button class='dropdown-item text-danger' type='submit' name='logout'>Logout</button></li>
              </form>
            </ul>
          </div>
            ");
          }if($_SESSION['user_type'] == 'author') {
            echo ("
            <div class='dropdown'>
            <button class='btn  dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Actions
            </button>
            <ul class='dropdown-menu'>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='index.php?page=new_post'>new post</a>
          </li>
            <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='index.php?page=new_post'>manage post</a>
          </li>
              <form method='post' action='index.php?page=logout'>
                <li><button class='dropdown-item text-danger' type='submit' name='logout'>Logout</button></li>
              </form>
            </ul>
            
          </div>
            ");
          }
        } else {
          echo("
          <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
          <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='index.php?page=login'>login</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='index.php?page=register'>register</a>
          </li>
          <ul>
          ");
        }
        ?>
      </ul>
    <input class="form-control me-2" type="search" placeholder="Search" id="searchbar" aria-label="Search">
    </div>
  </div>
</nav>
    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>

    <footer></footer>
    <script src="<?= PATH ?>assets/js/main.js"></script>
    <script>
        formData = new FormData();
        b = document.querySelectorAll('.blogCard')
        let s = document.getElementById("searchbar")
        s.addEventListener("keyup", ()=>{
          searchItem = s.value.toLowerCase()
          for(let i = 0 ; i < b.length ; i++){
            cardText = b[i].textContent.toLowerCase()
            if(cardText.includes(searchItem)){
              b[i].style.display = "block";
            } else {
              b[i].style.display = "none";
            }
          }
          //   formData.append("searchValue", s.value)
        //   fetch("index.php?page=search", {
        //     method: "post",
        //     body: formData
        //   })
        //   .then(response => response.json())
        //   .then(data => console.log(data))
        })
    </script>
  </body>
</html>