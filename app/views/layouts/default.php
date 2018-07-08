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
            <div class="row">
              <div class="col-md-2 col-lg-2 col-sm-2 col-lg-2">
                <a href="/"><div id=main-but>Главная</div></a>
              </div>


              <div id="header-menu" class="col-md-8 col-lg-8 col-sm-8 col-lg-8">
                <ul type="none" class="menu">
                  <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="/">Профиль</a></li>
                    <li><a href="/news/create/">Написать Новость</a></li>
                  <?php endif;?>
                  <li><a href="/category/">Категории</a></li>
                  <li><a href="/main/tag/">Теги</a></li>
                  <li class="btn">Поиск</li>
                  <li><a href="/">О Нас</a></li>
                  <li onmouseover="move()" onmouseout="out()" ><a href="/">Подпольный бизнес</a>
                    <ul class="subMenu" type="none">
                      <li onmouseover="move1()" onmouseout="out1()"><a href="/">Продажа наркотиков</a>
                        <ul class="subSubMenu" type="none">
                          <li><a href="/">Кокаин</a></li>
                          <li><a href="/">Героин</a></li>
                          <li><a href="/">ЛСД</a></li>
                          <li><a href="/">Амфетамины</a></li>
                          <li><a href="/">Барбитураты</a></li>
                          <li><a href="/">Грибы</a></li>
                        </ul>
                      </li>
                      <li><a href="/">торговля оружием</a></li>
                      <li><a href="/">купить таз (дешево)</a></li>
                      <li><a href="/">киллер (дешево)</a></li>
                      <li><a href="/">закрыть сессию в КНУ (дешево)</a></li>
                      <li><a href="/">работа в Польше</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="col-md-2 col-lg-2 col-sm-2 col-lg-2">
                        <?php

                          isset($_SESSION['user_id']) ? $sign =['path' => "exit/", 'nameButton' => 'Выход'] : $sign =['path' => '', 'nameButton' => 'Авторизация'];
                        ?>
                        <form id="form-auth" method="POST" action="/auth/<?= $sign['path'] ?>" />
                          <input type="submit" name="auth" value="<?= $sign['nameButton'] ?>" />
                        </form>
                    </div>
            </div>


            <div class="row block" id="search-sub-menu">
              <div class="col-md-1 col-lg-1 col-sm-1 col-lg-1"></div>
              <div class="col-md-7 col-lg-7 col-sm-7 col-lg-7" id="ser">
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
              <div id="inp-search" class="col-md-3 col-lg-3 col-sm-3 col-lg-3">
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
              <div class="col-md-1 col-lg-1 col-sm-1 col-lg-1"></div>
            </div>
        </header>
        
        <marquee>
            <h1>Курс валют и погода</h1>
        </marquee>
        
        <?php if(isset($_SESSION['reg'])): ?>
            <div id="registration">
              <h4><?= $_SESSION['reg'] ?> -> <a href="#">перейти в кабинет</a></h4>
              <?php unset($_SESSION['reg']); ?>
            </div>
        <?php endif; ?>   

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    
                </div>
                <div class="col-8" id="cont">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="../../../public/js/search.js"></script>
        <script src="../../../public/js/comment.js"></script>
        <script src="../../../public/js/menu.js"></script>
        <script src="../../../public/js/news.js"></script>
        <script type="text/javascript">
            // setTimeout(function mod() {

                // $('.modal').modal("show");
            // }, 5000);

        </script>

    </body>
</html>