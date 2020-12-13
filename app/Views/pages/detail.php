<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<div class="container detail__page shadowed">
  <div class="comic__card">
    <img src=<?= "/images/",$comic["sampul"] ?> alt=<?=$comic["slug"] ?> class="comic__image mx-auto">
    <div class="comic__detail">
      <h1><?= $comic["judul"] ?></h1>
      <div class="information">
        <span class="question">Penulis</span>
        <span>:</span>
        <span class="info"><?= $comic["penulis"] ?></span>
      </div>
      <div class="information">
        <span class="question">Penerbit</span>
        <span>:</span>
        <span class="info"><?= $comic["penerbit"] ?></span>
      </div>
      <div class="information">
        <span class="question">Sinopsis</span>
        <span>:</span>
        <span class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. At odit cupiditate quod. Error
          consequatur incidunt qui maxime fugit natus! Reprehenderit dolore iure cupiditate quae molestias.</span>
      </div>
      <?php if(logged_in()) :  ?>
      <div class="edit-delete-button">
        <a href="/komik/edit/<?= $comic["slug"] ?>" class="edit btn btn-warning mt-4">Edit</a>
        <form action="/komik/<?= $comic["id"]; ?>" class="d-inline" method="POST">
          <input type="hidden" name="_method" value="delete" />
          <button type="submit" class="btn btn-danger mt-4 delete"
            onclick='return confirm(`Hapus komik <?= $comic["judul"] ?> ?`)'>Delete</button>
        </form>
      </div>
      <?php else:  ?>
      <a href="/komik/edit/<?= $comic["slug"] ?>" class="edit btn btn-warning mt-4">Beli komik</a>
      <?php endif;  ?>
    </div>
    <a href="/Komik" class="btn btn-primary back-to-comic-page">Daftar Komik</a>
  </div>
</div>
<?= $this->endSection(); ?>