@extends('layout.master')

@section('body')
<div class="content__header">
    <h2>Shedletsky</h2>
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
        <div class="row">

        </div>
    </div>

    <div id="clothing" class="tab-pane fade in">
        <h2>ok</h2>
    </div>
</div>
@endsection

@section('javascript')
<script src="/js/pages/user.js"></script>
@endsection