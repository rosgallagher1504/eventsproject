<x-app-layout>
   <x-slot name="header">
   <img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" alt="Image"/>
     
      <style type="text/css">

         .all-events-title{
            margin-top: 50px;
            margin-bottom: -2px;
            height: 50px;
         }
         .events-all-title{
            font-size: 42px;
            margin-left: 90px;
            margin: 1em 0.5 0;
            font-weight: normal;
            position: relative;
            text-shadow: 0 -1px rgba(0,0,0,0.6);
            line-height: 70px;
            width: 1500px;
            background: #355681;
            background: rgba(53, 86, 129, 0.8);
            border: 1px solid #fff;
            color: #ffffff;
            border-radius: 0 10px 0 10px;
            box-shadow: inset 0 0 5px rgba(53, 86, 129, 0.5);
            text-align: center;
            border-color: 	#B22222;
            border-width: 8px;
         }
         .py-12{
            margin-top: 30px;
         }
         .card{
            border-color: #000000;
            border-width: 4px;
         }
         .table-responsive{
         height: 458px;
         }
         .all-events-headings{
            margin-left: 300px;
         }
         .event-actions{
         background-color: #ffffff;
         color: #000000;
         padding: 10px 5px;
         top: auto;
         left: 0;
         right: 0;
         height: 45px;
         width: 100px;
         margin-left: 50px;
         position: relative;
         }
         .event-actions a {
         color: #000000;
         text-decoration: none;
         }
         .event-actions li {
         position: relative;
         }
         #archived-table{
         margin-top: -5px;
         }
         .col-md-3{
         margin-left: 1180px;
         margin-bottom: -500px;
         width: 230px;
         position: relative;
         top: -360px;
         }
      
         /* Optional: Makes the sample page fill the window. */
         html {
         background-color: #f5f5f5;
         height: 100%;
         margin: 0;
         padding: 0;
         }   
         #description {
         font-family: Roboto;
         font-size: 15px;
         font-weight: 300;
         }
         #infowindow-content .title {
         font-weight: bold;
         }
         #infowindow-content {
         display: none;
         }
         #title {
         color: #fff;
         background-color: #4d90fe;
         font-size: 25px;
         font-weight: 500;
         padding: 6px 12px;
         }
      </style>
   </x-slot>
      <div class="all-events-title">
      <h2 class="events-all-title">
         All Events<b> </b>
      </h2>
      </div>
   <div class="py-12">
      <div class="container">
         <div class = "row">
            <div class="col-md-10">
               <div class="card">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{ session('success' ) }}</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span> 
                     </button>
                  </div>
                  @endif
                  <div class="card-header">All Event</div>
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
            <div class="card">
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
                           id="exampleInputEmail1" aria-describedby="emailHelp">
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
                     <button type="submit" class="btn btn-primary">Confirm Event</button>
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
            <div class="card">
               <div class="card-header">Archived List</div>
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
                        <th scope="col" style="text-align:center;">Actions</th>
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
                              <button type="button" class="btn btn-danger" style="left: 30%;">Event Actions</button>
                              <button type="button" class="btn btn-danger dropdown-toggle" style="left: 30%;" data-toggle="dropdown">
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
               {{$trashEvent->links()}}
            </div>
         </div>
         <div class="col-md-4">
         </div>
      </div>
   </div>
   <!-- End Trash -->
 
  
   
   </div>
</x-app-layout>