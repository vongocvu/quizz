<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="https://cf.quizizz.com/img/favicon/favicon.ico">
      <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/font/fontawesome-free-6.1.1-web/css/all.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/css/base.css">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/css/home.css">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/css/header.css">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/css/style.css">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/css/search.css">
      <title><?php echo !empty($title)? $title : 'QUIZZ - Home'; ?></title>
</head>
<body>
    <?php
      $this->render('blocks/loading', $sub_content);
      $this->render('blocks/header', $sub_content);
      ?>
          <div class="content-main bg-gray-100 py-10">
            <div class="content-container">
                <?php 
                      $this->render($content, $sub_content);
                ?>
            </div>
          </div>
      <?php
      $this->render('blocks/footer', $sub_content);
   ?>
   <script type="text/javascript" src='<?=_WEB_ROOT?>/public/client/js/main.js'></script>
</body>
</html>