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
        </header>
        
        <marquee>
            <h1>Ах ты ж ёб твою мать!</h1>
        </marquee>
        <div class="container">
            <?=$content?>
        </div>
        <?php debug(vendor\core\Db::$countSql)?>
        <?php debug(vendor\core\Db::$queries)?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="../../../public/js/search.js"></script>
    </body>
</html>