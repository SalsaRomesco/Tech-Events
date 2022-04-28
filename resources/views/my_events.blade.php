@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center text-white m-0 .p-0 font-bold relative h-20 col-span-2 mt-5">
        <h2 id="top" class="m-0 absolute z-10 text-4xl md:text-7xl">MY EVENTS</h2>
        <h2 id="bottom" class="absolute z-0 mt-3 text-4xl md:text-7xl">MY EVENTS</h2>
    </div>
    <section class="grid grid-cols-2 col-span-2 gap-20 flex justify-items-center p-9 md:grid-cols-3 lg:grid-cols-4">
    @foreach ($myEventUser as $event) 
    <div id="backgroundImage" class="font-[Montserrat] rounded-[38px] bg-cover bg-center bg-[url('{{$event->image}}')]
    flex flex-col justify-between items-center text-[#FFFDFF] h-44 w-40 text-center md:h-64 md:w-60">
        <div class="bg-black/40 rounded-[38px] md:h-64 w-60  h-44 w-40 flex flex-col justify-between items-center " >
            <div class="relative -bottom-[14px]">
                <p class='text-sm font-semibold relative -bottom-[5px]'>{{ date('d/m/Y', strtotime($event->date_and_time)) }}</p>
                <p class="text-xl font-semibold">{{$event->speaker}}</p>
            </div>
            <div class="relative flex justify-center items-center bg-[#69C4A0] rounded-3xl relative -bottom-[17px] h-[30px] w-[144px] ">
                <a class="text-sm font-semibold align-middle leading-[12px]" href="{{route('show', ['id' => $event->id])}}">{{$event->name}}</a>
            </div>
                <a href="{{route('unsubscribe', ['id'=>$event->id])}}">
                <button type="submit" class="h-9 w-32 rounded-3xl bg-white text-[#94DB93] font-['Montserrat'] font-bold" onclick="return confirm('Do you want to unsubscribe from {{$event->name}}?')">Unsubscribe</button>
                </a>
        </div>
    </div>
    @endforeach
    </section>
@endsection