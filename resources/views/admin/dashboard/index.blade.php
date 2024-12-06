@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid mt-4">
    <!-- Dashboard Cards Section -->
    <div class="row g-4">
        <!-- Total Users Card -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card stats-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Users</h5>
                    <p class="card-text text-success" id="total-users">1,500</p> <!-- Dummy Data -->
                </div>
            </div>
        </div>

        <!-- Total Sales Card -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card stats-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Sales</h5>
                    <p class="card-text text-success" id="total-sales">$25,000</p> <!-- Dummy Data -->
                </div>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card stats-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Orders</h5>
                    <p class="card-text text-success" id="total-orders">350</p> <!-- Dummy Data -->
                </div>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card stats-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Products</h5>
                    <p class="card-text text-success" id="total-products">120</p> <!-- Dummy Data -->
                </div>
            </div>
        </div>
    </div>

    <!-- Line Chart for Orders Per Day -->
    <div class="row chart-container mt-4">
        <div class="col-12">
            <div class="card chart-card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Orders Per Day</h5>
                    <canvas id="ordersPerDayChart"></canvas> <!-- Ensure the canvas is large enough -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Dummy Data for Chart (Replace with dynamic data if needed)
    const labels = ["2024-12-01", "2024-12-02", "2024-12-03", "2024-12-04", "2024-12-05", "2024-12-06"];
    const data = [20, 30, 50, 45, 70, 80]; // Dummy order counts for each day

    // Create the Line Chart
    const ctx = document.getElementById('ordersPerDayChart').getContext('2d');
    const ordersPerDayChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Orders Count per Day',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 3,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 20
                    }
                }
            }
        }
    }); // End of Chart instantiation
</script>

@endsection
