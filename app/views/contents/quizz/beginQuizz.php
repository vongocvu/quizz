<?php 
   $this->render('blocks/loading')
?>
<?php 
      $count = $count_questions->fetch_assoc();
      $row = $quizz->fetch_assoc();
      ?> 
            <div class="w-screen h-screen bg-black flex text-white">
                  <div class="m-auto rounded-2xl p-5" style="width: 400px ;background-color: rgb(32 32 32 / 50%)">
                  <div class="flex items-center py-5">
                        <img class="rounded-2xl" width="80" height="80" src="<?=_WEB_ROOT . '/public/images/'.$row['quizz_image']?>" alt="">
                        <div class="ml-4">
                              <h2 class="text-xl font-medium"><?=$row['quizzName']?></h2>
                              <p class="opacity-70 font-medium"><?=$count['numberQuestion']?> questions</p>
                        </div>
                  </div>
                  <button id="playQuizz" id_quizz = <?=$row['quizzID']?> name_quizz = <?=$row['quizzName']?> class="w-full p-5 bg-green-500 rounded-2xl text-2xl font-medium hover:opacity-80 mb-2"><i class="fa-solid fa-play p-1"></i> Start</button>
                  <button id="cancelQuizz" id_quizz = <?=$row['quizzID']?> class="w-full p-5 bg-purple-500 rounded-2xl text-2xl font-medium hover:opacity-80 mb-2"><i class="fa-solid fa-xmark p-1"></i>Cancel</button>
                  </div>
            </div>
       <?php
?>
 <script type="text/javascript">
      var playBtn = document.querySelector('#playQuizz')
      var cancelBtn = document.querySelector('#cancelQuizz')

            playBtn.addEventListener('click', function (e) {
                  window.location =  window.location.pathname.replace('readyQuizz', 'play')
            })   

            cancelBtn.addEventListener('click', function (e) {
                  history.back();
            })   
</script>