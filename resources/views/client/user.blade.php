@extends('layout.master')

@section('body')
<div class="content__header">
    <h2>{{ $user }}</h2>
</div>
<div id="">
    <div class="action-header action-header--dark">
        <ul class="action-header__menu action-header__menu--padding">
            <li class="active"><a data-toggle="tab" href="#inventory">Inventory</a></li>
            <li><a data-toggle="tab" href="#clothing">Clothing</a></li>
            <li><a href="">Places</a></li>
        </ul>
    </div>
</div>

<div class="wrapper" style="width:100%;text-align:center" >
    <div class="preloader preloader--xl preloader--light text-center p-b-25 p-t-25">
        <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20"></circle>
        </svg>
    </div>
</div>

<div class="tab-content">
    <div id="inventory" class="tab-pane fade in">


        <div class="col-sm-4">        
            <div class="card widget-analytic">
                <div class="card__header">
                    <h2>Total RAP <small>Total RAP of Limiteds</small></h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>%rap% R$</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">        
            <div class="card widget-analytic">
                <div class="card__header">
                    <h2>Total Value <small>Total RBX.Limited Value</small></h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>NaN</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">        
            <div class="card widget-analytic">
                <div class="card__header">
                    <h2>Total Count <small>Total Item Count</small></h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>%count%</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="clothing" class="tab-pane fade in">
        <h2>To be added.</h2>
    </div>
</div>
@endsection

@section('javascript')
<script src="/js/pages/user.js"></script>
@endsection