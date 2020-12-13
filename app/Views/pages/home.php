<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<div class="landing-page" id="home">
  <img src="/images/background.jpg" alt="">
  <div class="content">
    <h1>Ilkom Komik</h1>
    <p>Komik store terbesar di Indonesia</p>
    <a href="/komik" class="btn btn-primary">List Komik</a>
  </div>
</div>

<div class="about-us mt-5" id="about-us">
  <div class="page-name-position">
    <div class="page-name">Tentang Kami</div>
  </div>
  <div class="content">
    <h1 class="title marginated">Saya Fatwa Anugerah Nasir</h1>
    <p class="text marginated">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur porro reprehenderit ducimus animi vitae quam
      necessitatibus molestias est consequuntur illo dolores expedita dicta architecto placeat distinctio minima
      sapiente recusandae rem nesciunt, saepe odio nulla ipsa iure voluptate. Nobis, impedit, autem repudiandae ratione
      voluptates, quis perferendis odio numquam eligendi repellat qui.
    </p>
    <p class="hashtag marginated">#CodingIsFun</p>
  </div>
</div>
<?= $this->endSection(); ?>