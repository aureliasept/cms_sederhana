// Pastikan AdminLTE sudah ter-load dengan baik
$(document).ready(function () {
    // Sidebar toggle untuk mode penuh atau collapse
    $('.sidebar-toggle').click(function () {
        $('body').toggleClass('sidebar-collapse');
    });

    // Menampilkan pesan ketika halaman sudah siap
    console.log("Website loaded successfully!");

    // Event untuk tombol logout
    $('#logout-btn').on('click', function () {
        alert('You have logged out!');
        window.location.href = 'logout.php';  // Arahkan ke halaman logout
    });

    // Menambahkan event listener untuk item sidebar yang diklik
    $('.nav-item').on('click', function () {
        var itemText = $(this).find('a').text();
        console.log('You clicked on ' + itemText);
    });

    // Misalnya, menambahkan fungsi modal atau alert kustom
    $('#openModal').click(function () {
        alert("This is a custom modal or alert!");
    });

    // Mengaktifkan tooltip pada elemen tertentu
    $('[data-toggle="tooltip"]').tooltip();
});

// Contoh event untuk menambahkan class active ke menu sidebar
$('.nav-link').on('click', function () {
    // Menghapus class active dari semua menu
    $('.nav-link').removeClass('active');
    // Menambahkan class active ke item yang diklik
    $(this).addClass('active');
});
