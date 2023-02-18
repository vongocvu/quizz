<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="https://cf.quizizz.com/img/favicon/favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/font/fontawesome-free-6.1.1-web/css/all.min.css">
      <title>Loading...</title>
      <style>
            .circle {
                  width: 300px;
                  height: 300px;
                  position: absolute;
                  border: 15px solid transparent;
                  border-radius: 50%;
                  background-color: transparent;
                  filter: drop-shadow(0 0 15px var(--a)) drop-shadow(0 0 15px var(--a));
            }


            .circle::before {
                  position: absolute;
                  content: "";
                  width: 30px;
                  height: 30px;
                  border-radius: 50%;
                  background-color: var(--a);
                  top: 20px;
                  left: 20px
            }

            .circle:nth-child(1) {
                  border-top: 15px solid var(--a);
                  animation: animate-1 2s linear infinite;
            }

            @keyframes animate-1 {
                  0% {
                        transform: rotateZ(120deg) rotateX(60deg) rotateZ(0)
                  }

                  100% {
                        transform: rotateZ(120deg) rotateX(60deg) rotateZ(360deg)
                  }
            }

            .circle:nth-child(2) {
                  border-top: 15px solid var(--a);
                  animation: animate-2 2s linear infinite;
            }

            @keyframes animate-2 {
                  0% {
                        transform: rotateZ(240deg) rotateX(60deg) rotateZ(0)
                  }

                  100% {
                        transform: rotateZ(240deg) rotateX(60deg) rotateZ(360deg)
                  }
            }


            .circle:nth-child(3) {
                  border-top: 15px solid var(--a);
                  animation: animate-3 2s linear infinite;
            }

            @keyframes animate-3 {
                  0% {
                        transform: rotateZ(0) rotateX(60deg) rotateZ(0)
                  }

                  100% {
                        transform: rotateZ(0) rotateX(60deg) rotateZ(360deg)
                  }
            }

            .loading-span {
                  font-size: 16px;
                  color: white;
                  text-transform: uppercase;
                  letter-spacing: 4px;
                  font-weight: 700;
                  text-shadow: 0 0 6px currentColor;
                  animation: flick 1s ease-in-out infinite;
            }

            @keyframes flick {
                  0% {
                        opacity: 0;
                  } 

                  100% {
                        opacity: 1;
                  }
            }

            .show {
                  display: flex;
            }

      </style>
</head>

<body>
      <div class="fixed inset-0 z-50 bg-black b-40 flex items-center justify-center loader" style="z-index: 1000">
            <div class="circle" style="--a: #00e731"></div>
            <div class="circle" style="--a: #ff2756"></div>
            <div class="circle" style="--a: #f7ff09"></div>
            <h1 class="loading-span font-medium text-2xl">Quizizz</h1>
      </div>
      <script type="text/javascript">
            var loader = document.querySelector('.loader')
                  setTimeout ( () => {
                         loader.classList.add('hidden')
                  },1000)
      </script>
</body>

</html>