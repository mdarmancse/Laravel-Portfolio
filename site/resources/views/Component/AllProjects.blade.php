<div class="container mt-5">
    <div id="one"  class="owl-carousel mb-4 owl-theme">
        <div class="item m-1 card">
            @foreach($ProjectData as $ProjectData)
                <div class="text-center">
                    <img class="w-100" src="{{$ProjectData->project_img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$ProjectData->project_name}}</h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{$ProjectData->project_des}}</h6>
                    <button href="{{$ProjectData->project_link}}" class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                </div>
            @endforeach
        </div>

    </div>

    </div>

