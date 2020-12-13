<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="col-10 col-sm-11 mx-auto mt-3">
  <?php if(logged_in()) :  ?>
  <a href="/Komik/create" class="btn btn-primary col-12 py-4">Tambah Komik</a>
  <?php endif  ?>
  <h1 class="text-center py-2 title">Daftar Komik</h1>
  <?php if (session()->getFlashData('pesan')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashData('pesan'); ?>
  </div>
  <?php endif ?>
  <form class="mb-3">
    <div class="input-group">
      <input class="form-control" type="text" placeholder="Cari komik..." name="keyword" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </div>
  </form>
  <table class="table shadowed">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Sampul</th>
        <th scope="col">Judul</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 + (5 * ($currentPage - 1)); ?>
      <?php foreach($comics as $comic): ?>
      <tr>
        <th class="list-number"><?= $i++; ?></th>
        <td><img src=<?= "/images/",$comic["sampul"] ?> alt=<?= $comic["slug"] ?>></td>
        <th><?= $comic["judul"] ?></th>
        <td><a class="btn btn-outline-success" href=<?= "/komik/",$comic["slug"] ?>>Detail</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?= $pager->links('komik', 'komik_pagination'); ?>
</div>

<?= $this->endSection(); ?>