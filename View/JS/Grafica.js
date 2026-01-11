let chart = null;

function cargarGrafica(url, titulo) {
    fetch(url)
    .then(r => r.json())
    .then(data => {

        const labels = data.map(i => i.dia);
        const totals = data.map(i => i.total);

        const ctx = document.getElementById('ventasChart').getContext('2d');

        if (chart) {
            chart.data.labels = labels;
            chart.data.datasets[0].data = totals;
            chart.data.datasets[0].label = titulo;
            chart.update();
        } else {
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: titulo,
                        data: totals,
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
}

function cargarSemana() {
    cargarGrafica('../../Controller/DashboardController.php?accion=ventasSemana', 'Ventas por Semana');
}

function cargarMes() {
    cargarGrafica('../../Controller/DashboardController.php?accion=ventasMes', 'Ventas por Mes');
}

document.addEventListener('DOMContentLoaded', () => {
    cargarSemana();
});
