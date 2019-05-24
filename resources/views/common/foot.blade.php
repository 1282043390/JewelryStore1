<div class="footNav">
    @if(empty($index))
        <dl>
            <a href="/index/index"> <dt><span class="glyphicon glyphicon-home"></span></dt>
                <dd>微店</dd>
            </a>
        </dl>
    @else
        <dl  class="ftnavCur">
            <a href="/index/index"> <dt><span class="glyphicon glyphicon-home"></span></dt>
                <dd>微店</dd>
            </a>
        </dl>
    @endif

    @if(empty($plist))
        <dl>
            <a href="/Prolist/index"> <dt><span class="glyphicon glyphicon-th"></span></dt>
                <dd>所有商品</dd>
            </a>
        </dl>
    @else
        <dl class="ftnavCur" >
            <a href="/Prolist/index"> <dt><span class="glyphicon glyphicon-th"></span></dt>
                <dd>所有商品</dd>
            </a>
        </dl>
    @endif


    @if(empty($Car))
        <dl>
            <a href="/Car/index"> <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
                <dd>购物车</dd>
            </a>
        </dl>
    @else
        <dl  class="ftnavCur">
            <a href="/Car/index"> <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
                <dd>购物车</dd>
            </a>
        </dl>
    @endif

    @if(empty($user))
        <dl  >
            <a href="/User/index"> <dt><span class="glyphicon glyphicon-user"></span></dt>
                <dd>我的</dd>
            </a>
        </dl>
    @else
        <dl class="ftnavCur">
            <a href="/User/index"> <dt><span class="glyphicon glyphicon-user"></span></dt>
                <dd>我的</dd>
            </a>
        </dl>
    @endif


    <div class="clearfix"></div>
</div>