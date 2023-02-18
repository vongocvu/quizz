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
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/admin/css/admin.css">
      <title>Admin - Home</title>
</head>
<body class="overflow-hidden">
      <div class="grid grid-cols-9">
            <?php $this->render('blocks/navbar') ?>
            <div class="col-span-8 h-screen bg-gray-100 overflow-y-auto scroll-smooth ">
                  <div class="search_dashboard flex items-center border-2 border-gray-300 px-5 bg-white sticky top-0">
                       <i class="fa-solid fa-magnifying-glass pr-3"></i>
                        <input class="bg-white font-semibold border-0 w-full outline-0 search-admin" style="border:none !important" type="text" placeholder="Search in Quizizz library">
                  </div>
                  <?php $this->render($content, $sub_content) ?>
                  <?php $this->render('blocks/footer') ?>
            </div>
      </div>
      <script type="text/javascript" src='<?=_WEB_ROOT?>/public/client/js/main.js'></script>
</body>
</html>