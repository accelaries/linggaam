<?php
include "koneksi.php";

// Query untuk mengambil data reservasi, pembayaran, dan user
$sql = "SELECT * FROM user, artikel WHERE user.id_user=artikel.id_user;";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
   // Data ditemukan, tampilkan ke dalam tabel
   ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Quick</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- Link tombol logout -->
      <link rel="stylesheet" href="logout.css">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="shortcut icon" href="logo-Quick.jpeg" type="image/x-icon">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
         media="screen">
      <style>
         .logo {
            text-align: center;
            /* Untuk mengatur logo berada di tengah */
            padding: 10px;
            /* Menambahkan padding untuk memberikan ruang di sekitar logo */
         }

         .logo img {
            width: auto;
            /* Biarkan browser menentukan lebar secara otomatis */
            height: 100%;
            /* Tinggi penuh dari elemen parent */
            max-height: 55px;
            /* Atur tinggi maksimum sesuai kebutuhan */
            display: block;
            /* Menghilangkan jarak bawah gambar */
            margin: 0px;
            /* Mengatur gambar agar berada di tengah */

         }
      </style>
   </head>
   <!-- body -->

   <body class="main-layout">

      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <!-- <figure><a href="home.php"><img src="logo-Quick.jpeg" alt="#" style="display: inline-block;"></a></figure> -->
                              <a href="#"><img src="logo-Quick.jpeg" alt="Logo Uinma Hotel" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                           aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="home.php">Beranda</a>
                              </li>
                              <li class="nav-item login">
                                 <a class="nav-link login" href="login.php">login</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>QUICK</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php
               $sql = "SELECT * FROM user, artikel WHERE user.id_user=artikel.id_user;";
               $result = $koneksi->query($sql);
               $no = 1;
               while ($row = $result->fetch_assoc()) {
                  ?>
                  <div class="col-md-4 col-sm-6">
                     <div id="serv_hover" class="room">
                        <div class="room_img">
                           <figure><img src="Uploads/<?php echo $row['nama_file']; ?>" alt="Foto Artikel"></figure>
                        </div>
                        <div class="bed_room">
                           <h3><?php echo $row['judul']; ?></h3>
                           <p><?php echo $row['isi']; ?></p>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>

               <!-- <div class="col-md-4 col-sm-6">
                  <div id="serv_hover" class="room">
                     <div class="room_img">
                        <figure><img src="images/room1.jpg" alt="#" /></figure>
                     </div>
                     <div class="bed_room">
                        <h3>Kamar Standar</h3>
                        <p>Kamar nyaman dengan fasilitas dasar, termasuk tempat tidur ukuran king, Wi-Fi gratis, dan
                           kamar mandi pribadi.</p>
                     </div>
                  </div>
               </div> -->

            </div>
         </div>
      </div>
      <!-- end our_room -->

      <!-- footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-6">

                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="main">
                        <h3>Kontak Kami</h3>
                        <p>Alamat: Jl. Mawar No. 1, Jakarta, Indonesia</p>
                        <p>Telepon: +62 123 4567 890</p>
                        <p>Email: info@quick.com</p>
                     </div>
                  </div>

                  <div class="col-md-3 col-sm-6">
                     <div class="main">
                        <h3>Ikuti Kami</h3>
                        <p>Dapatkan informasi terbaru dan penawaran spesial dengan mengikuti media sosial kami.</p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <p>© 2024 Quick. All Rights Reserved.</p>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         var slideIndex = 1;
         showSlides(slideIndex);

         function plusSlides(n) {
            showSlides(slideIndex += n);
         }

         function currentSlide(n) {
            showSlides(slideIndex = n);
         }

         function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
               dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
         }
      </script>
   </body>

   </html>
   <?php
} else {
   // Jika tidak ada data yang ditemukan
   echo "Belum ada data artikel.";
}
?>
