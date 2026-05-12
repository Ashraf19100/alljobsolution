<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Statistics</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h4 class="mb-0">Application Percentage by Position</h4>
        </div>

        <div class="card-body">
            <canvas id="applicationChart" height="100"></canvas>
        </div>
    </div>

</div>

<script>
    // Example Data
    const positions = [
        'Data Entry Operator',
        'Software Engineer',
        'Accountant',
        'Graphic Designer',
        'HR Officer'
    ];

    const percentages = [35, 25, 15, 10, 15];

    // Chart
    const ctx = document.getElementById('applicationChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: positions,
            datasets: [{
                label: 'Application Percentage (%)',
                data: percentages,
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#ffc107',
                    '#dc3545',
                    '#6f42c1'
                ],
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw + '%';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Percentage (%)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Positions'
                    }
                }
            }
        }
    });
</script>

</body>
</html>