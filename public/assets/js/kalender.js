let currentMonth = new Date().getMonth() + 1; // bulan aktif (1 - 12)
let currentYear = new Date().getFullYear();

function updateMonthlySummary(month, year) {
    $.ajax({
        url: `/dashboard-summary?month=${month}&year=${year}`,
        method: 'GET',
        success: function (response) {
            // Tampilkan ke UI
            $('#totalPenjualan').text(response.total_penjualan);
            $('#totalPembelian').text(response.total_pembelian);
            $('#debt').text(response.debt);
            $('#penghasilan').text(response.penghasilan);
        }
    });
}

// Ketika navigasi bulan diklik
$('.calendar__arrow.left, .calendar__arrow.right').on('click', function () {
    // Update currentMonth dan currentYear
    // lalu panggil:
    updateMonthlySummary(currentMonth, currentYear);
});
