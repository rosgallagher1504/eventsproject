<x-app-layout>
   <x-slot name="header">
      <style type="text/css">
         #edit-event{
            margin-left: 400px;
            margin-top: 40px;
         }
         .edit-event-title{
            background-color: #f5f5f5;
            height: 100px;
            width: 800px;
            margin-top: 50px;
            margin-bottom: -70px;
         }
         .event-edit-title{
            font-size: 42px;
            left: 70px;
            margin: 1em 0.5em 0;
            font-weight: normal;
            position: relative;
            text-shadow: 0 -1px rgba(0,0,0,0.6);
            line-height: 60px;
            width: 1500px;
            background: #355681;
            background: rgba(53, 86, 129, 0.8);
            border: 1px solid #fff;
            padding: 5px 15px;
            color: #ffffff;
            border-radius: 0 10px 0 10px;
            box-shadow: inset 0 0 5px rgba(53, 86, 129, 0.5);
            text-align: center;
            border-color: #ffffe0;
            border-width: 12px;
         }
         .card{
            border-color: #000000;
            border-width: 4px;
         }
      </style>
      <img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" class="center" alt="Circle-Plus-logo" />
   </x-slot>
      <div class="edit-event-title">
      <h2 class="event-edit-title">
         Edit Event<b> </b>
      </h2>
      </div>
   <div id="edit-event" class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">Update Event</div>
                  <div class="card-body">
                     <form action="{{url('event/update/'.$events->id)}}"method="POST">
                        @csrf
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Name</label>
                           <input type="text" name="event_name" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_name}}">
                           @error('event_name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Postcode</label>
                           <input type="text" name="event_location" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_location}}">
                           @error('event_location')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Date</label>
                           <input type="date" name="event_date" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_date}}">
                           @error('event_date')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Description</label>
                           <input type="text" name="event_description" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_description}}">
                           @error('event_description')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Covid Limit</label>
                           <input type="number" min="0" name="covid_limit" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->covid_limit}}">
                           @error('covid_limit')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                        <a href="{{url('event/cancelupdate') }}" class="btn btn-danger">Cancel Update</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>