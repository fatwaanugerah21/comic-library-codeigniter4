<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<?php if(!logged_in()): ?>
<?php header("Location:  /login"); exit; ?>
<?php endif  ?>
<div class="create_page container center my-5 shadowed">

  <h1 class="text-center mb-4" style="margin-top: -20px;">Tambah Komik</h1>
  <form action="/Komik/save" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" value="<?= old('title') ?>"
        class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''  ?>" id="title" name="title"
        placeholder="One Piece">
      <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
    </div>
    <div class="mb-3">
      <label for="writer" class="form-label">Penulis</label>
      <input type="text" value="<?= old('writer') ?>"
        class="form-control <?= ($validation->hasError('writer')) ? 'is-invalid' : ''  ?>" id="writer" name="writer"
        placeholder="Devon">
      <div class="invalid-feedback"><?= $validation->getError('writer') ?></div>
    </div>
    <div class="mb-3">
      <label for="publisher" class="form-label">Penerbit</label>
      <input type="text" value="<?= old('publisher') ?>"
        class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''  ?>" id="publisher"
        name="publisher" placeholder="Steam">
      <div class="invalid-feedback"><?= $validation->getError('publisher') ?></div>
    </div>
    <div class="mb-3">
      <label for="sampul" class="form-label">Sampul</label>
      <div class="col-sm-2" style="transform:scale(0.6); margin:-20px 0"><img class="image-preview"
          src="https://upload.wikimedia.org/wikipedia/id/9/95/Logo_UH.png" alt=""></div>
      <input onChange="previewImg()" type="file"
        class="form-control file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''  ?>" name="sampul"
        value="<?= old('sampul') ?>" id="sampul">
      <div class="invalid-feedback"><?= $validation->getError('sampul') ?></div>
    </div>
    <button class=" btn btn-warning" style=" margin:20px auto -20px">Tambah Komik</button>
  </form>
</div>

<?= $this->endSection()  ?>