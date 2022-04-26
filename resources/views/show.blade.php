@extends('layouts.app')

@section('content')

<div id="event" class="flex flex-col items-center col-span-2">
        <div id="speaker" class="relative font-['Montserrat'] uppercase font-bold text-[2rem] text-center mb-4">
                <h2 class="text-white bg-transparent">{{$event->speaker}}</h2>
                <h2 class="absolute top-[25%] z-[-1] stroke bg-transparent">{{$event->speaker}}</h2>
        </div>
        <section class="w-[85%] h-[22rem] bg-[url('{{ $event->image }}')] rounded-[105px] p-10 bg-cover bg-no-repeat relative bg-center flex items-center justify-center lg:w-[40%] lg:h-[40em]">
                @if(Auth::check() && Auth::user()->isAdmin())
                <div class="absolute -bottom-7 flex justify-center gap-2 w-full">
                        <form action="{{ route('delete', $event->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-[#FFFDFF] text-[#94DB93] rounded-full p-3 text-2xl leading-none" type="submit"><i class="fa-solid fa-trash"></i></button>
                                
                        </form>
                        <a href="{{ route('edit', $event->id) }}"><i class="fa-solid fa-pencil bg-[#FFFDFF] text-[#94DB93] rounded-full p-3 text-2xl leading-none"></i></a>
                        <a><i class="fa-regular fa-star bg-[#FFFDFF] text-[#94DB93] rounded-full p-3 text-2xl leading-none"></i></a>
                        
                </div>
                @endif
        </section>
        <div id="info" class="text-[#FFFDFF] w-[85%] lg:w-[60%] mt-10 mb-3">
                <h1 class="text-center font-bold font-['Poppins'] uppercase text-[20px] mb-3">{{ $event->name }}</h1>
                <p class="mb-3 font['Montserrat'] text-[14px] text-center">{{ $event->description }}
                <h3 class="font-bold font-['Poppins'] text-[18px] text-center">Place:<span class="font-['Montserrat'] text-[14px] font-medium"> {{$event->location}}</span></h3>
        </div>
        <div id="pills" class="grid grid-cols-3 gap-4 justify-around mb-4">
                <div class="flex flex-col items-center rounded-full bg-[#94DB93] text-white py-5 px-1">
                        <p class="font-['Poppins'] ">Event Date:</p>
                        <p class="font-['Poppins'] font-black">{{ date('d/m/Y', strtotime($event->date_and_time)) }}</p>
                </div>
                <div class="flex flex-col items-center rounded-full bg-[#94DB93] text-white py-5 px-1">
                        <p class="font-['Poppins'] ">Hour:</p>
                        <p class="font-['Poppins'] font-black">{{ date('H:m', strtotime($event->date_and_time)) }}</p>
                </div>
                <div class="flex flex-col items-center rounded-full bg-[#94DB93] text-white py-5 px-1">
                        <p class="font-['Poppins'] ">Capacity:</p>
                        <p class="font-['Poppins'] font-black">{{$users}}/{{$event->max_participants}}</p>
                </div>
        </div>
        @if(!Auth::user())
        <button onclick="window.location = `{{ route('login') }}`" class="bg-[#69C4A0] font-black font-['Montserrat'] text-white uppercase rounded-full py-2 px-10">
                Login
        </button>
        @else
        <!--1-->@if ($event->user->contains(Auth::user()->id))
                <button onclick="window.location = `{{ route('unsubscribe', $event->id) }}`" class="bg-[#69C4A0] font-black font-['Montserrat'] text-white uppercase rounded-full py-2 px-10">
                        Cancel Subscription
                </button>
                @else
                <button id="join-btn" onclick="window.location = `{{ route('subscribe', $event->id) }}`" class="bg-[#69C4A0] font-black font-['Montserrat'] text-white uppercase rounded-full py-2 px-10">
                        Join the Event
                </button>

                <!--modal_user_auth_joinedSuccesfully_1.0v-->

        <div id="overlay" class=" hidden font-[Montserrat] text-[#FFFDFF] text-[20px] flex  absolute inset-0 bg-opacity-50 bg-[#000A12] z-10 align-middle justify-center items-center">
                <div class="space-y-[120px] h-[204px] w-[268px] bg-[#94DB93] flex flex-col align-middle items-center rounded-[68px]">
                
                <div class="flex flex-col text-center ">
                        <p class=" flex flex-col text-[16px] font-bold">JOINED THE EVENT SUCCESFULLY!</p>
                </div>      
        </div>

        <!-- POPUPS -->
        <script>
        window.addEventListener
        ('DOMContentLoaded', () =>{
                const overlay = document.querySelector
                ('#overlay')
                const joinBtn = document.querySelector
                ('#join-btn')

                joinBtn.addEventListener ('click', () =>{
                overlay.classList.remove('hidden')
                // joinBtn.querySelectorAll.remove(`{{ route('subscribe', $event->id) }}`)
                })
                overlay.addEventListener ('click', () =>{
                overlay.classList.add('hidden')
                // joinBtn.querySelectorAll.add(`{{ route('subscribe', $event->id) }}`)
                })
        })
        </script>
                @endif <!--1-->
        @endif
        <a href="{{URL::previous()}}" class="self-start mt-5">
                <i class="fa-solid fa-arrow-left text-white text-3xl pl-4"></i>
        </a>
</div>

@endsection