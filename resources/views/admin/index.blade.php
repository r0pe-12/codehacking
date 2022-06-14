@extends('layouts.admin')

    @section('styles')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    @endsection


    @section('content')

        <h1>Admin</h1>
        <hr>
        <canvas id="myChart" height="130"></canvas>
        <hr>

    @endsection

    @section('scripts')
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Posts', 'Categories', 'Media'],
                    datasets: [{
                        label: 'Data',
                        data: [{{ count($posts) }}, {{ count($categories) }}, {{ count($media) }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection
