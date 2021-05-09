<x-app-layout>

<x-slot name="header">

<style type="text/css">


#edit-event{
   margin-left: 350px;
}




</style>


    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    View Event<b> </b>
    </h2>
</x-slot>
<div id="edit-event" class="py-12">
   <div class = "row">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header">View Event</div>
              <div class="card-body">
                    @csrf
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem; margin-left: 15px; margin-top: 15px;">
                      <div class="card-header">Event Name</div>
                      <div class="card-body">
                        <h5 class="card-title">Event Name</h5>
                        <p class="card-text" value="{{$events->event_name}}">Here is the Event Name</p>
                        @error('event_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                        <div class="card-body">
                           @csrf
                           <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                           <div class="card-header">Event Location</div>
                           <div class="card-body">
                             <h5 class="card-title">Event Location</h5>
                             <p class="card-text">Here is the Event Location</p>
                           @error('event_location')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        </div>
                        <div class="card-body">
                           @csrf
                           <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                              <div class="card-header">Event Date</div>
                              <div class="card-body">
                                <h5 class="card-title">Event Date</h5>
                                <p class="card-text" value="{{$events->event_date}}">Here is the Event Date</p>
                           @error('event_date')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        </div>
                        <div class="card-body">
                           @csrf
                           <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                              <div class="card-header">Event Description</div>
                              <div class="card-body">
                                <h5 class="card-title">Event Description</h5>
                                <p class="card-text" value="{{$events->event_description}}">Here is the Event Description</p>
                           @error('event_description')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        </div>
                        <div class="card-body">
                           @csrf
                           <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                              <div class="card-header">Covid Limit</div>
                              <div class="card-body">
                                <h5 class="card-title">Covid Limit</h5>
                                <p class="card-text" value="{{$events->covid_limit}}">Here is the Covid Limit</p>
                           @error('covid_limit')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>

