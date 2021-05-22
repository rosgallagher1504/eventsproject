<x-app-layout>


   <x-slot name="header">


   <head>


      <meta name="viewport" content="width=device-width, initial-scale=1.0">


      <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />


      <style type="text/css">
         
         
         
         @media only screen and (max-width: 900px) {
            body{
               background-color: olive;
            }
         }


         @media screen and (max-width: 600px) {
            body{
               background-color: olive;
            }
         }

      </style>

      </head>

      <a href="/"><img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" class="center" alt="Circle-Plus-logo" /></a>
   </x-slot>

   <body>
   <div class="view-event-title">
      <h2 class="event-view-title">
         My Events<b> </b>
      </h2>
   </div>
   <div id="view-event" class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-10">
             
            </div>
         </div>
      </div>
   </body>

      

</x-app-layout>


