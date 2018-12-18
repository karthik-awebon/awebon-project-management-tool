<div class="panel panel-default">
    <div class="panel-heading">My Project Charts</div>
    <div class="panel-body">
        {!! $chart->html() !!}                                
    </div>
</div>

{!! Charts::scripts() !!}
{!! $chart->script() !!}