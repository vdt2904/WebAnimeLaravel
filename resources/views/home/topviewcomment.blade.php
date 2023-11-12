<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
            <div class="product__sidebar__view">
        <div class="section-title">
            <h5>Top Views</h5>
        </div>
        <ul class="filter__controls">
            <li class="active" onclick="topviewday()">Day</li>
            <li onclick="topviewweeks()">Week</li>
            <li onclick="topviewmonths()">Month</li>
            <li onclick="topviewyears()">Years</li>
        </ul>
        <div class="filter__gallery" id="idtopview">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        </div>
    </div>
        <div class="product__sidebar__comment">
            <div class="section-title">
                <h5>New Comment</h5>
            </div>
            <div id="newcmt">

            </div>
        </div>
                              
    </div>
</div>  

<script type="text/javascript">
    window.onload = function () {
        topviewday();
        newcomments();
    };
    function topviewday() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/topday',
            method: 'GET',
            contentType: 'json',
            dataType: 'json',
            error: function (response) {
                console.log("error");
            },
            success: function (response) {
                const len = response.length;
                let table = '';
                for (var i = len - 1; i >= 0; --i) {
                    table = table + '<div class="product__sidebar__view__item set-bg" style="width: 360px; height: 190px; background-image: url(' + response[i].AnhNgang + ');" >';
                    if(response[i].TongSoTap == null){
                        table = table + '<div class="ep">' + response[i].MaxTap +'/??</div>';
                    }else{
                        table = table + '<div class="ep">' + response[i].MaxTap +'/'+response[i].TongSoTap+'</div>';
                    }
                    
                    if (response[i].LP == 1) {
                        table = table + '<div class="vip-img" style="position: absolute; top: 0; right: 0; width: 10%; transform: translate(-100%, 0);"><img src = "/Home/img/vip-card.png" alt = "VIP" ></div>'
                    }
                    table = table + '<h5><a href="/filmdetails/' + response[i].MaAnime + '">' + response[i].Anime + '</a></h5>'
                    table = table + '</div>'
                }
                document.getElementById('idtopview').innerHTML = table;
            },
            fail: function (response) {
                console.log("fail");
            }
        })
    }
    function topviewweeks() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/topweek',
            method: 'GET',
            contentType: 'json',
            dataType: 'json',
            error: function (response) {
                console.log("error");
            },
            success: function (response) {
                const len = response.length;
                let table = '';
                for (var i = len - 1; i >= 0; --i) {
                    table = table + '<div class="product__sidebar__view__item set-bg" style="width: 360px; height: 190px; background-image: url(' + response[i].AnhNgang + ');" >';
                    if(response[i].TongSoTap == null){
                        table = table + '<div class="ep">' + response[i].MaxTap +'/??</div>';
                    }else{
                        table = table + '<div class="ep">' + response[i].MaxTap +'/'+response[i].TongSoTap+'</div>';
                    }
                    
                    if (response[i].LP == 1) {
                        table = table + '<div class="vip-img" style="position: absolute; top: 0; right: 0; width: 10%; transform: translate(-100%, 0);"><img src = "/Home/img/vip-card.png" alt = "VIP" ></div>'
                    }
                    table = table + '<h5><a href="/filmdetails/' + response[i].MaAnime + '">' + response[i].Anime + '</a></h5>'
                    table = table + '</div>'
                }
                document.getElementById('idtopview').innerHTML = table;
            },
            fail: function (response) {
                console.log("fail");
            }
        })
    }
    function topviewmonths() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/topmonth',
            method: 'GET',
            contentType: 'json',
            dataType: 'json',
            error: function (response) {
                console.log("error");
            },
            success: function (response) {
                const len = response.length;
                let table = '';
                for (var i = len - 1; i >= 0; --i) {
                    table = table + '<div class="product__sidebar__view__item set-bg" style="width: 360px; height: 190px; background-image: url(' + response[i].AnhNgang + ');" >';
                    if(response[i].TongSoTap == null){
                        table = table + '<div class="ep">' + response[i].MaxTap +'/??</div>';
                    }else{
                        table = table + '<div class="ep">' + response[i].MaxTap +'/'+response[i].TongSoTap+'</div>';
                    }
                    
                    if (response[i].LP == 1) {
                        table = table + '<div class="vip-img" style="position: absolute; top: 0; right: 0; width: 10%; transform: translate(-100%, 0);"><img src = "/Home/img/vip-card.png" alt = "VIP" ></div>'
                    }
                    table = table + '<h5><a href="/filmdetails/' + response[i].MaAnime + '">' + response[i].Anime + '</a></h5>'
                    table = table + '</div>'
                }
                document.getElementById('idtopview').innerHTML = table;
            },
            fail: function (response) {
                console.log("fail");
            }
        })
    }
    function topviewyears() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/topyear',
            method: 'GET',
            contentType: 'json',
            dataType: 'json',
            error: function (response) {
                console.log("error");
            },
            success: function (response) {
                const len = response.length;
                let table = '';
                for (var i = len - 1; i >= 0; --i) {
                    table = table + '<div class="product__sidebar__view__item set-bg" style="width: 360px; height: 190px; background-image: url(' + response[i].AnhNgang + ');" >';
                    if(response[i].TongSoTap == null){
                        table = table + '<div class="ep">' + response[i].MaxTap +'/??</div>';
                    }else{
                        table = table + '<div class="ep">' + response[i].MaxTap +'/'+response[i].TongSoTap+'</div>';
                    }
                    
                    if (response[i].LP == 1) {
                        table = table + '<div class="vip-img" style="position: absolute; top: 0; right: 0; width: 10%; transform: translate(-100%, 0);"><img src = "/Home/img/vip-card.png" alt = "VIP" ></div>'
                    }
                    table = table + '<h5><a href="/filmdetails/' + response[i].MaAnime + '">' + response[i].Anime + '</a></h5>'
                    table = table + '</div>'
                }
                document.getElementById('idtopview').innerHTML = table;
            },
            fail: function (response) {
                console.log("fail");
            }
        })
    }
    function newcomments(){
        $.ajax({
            url: 'http://127.0.0.1:8000/api/newcomments',
            method: 'GET',
            contentType: 'json',
            dataType: 'json',
            error: function (response) {
                console.log("error");
            },
            success: function (response) {
                const len = response[0].length;
                const ani = response[0];
                const tla = response[1];
                let table = '';
                for (var i = len - 1; i >= 0; --i) {
                    table = table + '<div class="product__sidebar__comment__item">';
                    table = table + '<div class="product__sidebar__comment__item__pic">';
                    table = table + '<img src="' + ani[i].Anh + '" alt="" width="90" height="130">';
                    if (ani[i].LP == 1) {
                        table = table + '<img src="/Home/img/vip-card.png" alt="VIP" class="vip-badge" style="margin-left: 75px;left: 0;position: absolute;/* top: 0; */right: 0;width: 30px;height: auto;z-index: 1;">';
                    }
                    table = table + '</div>';
                    table = table + '<div class="product__sidebar__comment__item__text">';
                    table = table + '<ul>';
                    tla.forEach(element => {                        
                        if(element.MaAnime == ani[i].MaAnime){       
                            table = table + '<li>' + element.TheLoai + '</li>';
                        }
                    });
                    table = table + '<ul>';
                    table = table + '<h5><a href="/filmdetails/' + ani[i].MaAnime + '">'+ ani[i].Anime + '</a></h5>';
                    table = table + '<span><i class="fa fa-eye"></i> ' + ani[i].Views + ' Viewes</span>';
                    table = table + '</div>';
                    table = table + '</div>';
                }
                document.getElementById('newcmt').innerHTML = table;
            },
            fail: function (response) {
                console.log("fail");
            }
        })
    }
</script>