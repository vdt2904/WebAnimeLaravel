<!-- Header Section Begin -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@php
    use Illuminate\Support\Facades\DB;
@endphp
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/">
                        <img src="/Home/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="#">Thể loại <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @php
                                        $a = DB::select('SELECT theloai,MaTL from tb_theloai');
                                    @endphp
                                    @foreach ($a as $item => $k)
                                    <li><a href="{{ route('category', ['id' => $k->MaTL]) }}">{{$k->theloai}}</a></li>    
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ url('/blog') }}">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    @if (session('InforUser.Email'))
                    <a href="{{ url('/User') }}" class="profile-link"><span class="icon_profile"></span><span></span></a>
                    @else
                    <a href="{{ url('/login') }}" class="profile-link"><span class="icon_profile"></span><span></span></a>
                    @endif
                    <input type="text" id="search-input" name="search" placeholder="Search here.....">
                  
                </div>
                <div id="search_list"></div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

  <style>
  .item-dropdown {
   
    font-family: "Mulish", sans-serif;
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    right: 0; /* Dịch chuyển menu sang phải */
  }

  .profile-link:hover + .item-dropdown {
    display: block;
  }
  .d-flex.align-items-center {
        display: flex;
        align-items: center;
    }
    .icon_search {
    margin-left: 10px; 
    }
    #search_list {
        display: none;
    max-height: 300px; /* Limit the height of the result container */
    width: 300px;
    overflow-y: auto; /* Add a scrollbar if the content overflows the container */
    border: 1px solid #ccc; /* Add a border around the container */
    border-radius: 5px; /* Round the corners of the container */
    padding: 10px; /* Add some padding inside the container */
    background-color: #212533; /* Set the background color */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle box shadow */
    }
    .movie-list {
        display: flex;
        flex-direction: column; /* Display items vertically */
        align-items: flex-start; /* Align items to the left */
        padding: 0;
    }

    .movie-item {
        display: flex;
        align-items: flex-start; /* Align items to the left */
        margin-bottom: 20px;
    }

    .movie-image {
        max-width: 100px; /* Adjust image width as needed */
        height: auto;
    }

    .movie-details {
        margin-left: 10px; /* Add some spacing between the image and title */
    }

    .movie-title {
        font-size: 16px;
        margin: 0;
    }

    #search-input {
    display: none;
}

/* Add this style to show the search input when its parent has a certain class (e.g., .search-active) */
#search-input.search-active {
    display: block;
}
#search-input {
    display: none;
    border: none;
    border-bottom: 2px solid #3498db;
    font-size: 16px;
    padding: 8px;
    width: 200px;
    transition: border-bottom 0.3s, width 0.3s;
    color: #fff;
    background-color: transparent;
}

#search-input:focus {
    outline: none;
    border-bottom: 2px solid #fff;
    width: 250px;
}

.search-switch:focus ~ #search-input {
    display: block;
}

body:not(:focus-within) #search-input {
    display: none;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function(){
        $('.search-switch').on('click', function() {
            $('#search-input').toggleClass('search-active').focus();
        });
    });

    $(document).ready(function(){
        $('#search-input').on('keyup',function(){
            var query = $(this).val();
            $.ajax({
                url:"{{route('search.index')}}",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    if (query.trim() === '') {
                    $('#search_list').hide(); 
                } else {
                    $('#search_list').html(data).show(); 
                }
                }
            });
        });

        $('#search-input').on('input', function() {
        var query = $(this).val().trim(); 
        if (query === '') {
            $('#search_list').html(null); 
        }
    });
    });
</script>
