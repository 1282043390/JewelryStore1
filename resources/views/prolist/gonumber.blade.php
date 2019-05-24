@php $error='' @endphp
@foreach($data as $v)
    <dl>
        <dt><a href="/Prolist/proinfo/{{$v->goods_id}}"><img src="{{config('app.img_url')}}/{{$v->goods_img}}" width="100" height="100" /></a></dt>
        <dd>
            <h3><a href="/Prolist/proinfo/{{$v->goods_id}}">{{$v->goods_name}}</a></h3>
            <div class="prolist-price"><strong>¥{{$v->market_price}}</strong> <span>¥{{$v->goods_price}}</span></div>
            <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->go_number}}</em></div>
        </dd>
        <div class="clearfix"></div>
    </dl>
@endforeach