<div class="container">
    
    <div class="userdetails_container_inner">
        <div class="d-flex justify-content-around">
            <div><a href="#">follow :</a></div>
            <div class="">
                <h1>
                <img class="mr-2 rounded" src="{{ Gravatar::get(Auth::user()->email, ['size' => 40]) }}" alt="">
                {{ Auth::user()->name }}
                </h1>
            </div>
            <div><a href="#">follower :</a></div>
        </div>
    </div>
    
    
    <div class="artistList">
        <div class="artistList__row d-flex flex-wrap col-sm-12">
            
            @foreach ($user_images as $user_image)

            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel">
                    <img src="{{ $user_image['path'] }}" width="100%"></div>
                </a>
                <p><a href="#">artist_Name</a></p>
            </div>

            @endforeach
            
                    
            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel"></div></a>
                <p><a href="#">artist_Name</a></p>
            </div>
                    
            <div class="artistList__row__items">
                {{--<a href="#"><div class="artistPanel__add"><p>+</p></div></a>--}}
                {!! link_to_route('image.get', '+', [], ['class' => 'artistPanel__add']) !!}
            </div>



        </div>
    </div>
    

</div>