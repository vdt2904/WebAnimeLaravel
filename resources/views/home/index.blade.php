@extends('HomeLayout')
@section('content')
<div class="col-lg-8">
    <div class="trending__product">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>Trending Now</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($trending[0]))
                @foreach ($trending[0] as $item => $k)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$k->Anh}}">
                                @if ($k->TongSoTap== null)
                                    <div class="ep">{{$k->MaxTap}} / ??</div>
                                @else
                                    <div class="ep">{{$k->MaxTap}} / {{$k->TongSoTap}}</div>
                                @endif
                                @if ($k->LP == 1)
                                <div class="vip-img" style="position: absolute; top: 0; right: 0; width: 15%; transform: translate(-100%, 0);">
                                    <img src="/home/img/vip-card.png" alt="VIP">
                                </div>                                   
                                @endif
                                <div class="comment"><i class="fa fa-comments"></i> {{$k->TongComments}}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{$k->TongViews}}</div>
                            </div>
                            <div class="product__item__text">                               
                                <ul>  
                                    @foreach ($trending[1] as $index => $j)
                                        @if ($j->MaAnime == $k->MaAnime)
                                            <li>{{$j->TheLoai}}</li>
                                        @endif
                                    @endforeach                                   
                                </ul>
                                <h5><a href="#">{{$k->Anime}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
    <div class="popular__product">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>Popular Shows</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($popular[0]))
                @foreach ($popular[0] as $item => $k)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$k->Anh}}">
                                @if ($k->TongSoTap== null)
                                    <div class="ep">{{$k->MaxTap}} / ??</div>
                                @else
                                    <div class="ep">{{$k->MaxTap}} / {{$k->TongSoTap}}</div>
                                @endif
                                @if ($k->LP == 1)
                                <div class="vip-img" style="position: absolute; top: 0; right: 0; width: 15%; transform: translate(-100%, 0);">
                                    <img src="/home/img/vip-card.png" alt="VIP">
                                </div>                                   
                                @endif
                                <div class="comment"><i class="fa fa-comments"></i> {{$k->TongComments}}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{$k->TongViews}}</div>
                            </div>
                            <div class="product__item__text">                               
                                <ul>  
                                    @foreach ($popular[1] as $index => $j)
                                        @if ($j->MaAnime == $k->MaAnime)
                                            <li>{{$j->TheLoai}}</li>
                                        @endif
                                    @endforeach                                   
                                </ul>
                                <h5><a href="#">{{$k->Anime}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
    <div class="recent__product">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>Recently Added Shows</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($recently[0]))
                @foreach ($recently[0] as $item => $k)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$k->Anh}}">
                                @if ($k->TongSoTap== null)
                                    <div class="ep">{{$k->MaxTap}} / ??</div>
                                @else
                                    <div class="ep">{{$k->MaxTap}} / {{$k->TongSoTap}}</div>
                                @endif
                                @if ($k->LP == 1)
                                <div class="vip-img" style="position: absolute; top: 0; right: 0; width: 15%; transform: translate(-100%, 0);">
                                    <img src="/home/img/vip-card.png" alt="VIP">
                                </div>                                   
                                @endif
                                <div class="comment"><i class="fa fa-comments"></i> {{$k->TongComments}}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{$k->TongViews}}</div>
                            </div>
                            <div class="product__item__text">                               
                                <ul>  
                                    @foreach ($recently[1] as $index => $j)
                                        @if ($j->MaAnime == $k->MaAnime)
                                            <li>{{$j->TheLoai}}</li>
                                        @endif
                                    @endforeach                                   
                                </ul>
                                <h5><a href="#">{{$k->Anime}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
    <div class="live__product">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>Live Action</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($liveaction[0]))
                @foreach ($liveaction[0] as $item => $k)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$k->Anh}}">
                                @if ($k->TongSoTap== null)
                                    <div class="ep">{{$k->MaxTap}} / ??</div>
                                @else
                                    <div class="ep">{{$k->MaxTap}} / {{$k->TongSoTap}}</div>
                                @endif
                                @if ($k->LP == 1)
                                <div class="vip-img" style="position: absolute; top: 0; right: 0; width: 15%; transform: translate(-100%, 0);">
                                    <img src="/home/img/vip-card.png" alt="VIP">
                                </div>                                   
                                @endif
                                <div class="comment"><i class="fa fa-comments"></i> {{$k->TongComments}}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{$k->TongViews}}</div>
                            </div>
                            <div class="product__item__text">                               
                                <ul>  
                                    @foreach ($liveaction[1] as $index => $j)
                                        @if ($j->MaAnime == $k->MaAnime)
                                            <li>{{$j->TheLoai}}</li>
                                        @endif
                                    @endforeach                                   
                                </ul>
                                <h5><a href="#">{{$k->Anime}}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
@endsection