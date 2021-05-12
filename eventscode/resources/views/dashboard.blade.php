<x-app-layout>
    <x-slot name="header">
    <img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" alt="Image"/>

    <style>


    .background-circle-group{
        background: url("img/family-group-meet-up.png");
        width: 60vw;
        height: 70vh;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        position: relative;
        margin-top: 60px;
        margin-left: -40px;
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


    </style>


    </x-slot>
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <p id="circle-plus-heading" class="circle-plus-heading" style="margin-top: 50px; margin-left: 80px; text-align:center;">A simple way to connect with those that are important in your life....</p>
                <p id="connect-family-friends" style="margin-top: 50px; margin-left: 80px; text-align:center;">Connect with your Family and Friends</p>
                <p id="interesting-photos-stories" style="margin-top: 50px; margin-left: 80px; text-align:center;">Interesting Photos and Stories to Share</p>
                <p id="remember-occasions" style="margin-top: 50px; margin-left: 80px; text-align:center;">Remember Special Occasions</p>
                <p id="calculate-budgets" style="margin-top: 50px; margin-left: 80px; text-align:center;">Calculate Event Budgets</p>
                <p id="locate-events" style="margin-top: 50px; margin-left: 80px; text-align:center;">Locate where Events are Happening</p>
                <p id="event-planning" style="margin-top: 50px; margin-left: 80px; text-align:center;">Event Planning made Easy</p>


                <div class="background-circle-group"></div>
                
                
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="margin-left: 90px;">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('all.event')}}" class="underline text-gray-900 dark:text-white" style="margin-left: 155px;">View Events</a></div>
                            </div>

                            <div class="ml-12">
                                <p style="margin-top: 15px; text-align:center;">Click here to organise your upcoming events....</p>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{URL::to('/myevents')}}" class="underline text-gray-900 dark:text-white" style="margin-left: 155px;">My Events</a></div>
                            </div>

                            <div class="ml-12">
                                <p style="margin-top: 15px; text-align:center;">Click here to access a list of your events......</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>

