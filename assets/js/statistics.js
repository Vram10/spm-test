
import Chart from 'chart.js/auto';

async function loadStatistics() {
    const response = await fetch('/api/statistics');

    if (!response.ok) {
        throw new Error('Statistiken konnten nicht geladen werden.');
    }

    const data = await response.json();

    const ctx = document.getElementById('statisticsChart');

    new Chart(ctx, {
        type: 'bar',

        data: {
            labels: data.labels,
            datasets: [{
                label: 'Anzahl',
                data: data.values,
                backgroundColor: '#206bc4',
                borderRadius: 5,
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

loadStatistics().catch(console.error);
