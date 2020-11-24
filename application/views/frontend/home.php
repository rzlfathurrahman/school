<section id="home" class="js-height-full" style="background-image: url(<?= base_url()  ?>assets/backend/dist/img/photo4.jpg); background-size: cover;">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
                
        <p>SMK MA'ARIF NU 1 AJIBARANG</p>
        <small>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. At facere, consequuntur quam iste, enim aliquam sunt inventore soluta in? Esse dicta fugiat facilis, cum eveniet consequuntur vitae commodi, repellendus obcaecati.</small>
        </div>
    </div>
    <div class="slider-bottom">
        <span>Explore <i class="fa fa-angle-down"></i></span>
    </div>
</section>
<?php for($i = 0; $i < count($landing_page); $i++) : ?>

<section class="section <?= (($i % 2) == 0) ? 'gb' : ''  ?>">
    <div class="container">
      <h2><?= $landing_page->judul  ?></h2>
      <h2><?= $landing_page->keterangan  ?></h2>
    </div><!-- end container -->
</section>

<?php endfor; ?>