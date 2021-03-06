@extends('layouts.main')
@section('content')
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        input[type=checkbox] {
            transform: scale(1.5);
        }
    </style>
    <div class=" text-center d-block mt-5">
        <div class="col-lg-12 mt-1 mb-2 ">
            <h2>STEP 4/4 </h2>

        </div>
    </div>

    <div class=" text-center d-block">
        <div class="col-lg-12 my-5 mb-2 ">
            <h4>Now select the shows or events you’d like to attend.</h4>


        </div>
    </div>
    <form action="{{url('submit/event')}}" method="post">
        @csrf


        <div class="container pt-5">
            <div class="row ">

                @foreach($events as $title)
                @foreach($title as $event)

                    <div class="row w-100 m-0 mb-2">



                        <div class="col-lg-12 p-3" style="">


                            <h4 class="w-100 ml-4 m-0">


                               {{$event->title}}
                                </h4>
                            <div class="d-flex " style="align-items: center">
                                <input class="" @if(count($event->eventBook)==count($search)) checked disabled
                                       @endif   type="checkbox" value="{{$event->id}}" name="eventId[]"
                                       id="eventid{{$event->id}}">

                                <h5  class="ml-2 mt-1">{{$event->name}} </h5>


                            </div>
                            <h5 class="w-100 ml-4">{{\Carbon\Carbon::parse($event->starttime)->format('h:i A')}}  </h5>



                        </div>



                        @php
                            $imgs=explode(',',$event->image);
                        @endphp
                        <div class="col-lg-12">
                        <div class="owl-carousel owl-theme">
                        @foreach($imgs as $img)
                            @if($img!='')<div class="item">
                                            <img class=""
                                                 src="{{asset('uploads/appsetting/'.$img.'')}}"
                                                 style="width: 100%;height:     auto;"
                                                 alt="">
                                        </div>




                            @endif


                        @endforeach
                        </div>
                        </div>


                    </div>
                        @endforeach

                    <div style="height: 2px;background-color: #ccc8c8" class="w-100 my-2"></div>

                        @endforeach
                    </div>
            </div>





        <div class="col-lg-12 text-center my-5">
            <button class="btn btn-dark w-100"  type="submit" style="background-color: black">SUBMIT</button>
        </div>
        </div>
        </div>

    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var webpMachine = new webpHero.WebpMachine()
            webpMachine.polyfillDocument()
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.owl-carousel').owlCarousel({

            nav:false,
            items:4,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            dots:false,

        })
    </script>
    <script>
        $(".event").click(function () {
            var event = $(this).attr("event");


            var status = $(this).attr("status");
            if (status == 0) {
                $(".event" + event + "_div").addClass("border_none");
                $(this).text("Cancel");
                $(this).addClass('btn_dan');
                $(this).attr("status", 1);
                $(".img" + event).removeClass("img_none");
                $("#eventid" + event).prop('checked', true);

            } else {
                $(this).text("Join Now");
                $(this).removeClass('btn_dan');
                $(".event" + event + "_div").removeClass("border_none");
                $(this).attr("status", 0);
                $(".img" + event).addClass("img_none");
                $("#eventid" + event).prop('checked', false);


            }


        });
    </script>


@endsection


