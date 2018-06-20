<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="UTF-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="">
      <meta http-equiv="refresh" content="50" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="Mainamati News 24, bangla news, current News, bangla newspaper, bangladesh newspaper, online paper, bangladeshi newspaper, bangla news paper, bangladesh newspapers, newspaper, all bangla news paper, bd news paper, news paper, bangladesh news paper, daily, bangla newspaper, daily news paper, bangladeshi news paper, bangla paper, all bangla newspaper, bangladesh news, daily newspaper,ময়নামতি নিউজ, অনলাইন, পত্রিকা, বাংলাদেশ, আজকের পত্রিকা, আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, নকশা, রস+আলো, ছুটির দিনে, অধুনা, স্বপ্ন নিয়ে, আনন্দ, অন্য আলো, সাহিত্য, গোল্লাছুট, প্রজন্ম ডট কম, বন্ধুসভা,কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর" />
      @if(isset($newsData)) 
         
         <meta name="description" content="{{$newsData->heading}}" />
         @else
         <meta name="description" content="Online Latest Bangla News/Article - Sports, Crime, Entertainment, , Business, Politics, Education, Opinion, Lifestyle, Photo, Video, Travel, National, World" />
      @endif
      <link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="icon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="icon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="icon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="icon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="icon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="icon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
      <link rel="manifest" href="icon/manifest.json">

      <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="{{ asset('js/eff9c5088baa49e9bd8c7c671a90df4b.js') }}" data-minify="1"></script>
      <script src="{{ asset('js/3ce2a227a765bb0b5ef3db53eaa6ff84.js') }}" data-minify="1"></script> 

      <link rel="stylesheet" href="{{ asset('css/style.css') }}""/>
      <link rel="stylesheet" href="{{ asset('css/assets/plugin.css') }}""/>
      <link rel="stylesheet" href="{{ asset('css/assets/jquery.datetimepicker.css') }}""/>
      <link rel="stylesheet" href="{{ asset('css/72271483133bca497cee626ebfb43b18.css') }}""/>
      <script src="{{ asset('css/assets/plugins.js') }}" data-minify="1"></script> 
      <script src="{{ asset('css/assets/jquery.datetimepicker.js') }}" data-minify="1"></script> 
      <script src="{{ asset('css/assets/modernizr-2.8.3.min.js') }}" data-minify="1"></script> 
      <script src="{{ asset('css/assets/main.js') }}""></script> 
      
      <style type="text/css">img.wp-smiley,img.emoji{display:inline !important;border:none !important;box-shadow:none !important;height:1em !important;width:1em !important;margin:0
         .07em !important;vertical-align:-0.1em !important;background:none !important;padding:0
         !important}
      </style>
      <script data-no-minify="1" data-cfasync="false">(function(w,d){function a(){var b=d.createElement("script");b.async=!0;b.src="{{ asset('js/lazyload.1.0.5.min.js') }}";var a=d.getElementsByTagName("script")[0];a.parentNode.insertBefore(b,a)}w.attachEvent?w.attachEvent("onload",a):w.addEventListener("load",a,!1)})(window,document);</script>
      <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   {{-- <link rel="stylesheet" type="text/css" media="all" href="css/stellarnav.min.css"> --}}
   <link href="{{ asset('css/dcalendar.picker.css')}}" rel="stylesheet" type="text/css">
   <style>

@media only screen and (max-width : 1000px) {
   .stellarnav > ul > li > a { padding: 20px 23px; }
}
/* styles for this sample only */
</style>
<?php
  function limit_words($string, $word_limit = 10)
{
    $words = explode(" ", $string);
    if (count($words) > $word_limit) {
        return implode(" ", array_splice($words, 0, $word_limit)) . ' ...';
    }
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=260070431060837&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script id="dsq-count-scr" src="//mainamati-news.disqus.com/count.js" async></script>