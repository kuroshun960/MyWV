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
        <div class="artistList__row d-flex">
            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel"></div></a>
                <p><a href="#">artist_Name</a></p>
            </div>
                    
            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel"></div></a>
                <p><a href="#">artist_Name</a></p>
            </div>
                    
            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel"></div></a>
                <p><a href="#">artist_Name</a></p>
            </div>
                    
            <div class="artistList__row__items">
                <a href="#"><div class="artistPanel__add"><p>+</p></div></a>
            </div>

        </div>
    </div>
    
    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <button type="submit">保存</button>
    </form>
    
    
    
</div>