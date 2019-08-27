@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $chart1->options['column_class'] }}">
                    <h3>{!! $chart1->options['chart_title'] !!}</h3>
                    {!! $chart1->renderHtml() !!}
                </div>
                <div class="{{ $chart2->options['column_class'] }}">
                    <h3>{!! $chart2->options['chart_title'] !!}</h3>
                    {!! $chart2->renderHtml() !!}
                </div>
                <div class="{{ $chart3->options['column_class'] }}">
                    <h3>{!! $chart3->options['chart_title'] !!}</h3>
                    {!! $chart3->renderHtml() !!}
                </div>
                <div class="{{ $chart4->options['column_class'] }}">
                    <h3>{!! $chart4->options['chart_title'] !!}</h3>
                    {!! $chart4->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}{!! $chart2->renderJs() !!}{!! $chart3->renderJs() !!}{!! $chart4->renderJs() !!}
@endsection