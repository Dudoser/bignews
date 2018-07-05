<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DEFAULT | <?=$title?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="/css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
         <header id="head">
            <a href="/"><div id=main-but>Главная</div></a>
            <div id="inp-search">
                <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="text" id="search" class="form-control" placeholder="введите тег..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <form id="search-form" action="/main/viws?tag=" method="POST">
                            <button class="btn btn-outline-secondary" id="but-s"  type="submit">Button</button>
                            <button class="btn btn-outline-secondary" id="but-r" onclick="fuu()" type="button">reset</button>
                        </form>
                      </div>
                    </div>
                    <select multiple class="form-control" id="list-search-form">
                    </select>

                </div>
            </div>


<div class="btn-group">
  <button type="button" class="btn btn-danger">Action</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

            <div>
                <form method="POST" action="/Main/search/">
                    <select name="sel_1">

                        <option value="any">Any</option>

                        <?php foreach ($categories as $category): ?>
                            <option><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>

                    </select>

                    <select name="sel_2">
                        <option value="any">Any</option>

                        <?php foreach ($categories as $category): ?>
                            <option><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>  

                    </select>

                    <input type="date" name="calendar_1">
                    <input type="date" name="calendar_2"> 
                    <input type="submit" name="submit_filter" value="filter">
                </form>
            </div>
        </header>
        
        <marquee>
            <h1>Курс валют и погода</h1>
        </marquee>

      
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    
                </div>
                <div class="col-8">
                    <?=$content?>
                </div>
                <div class="col-2">
              
                   <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="../../../public/images/3.jpg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <h3>Битконы</h3>
                            <p>ваучеры</p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="../../../public/images/2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="../../../public/images/3.jpg" alt="Third slide">
                        </div>
                      </div>
                    </div>
    
                </div>
            
            </div>
        </div>

        <?php debug(vendor\core\Db::$countSql)?>
        <?php debug(vendor\core\Db::$queries)?>

         <div class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">BigNews.com</h4>
              </div>
              <div class="modal-body" align="center">
                <p>Подпишитесь на новости портала.</p>
                <input type="email" name="nameFollow" placeholder="Ваш email...">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
              </div>
            </div>
          </div>
        </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="../../../public/js/search.js"></script>
        <script type="text/javascript">
            setTimeout(function mod() {

                //$('.modal').modal("show");
            }, 5000);

        </script>


    </body>
</html>