<x-app-layout>
   <x-slot name="header">
      <a href="/"><img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" class="center" alt="Circle-Plus-logo" /></a>
      <head>


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <link rel="stylesheet" href="css/bootstrap-theme.min.css">


      </head> 


      <style>
         #myCarousel{
             margin-top: 60px;
             width: 680px
         }
         .carousel-indicators{
         color: green;
         }
         .background-circle-group{
         background: url("img/family-group-meet-up.png");
         width: 60vw;
         height: 70vh;
         background-size: 100% 100%;
         background-repeat: no-repeat;
         position: relative;
         margin-top: 60px;
         margin-left: 65px;
         }
         .circle-plus-heading{
         margin: 1em 0 0.5em 0;
         font-weight: 600;
         line-height: 40px;
         color: #ff1a1a;
         text-transform: uppercase;
         border-bottom: 4px solid #ff1a1a;
         } 
         #circle-plus-heading{
         text-transform: uppercase;
         }
         p::first-letter{
         font-size: 200%;
         color: #ff1a1a;
         }
         #connect-family-friends{
         }
         #interest-photos-stories{
         }
         #remember-occasions{
         }
         #calculate-budgets{
         }
         #locate-events{
         }
         #event-planning{
         }
         p{
         margin: 1em 0 0.5em 0;
         font-weight: 600;
         text-shadow: 0 -1px 1px rgba(0,0,0,0.4);
         line-height: 40px;
         color: #355681;
         border-bottom: 1px solid rgba(53, 86, 129, 0.3);
         }
         @media only screen and (max-width: 2000px) {
         body {
         background-color: lightblue;
         }
         }
      </style>
   </x-slot>

   <body>

   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
   </div>
   <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <h4 id="circle-plus-heading" class="circle-plus-heading" style="margin-top: 50px; margin-left: 80px; text-align:center;">A simple way to connect with those that are important in your life....</h4>
    

      <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/family-group-meet-up.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/friends-road-trip.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="images/happy-young-couple-enjoying-sea_.png" alt="New york" style="width:100%;">
      </div>

      <div class="item">
          <img src="images/maldives-island.png">
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<script>


$('#my-slider').carousel();


</script>



         <p id="connect-family-friends" style="margin-top: 50px; margin-right: 420px; text-align:center; font-size: 20px;">Connect with your Family and Friends</p>
         <p id="interesting-photos-stories" style="margin-top: 50px; margin-right: 395px; text-align:center; font-size: 20px;">Interesting Photos and Stories to Share</p>
         <p id="remember-occasions" style="margin-top: 50px; margin-right: 485px; text-align:center; font-size: 20px;">Remember Special Occasions</p>
         <p id="calculate-budgets" style="margin-top: 50px; text-align:center; margin-right: 528px; font-size: 20px;">Calculate Event Budgets</p>
         <p id="locate-events" style="margin-top: 50px; margin-right: 414px; text-align:center; font-size: 20px;">Locate where Events are Happening</p>
         <p id="event-planning" style="margin-top: 50px; margin-right: 500px; text-align:center; font-size: 20px;">Event Planning made Easy</p>
         <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="margin-right: 90px; width: 800px;">
            <div class="grid grid-cols-1 md:grid-cols-2">
               <div class="p-6">
                  <div class="flex items-center">
                     <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('all.event')}}" class="underline text-gray-900 dark:text-white" style="margin-left: 120px; font-size: 20px; margin-top: 35px;">View Events</a></div>
                  </div>
                  <div class="ml-12">
                     <h6 style="margin-top: 15px; text-align:center; font-size: 15px;">Click here to organise your upcoming events</h6>
                  </div>
               </div>
               <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                  <div class="flex items-center">
                     <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{URL::to('/myevents')}}" class="underline text-gray-900 dark:text-white" style="margin-left: 120px; font-size: 20px;">My Events</a></div>
                  </div>
                  <div class="ml-12">
                     <h6 style="margin-top: 15px; text-align:center; font-size: 15px;">Click here to access a list of your events</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   

   </body>

</x-app-layout>

