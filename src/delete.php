<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete this file</title>

  <link rel="stylesheet" href="./assets/css/output.css">

  <!-- Glider Js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css"></link>

  <!-- Jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.5.0/glide.min.js"></script>


</head>
<body>


  <?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://coinranking1.p.rapidapi.com/coins?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=24h&tiers%5B0%5D=1&orderBy=marketCap&orderDirection=desc&limit=50&offset=0",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: coinranking1.p.rapidapi.com",
		"X-RapidAPI-Key: 5644888822msh521fd1fd2170731p11911bjsn7952dbf647f3"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
  $decodedResponse = json_decode($response);

  ?>

<div style="width: 1100px;" id="coins_update" class="glide w-[1100px] m-auto px-8 py-2 bg-[rgba(194,194,221,.15)] bg-opacity-60 rounded-3xl">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides px-5 inner_container">
      <!-- let __url = __element.iconUrl;
          let __shortName = __element.symbol;
          let __fullName = __element.name;
          let __price = __element.price;
          let __color = __element.color;
          let __change = __element.change;
          let __lowVolume = __element.lowVolume;
          let __marketCap = __element.marketCap; -->
      <?php foreach( $decodedResponse->data->coins as $coinsData ):?>
        <li class="glide__slide mx-1 p-5">
          <a href="#" class="relative flex flex-col box_shadow text-center hover:bg-white h-max w-52 p-4  justify-center rounded-3xl hover:duration-300 duration-300 ease-in-out gap-3 px-6">
            <img src="<?= $coinsData->iconUrl;?>" alt="logo" class="w-[40px] h-[40px]">

            <div class="flex justify-between w-full align-middle items-center">
                <span class="font-semibold text-sm text-gray-500 font-Poppins"><?= $coinsData->name;?></span>

                <span class="text-gray-800 text-xs capitalize"><?= $coinsData->symbol;?></span>
            </div>

            <span class="block text-left">$<?= number_format($coinsData->price, 3);?></span>
            <?php
            
                if ( $coinsData->change < 0 ) {
                  ?>
                  <span class="bg-red-500 text-white text-xs font-Barlow w-max rounded-md p-2 "><?= $coinsData->change;?></span>

                <?php
                }
                else {
                  ?>
                  <span style="background-color: #22cc1d;" class="bg-green-500 text-white text-xs font-Barlow w-max rounded-md p-2 "><?= $coinsData->change;?></span>

                  <?php
                }
            ?>
          </a>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow left-[-26px] btn_slider group flex align-center justify-center items-center" data-glide-dir="&lt;">
        <svg width="18" class="m-0 inline" height="30" viewBox="0 0 18 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 2L3 15L16 28" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
      </button>
      <button class="glide__arrow right-[-26px] btn_slider group flex align-center justify-center items-center" data-glide-dir="&gt;">
        <svg width="18" class="m-0 inline" height="30" viewBox="0 0 18 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L15 15L2 28" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path></svg>
      </button>
    </div>
  </div>

<?php
}

?>

 

  <style>
    .glide__arrow {
      position: absolute;
      display: block;
      top: 50%;
      z-index: 2;
      opacity: 1;
      transform: translateY(-50%);
    }

    .btn_slider {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0;
      line-height: 0;
      background: #fcfcfd;
      color: #0b243a;
      border-radius: 10px;
      width: 52px;
      height: 100px;
      z-index: 9;
      cursor: pointer;
      border: none;
      box-shadow: 0 8px 14px rgb(90 123 254 / 15%);
      transition: all .25 ease;
      overflow: hidden;
    }

    .box_shadow:hover {
      box-shadow: 0 8px 14px rgb(90 123 254 / 15%);
      transition: all .25 ease;
    }

    .btn_slider:hover::before, .btn_slider:hover::after  {
      background-color: #005ad3;
      animation-name: borderanimate;
      animation-duration: .5s;
      color: white;
      animation-timing-function: ease;
    } 

    .btn_slider:hover svg {
      color: white;
      stroke: white;
      z-index: 999;
    }

    .btn_slider::before, .btn_slider::after  {
      background: 0 0;
      z-index: -2;
      transform: translate3D(0,0,0);
    }

    .btn_slider::before, .btn_slider::after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      height: calc(100% + 4px);
      border: none;
    }
  

    @keyframes borderanimate {
      from {
        border-radius: 0 100px 100px 0;
        
      }
      to {
        border-radius: 0px;
        
      }
    }
    
    @media screen and (max-width: 1100px ) {
        #coins_update {
            width: 80% !important;
        }
    }
    
    @media screen and (max-width: 800px ) {
         #coins_update {
            width: 85% !important;
        }
    }
    
     @media screen and (max-width: 400px ) {
         #coins_update {
            width: 80% !important;
        }
    }
    
  </style>

  <script>
    const config = {
      type: 'carousel',
      startAt: 0,
      perView: 4,
      gap: 32,
      autoplay: 3000,
      animationDuration: 1000,
      breakpoints: {
        1280: {
          perView: 3,
        },
        768: {
          perView: 3,
        },
        560: {
            perView: 2,            
        },
        360: {
            perView: 1,
        }
      }
    }
    new Glide('.glide', config).mount()

  </script>

</body>
</html>