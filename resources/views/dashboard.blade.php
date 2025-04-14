<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Visitor Statistics</h3>
                    <div class="mt-4 d-flex justify-content-around">
                        <div class="stat-card animate__animated animate__fadeIn">
                            <h4><a href="{{ route('visitors.index') }}">Total Visitors</a></h4>
                            <p class="stat-number"><strong><a href="{{ route('visitors.index') }}">{{ $totalVisitors }}</a></strong></p>
                        </div>
                        <div class="stat-card animate__animated animate__fadeIn">
                            <h4><a href="{{ route('visitors.today') }}">Total Visitors Today</a></h4>
                            <p class="stat-number"><strong><a href="{{ route('visitors.today') }}">{{ $totalVisitorsToday }}</a></strong></p>
                        </div>
                    </div>
                    <div id="visitorChart" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .stat-card {
            background-color: #f8fafc; 
            border: 1px solid #e5e7eb; 
            border-radius: 0.5rem; 
            padding: 1.5rem; 
            text-align: center; 
            width: 45%; 
            transition: transform 0.3s; 
        }

        .stat-card:hover {
            transform: scale(1.05); 
        }

        .stat-number {
            font-size: 2rem; 
            color: #4a5568; 
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('visitorChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Visitor Statistics'
                },
                xAxis: {
                    categories: ['Total Visitors', 'Total Visitors Today']
                },
                yAxis: {
                    min: 0,
                    max: 50, 
                    title: {
                        text: 'Number of Visitors'
                    }
                },
                series: [{
                    name: 'Visitors',
                    data: {!! json_encode([$totalVisitors, $totalVisitorsToday]) !!}
                }]
            });
        });
    </script>
</x-app-layout>