<x-app-layout>


   <x-slot name="header">

   
   <head>


   <meta name="viewport" content="width=device-width, initial-scale=1.0">


  
    

   <link rel="stylesheet" type="text/css" href="{{ asset('css/index.blade.css') }}" />


   </head>



   <a href="/"><img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" class="center" alt="Circle-Plus-logo" /></a>
     
      
   </x-slot>



   <body>
   
      <div class="all-events-title">
      <h2 class="events-all-title" style="margin-right: 60px;">
         All Events<b> </b>
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
                           <th scope="col" style="text-align: center">ID</th>
                           <th scope="col" style="text-align: center">Event Name</th>
                           <th scope="col" style="text-align: center">Event Organiser</th>
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
                           <th scope="row">{{$events->firstItem()+$loop->index }}</th>
                           <td style="text-align:center;">{{$event->event_name}}</td>
                           <td style="text-align:center;">{{$event->user->name}}</td>
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
                                    <li class="event-actions"><a href="#">Register</a></li>
                                    <li class="event-actions"><a href="{{url('event/edit/'.$event->id) }}">Edit</a></li>
                                    <li class="event-actions"><a href="{{url('softdelete/event/'.$event->id) }}">Cancel</a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               {{ $events->links() }}
            </div>
         </div>
         <div class="col-md-3">
            <div id="create-event" class="card" style="margin-left: 80px; width: 300px;">
               <div class="card-header" style="">Create a New Event</div>
               <div class="card-body">
                  <form action="{{route('store.event')}}"method="POST">
                     @csrf
                     <div class="mb-2">
                        <label for="exampleInputEmail1">Event Name</label>
                        <input type="text" name="event_name" class="form-control" 
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('event_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-2">
                        <label for="exampleInputEmail1">Event Postcode</label>
                        <input type="text" name="event_location" class="form-control" 
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('event_location')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-2">
                        <label for="exampleInputEmail1">Event Date</label>
                        <input type="date" name="event_date" class="form-control" 
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('event_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-2">
                        <label for="exampleInputEmail1">Event Description</label>
                        <input type="text" name="event_description" class="form-control" 
                           id="descriptioninput" aria-describedby="emailHelp">
                        @error('event_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                     <div class="mb-2">
                        <label for="exampleInputEmail1">Covid Limit</label>
                        <input type="number" min="0" name="covid_limit" class="form-control" 
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('covid_limit')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                     <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-left: 70px;">Confirm Event</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--Trash Part -->
   <div id="archived-table" class= "container">
      <div class = "row">
         <div class="col-md-10">
            <div class="card" style="width: 1220px;">
               <div id="event-archive-list" class="card-header" style="text-align:center; font-size: 24px; font-weight: bold; margin-top: 50px; ">Event Archive List</div>
               <table class="table">
                  <thead>
                     <tr>
                  <div class="all-events-headings">
                        <th scope="col" style="text-align:center;">ID</th>
                        <th scope="col" style="text-align:center;">Event Name</th>
                        <th scope="col" style="text-align:center;">Event Organiser</th>
                        <th scope="col" style="text-align:center;">Event Postcode</th>
                        <th scope="col" style="text-align:center;">Event Date</th>
                        <th scope="col" style="text-align:center;">Covid Limit</th>
                        <th scope="col" style="text-align:center; margin-left: -20px;">Actions</th>
                  </div>
                     </tr>
                  </thead>
                  <tbody>
                     <!-- @php( $i= 1) -->
                     @foreach($trashEvent as $event)
                     <tr>
                        <th scope="row">{{$events->firstItem()+$loop->index}}</th>
                        <td style="text-align:center;">{{$event->event_name}}</td>
                        <td style="text-align:center;">{{$event->user->name}}</td>
                        <td style="text-align:center;">{{$event->event_location}}</td>
                        <td style="text-align:center;">{{$event->event_date}}</td>
                        <td style="text-align:center;">{{$event->covid_limit}}</td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-danger" style="left: 20px;">Event Actions</button>
                              <button type="button" class="btn btn-danger dropdown-toggle" style="left: 20px;" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toogle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                 <li class="event-actions"><a href="{{ url('event/restore/'.$event->id) }}">Restore</a></li>
                                 <li class="event-actions"><a href="{{url('pdelete/event/'.$event->id) }}">Delete</a></li>
                              </ul>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <style="margin-bottom: 112px;">{{$trashEvent->links()}}</style>
            </div>
         </div>
         <div class="col-md-4">
         </div>
      </div>
   </div>
   <!-- End Trash -->
</div>


</body>
</x-app-layout>