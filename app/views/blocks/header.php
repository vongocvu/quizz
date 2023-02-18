<div class="header">
      <div class="wrapper-header flex px-5">
            <div class="logo">
                  <img width="150" class="logo_img" src="<?=_WEB_ROOT?>/public/client/logo/logo_main.png" alt="logo">
            </div>
            <?php $this->render('blocks/search') ?>
            <nav class="nav-box">
                  <ul class="nav-list" style="margin: 0">
                        <a href="<?=_WEB_ROOT?>" class="nav-item active"><i class="fa-solid fa-house"></i><span>Home</span></a>
                        <a href="<?=_WEB_ROOT?>/product" class="nav-item"><i class="fa-solid fa-arrow-rotate-left"></i><span>Activity</span></a>
                        <a href="<?=_WEB_ROOT?>/product/detail/12234" class="nav-item"><i class="fa-solid fa-users"></i><span>Classes</span></a>
                  </ul>
            </nav>
            <div class="flex-1 flex justify-end">
                  <?php 
                    if (isset($_SESSION['user'])) {
                        ?> 
                          <a href="<?=_WEB_ROOT?>/admin/home" target="_blank" class="h-10 bg-gray-200 px-8 flex items-center cursor-pointer text-gray-800 no-underline ml-3">
                              <i class="fa-solid fa-screwdriver-wrench pr-2"></i> 
                              Admin Dashboard
                        </a>
                        <a href="<?=_WEB_ROOT?>/auth/logout" class="h-10 bg-gray-200 px-8 flex items-center cursor-pointer text-gray-800 no-underline ml-3">
                              Logout
                        </a>
                        <?php 
                    } else {
                        ?> 
                           <button class="px-5 py-2 border-2 ml-2 rounded-lg text-xl font-bold bg-gray-300 hover:opacity-80" onClick="showLogin()">Log in</button>
                           <button class="px-5 py-2 border-2 ml-2 rounded-lg text-xl font-bold bg-purple-700 text-white hover:opacity-80" onCLick="showSignUp()">Sign up</button>
                        <?php
                    }
                  ?>
            </div>
      </div>
</div>