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
   <div class="py-12">
      <div class="container">
         <div class = "row">
            <div class="col-md-10">
               <div class="card" style="width: 1200px;">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{ session('success' ) }}</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span> 
                     </button>
                  </div>
                  @endif
                  <div id="all-event" class="card-header" style="text-align: center; font-size: 24px; font-weight: bold;">Event List</div>
                  <table class="table">
                     <thead>
                        <tr>
                     <div class="all-events-headings">
                           <th scope="col" style="text-align: center">Event Name</th>
                           <th scope="col" style="text-align: center">Event Postcode</th>
                           <th scope="col" style="text-align: center">Event Date</th>
                           <th scope="col" style="text-align: center">Covid Limit</th>
                           <th scope="col" style="text-align: center">Actions</th>
                     </div>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- @php($i = 1) -->
                        @foreach($events as $event)
                        <tr>
                           <td style="text-align:center;">{{$event->event_name}}</td>
                           <td style="text-align:center;">{{$event->event_location}}</td>
                           <td style="text-align:center;">{{$event->event_date}}</td>
                           <td style="text-align:center;">{{$event->covid_limit}}</td>
                           <td>
                              <div class="btn-group">
                                 <button type="button" class="btn btn-danger" style="left: 30%;">Event Actions</button>
                                 <button type="button" class="btn btn-danger dropdown-toggle" style="left: 30%;" data-toggle="dropdown">
                                 <span class="caret"></span>
                                 <span class="sr-only">Toggle Dropdown</span>
                                 </button>
                                 <ul class="dropdown-menu" role="menu">
                                    <li class="event-actions"><a href="{{url('event/view/'.$event->id) }}">View</a></li>
                                    <li class="event-actions"><a href="{{url('softdelete/event/'.$event->id) }}">Cancel</a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        @endforeach 
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
            </div>
         </div>
      </div>
   </div>
</div>


</body>
      

</x-app-layout>


