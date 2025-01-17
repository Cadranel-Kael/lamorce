<div x-data="chart" class="bg-white rounded p-6">
    <canvas id="chart" class="bg-white" height="308"></canvas>
</div>
@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets
@script
<script>
    Alpine.data('chart', () => ({
        chart: null,
        init() {
            this.chart = new Chart(
                document.getElementById('chart'),
                {
                    type: 'line',
                    options: {
                        local: 'en-US',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                color: '#191919',
                                align: 'start',
                                display: true,
                                text: 'Total',
                                font: {
                                    family: 'Rubik',
                                    weight: 'bold',
                                    size: 25,
                                }
                            },
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#191919',
                                    font: {
                                        family: 'Rubik',
                                        size: 20
                                    },
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#191919',
                                    font: {
                                        family: 'Rubik',
                                        size: 20
                                    },
                                    callback: (value) => {
                                        return Intl.NumberFormat('fr-BE', {
                                            style: 'currency',
                                            currency: 'EUR',
                                            minimumFractionDigits: 0,
                                            maximumFractionDigits: 0,
                                        }).format(value);
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    },
                    data: {
                        labels: this.$wire.dataset.labels,
                        datasets: [
                            {
                                data: $wire.dataset.values,
                                borderColor: '#fff23e',
                                lineTension: 0.4,
                                fill: 'start',
                                backgroundColor: (context) => {
                                    const chart = context.chart;
                                    const {ctx, chartArea} = chart;
                                    if (!chartArea) {
                                        return;
                                    }
                                    return this.getGradient(ctx, chartArea);
                                },
                            }
                        ]
                    }
                }
            );
        },
        getGradient(ctx, chartArea) {
            const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
            gradient.addColorStop(0, 'rgba(255, 242, 62, 0.5)');
            gradient.addColorStop(1, 'rgba(255, 242, 62, 0)');
            return gradient;
        }
    }));
</script>
@endscript
