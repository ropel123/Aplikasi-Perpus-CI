
//angka 5000 dibawah ini artinya pesan akan muncul dalam 5 detik setelah document ready
//angka 6000 dibawah ini artinya pesan akan hilang dalam 6 detik setelah muncul

$(document).ready(function () { setTimeout(function () { $(".alert-success").fadeIn('slow'); }, 2000); });
setTimeout(function () { $(".alert-success").fadeOut('slow'); }, 2000);

$(document).ready(function () { setTimeout(function () { $(".alert-warning").fadeIn('slow'); }, 2000); });
setTimeout(function () { $(".alert-warning").fadeOut('slow'); }, 2000);

$(document).ready(function () { setTimeout(function () { $(".alert").fadeIn('slow'); }, 2000); });
setTimeout(function () { $(".alert1").fadeOut('slow'); }, 2000);
