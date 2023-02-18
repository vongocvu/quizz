<div class="home">
     <div class="grid grid-cols-3 gap-4">
         <div class="ms:col-span-1 md:col-span-2 lg:col-span-2 rounded-xl border-2 border-gray-300 flex items-center justify-center bg-white" style="height:220px">
             <div class="home-search rounded-xl border-2 border-gray-500 w-2/4 flex p-1.5 ">
                  <input type="text" class="home-input rounded-xl flex-1" placeholder="Enter a join code">
                  <button class="btn-search-home p-2 bg-purple-800 text-gray-200 border-2 border-gray-500 rounded-xl px-3.5 ml-1">JOIN</button>
             </div>
         </div>
         <div class="ms:col-span-1 md:col-span-1 lg:col-span-1 rounded-2xl border-2 border-gray-300 bg-white flex items-center justify-center" style="height:220px">
               <?php 
                  if (isset($_SESSION['user'])) {
                    ?>
                       <img class="rounded-full" width="50" src="<?= _WEB_ROOT.'/public/images/'.$_SESSION['image']?>" alt="hinh dai dien"/>
                       <span class="ml-3 font-medium"><?=$_SESSION['user']?></span>
                    <?php
                  } else {
                    ?>
                        <span class="px-3 py-1 bg-gray-400 ml-2 hover:opacity-80 cursor-pointer text-white rounded-md" onClick="showLogin()">Log In</span>
                        <span class="px-3 py-1 bg-gray-400 ml-2 hover:opacity-80 cursor-pointer text-white rounded-md" onClick="showSignUp()">Sign up</span>
                    <?php
                  }
               ?>
         </div>
     </div>
    <div class="grid grid-cols-6 gap-4">
        <?php 
            if(!empty($quizz)) {
                foreach($quizz as $item) {
                    ?>
                        <div class="col-span-1 mt-5">
                                <a href="<?php echo _WEB_ROOT .'/playQuizz/readyQuizz/'. $item['quizzID']?>" class="col-span-1 h-60 grid grid-rows-5 rounded-xl overflow-hidden border-2 border-gray-300 bg-white hover:opacity-80 hover:cursor-pointer hover:scale-105" style="animation: all 10s ease;">
                                    <img class="w-full h-full row-span-2  object-cover bg-center" src="<?=_WEB_ROOT . '/public/images/' . $item['quizz_image'] ?>" alt="">
                                    <div class="row-span-3 grid grid-rows-7 p-2">
                                            <h1 class="row-span-2 w-full font-bold text-black"><?= $item['quizzName'] ?></h1>
                                            <div class="flex row-span-2 items-center">
                                                <div class="w-12 h-12 flex items-center rounded-full overflow-hidden">
                                                      <img class="object-cover" width="100%" height="100%" src="<?=_WEB_ROOT . '/public/images/' . $item['image']?>" alt="">
                                                </div>
                                                <span class="ml-2 text-sm text-black"><?= $item['firstName'] . ' ' . $item['lastName']?></span>
                                            </div>
                                            <button class="row-span-1 w-full bg-yellow-300 rounded-xl text-black">100% accuracy</button>
                                    </div>
                                </a>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>


<div class="form-auth fixed inset-0 top-full w-full h-screen z-50 flex" style="background-color: rgba(0, 0, 0, 0.8)">
        <div class="m-auto" style="width: 530px">
            <div class="w-full flex relative" style="height: 170px">
                <div class="bg-yellow-600" style="width: calc(100% - 16px); margin: 0 auto; border-radius: 15px 15px 0px 0px;"></div>
                <img class="absolute" style="top: -30px; left: 50%; transform: translateX(-50%)" src="https://cf.quizizz.com/img/illustrations/live-transparentBG.png" alt="">
          </div>
          <div class="w-full bg-white rounded-2xl shadow-2xl relative flex px-14 pt-8">
             <button onCLick="hidden_auth()" class="absolute top-3 w-8 h-8 right-3 bg-gray-300 rounded-full flex items-center justify-center text-red-600 text-xl font-medium hover:opacity-80"><span><i class="fa-solid fa-xmark"></i></span></button>
               
             <div id="form_login" class="w-full h-full m-auto hidden">
                  <div class="mb-2">
                    <label class="text-sm font-medium text-gray-500" for="sign-up">Email / Username</label>
                    <div class="flex items-center mt-1 flex" style="border: 1px solid #ccc; padding: 0 3px">
                        <input id="username" class="flex-1 placeholder:text-gray-400 placeholder:font-thin" style="border: none" type="text" placeholder="mmcgonagall@hogwarts.edu">
                    </div>
                    <span id="err_username" class="text-red-600 text-xs"></span>
                  </div>

                  <div class="mb-2">
                    <label class="text-sm font-medium text-gray-500" for="password">Password</label>
                    <div class="flex items-center mt-1 flex" style="border: 1px solid #ccc; padding: 0 3px">
                        <input id="password" class="flex-1" style="border: none" type="password">
                    </div>
                    <span id="err_password" class="text-red-600 text-xs"></span>
                  </div>

                  <div class="">
                    <a class="text-purple-600 text-sm font-medium hover:underline" href="">Forgot Password?</a>
                  </div>

                  <div  onClick="submitLogin()" class="bg-purple-500 rounded-md p-1 flex items-center justify-center py-3 mt-10 cursor-pointer hover:opacity-80"> 
                    <span class="text-white font-samibold text-md ml-5 font-medium text-xl">Log In</span>
                  </div>

                  <div class="flex items-center justify-center py-5">
                    <span>Don't have an account?</span>
                    <button class="bg-purple-100 text-purple-800 py-2 px-3 rounded-lg ml-3" onClick="showSignUp()">Sign Up</button>
                  </div>
               </div>

               <div id="form_sign_up" class="w-full h-full m-auto hidden">
                  <div class="mb-2">
                    <label class="text-sm font-medium text-gray-500" for="sign-up">Sign up with email</label>
                    <div class="flex items-center mt-1 flex" style="border: 1px solid #ccc; padding: 0 3px">
                        <input class="flex-1 placeholder:text-gray-400 placeholder:font-thin" style="border: none" type="text" placeholder="mmcgonagall@hogwarts.edu">
                    </div>
                  </div>
                  <div class="flex items-center justify-center py-5">
                    <span>Already have ana account?</span>
                    <button class="bg-purple-100 text-purple-800 py-2 px-3 rounded-lg ml-3" onClick="showLogin()">Log In</button>
                  </div>
               </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $('.form-auth').css('transition', 'all .3s ease-in-out');

    function showLogin() {
        $('.form-auth').addClass('top-0')
        $('#form_login').removeClass('hidden')
        $('#form_sign_up').addClass('hidden')
    }

    function showSignUp () {
        $('.form-auth').addClass('top-0')
        $('#form_sign_up').removeClass('hidden')
        $('#form_login').addClass('hidden')
    }

    function hidden_auth() {
        $('.form-auth').removeClass('top-0')
        $('#username').val("")
        $('#password').val("")
        $('#err_username').text("")
        $('#err_password').text("")
    }

    function submitLogin() {
        if ($('#username').val() == '') {
           $('#err_username').text('Please enter a username !');
        } else {
            $('#err_username').text('');
        }

        if ($('#password').val() == '') {
           $('#err_password').text('Please enter a password !');
        } else {
            $('#err_password').text('');
        }
        
        
       if ($('#username').val() !== '' && $('#password').val() !== '') {

            $.ajax({
                type: 'POST',
                url: `${window.location}/auth/login`,
                data: {
                    email: $('#username').val(),
                    password: $('#password').val()
                },
                success: function (response) {
                    var res = jQuery.parseJSON(response)
                    if (res.status == 200) {
                        $('.form-auth').removeClass('top-0')
                        Swal.fire(
                                    `${res.message}`,
                                    'You clicked the button!',
                                    'success'
                              )

                            setTimeout ( () => {
                                location.reload()
                            }, 1000)
                       }

                    if (res.status == 404) {
                        $('#err_username').text(`${res.message}`)
                    }

                    if (res.status == 303) {
                        $('#err_password').text(`${res.message}`)
                    }
                }
            })
        }

    }

</script>