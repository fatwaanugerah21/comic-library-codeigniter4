<?= $this->extend("layouy/template") ?>

<?= $this->section("content") ?>
<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (!logged_in()){
  header("Location: /");
  exit;
} ?>

<div class="create_page container center mt-5 shadowed">

  <h1 class="text-center mb-5 mt-0 ">Edit Komik</h1>
  <form action="/Komik/update/<?= $komik["id"] ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="slug" value="<?= $komik["slug"] ?>">
    <input type="hidden" name="oldCover" value="<?= $komik["sampul"] ?>">
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" value="<?= old('title') ?? $komik["judul"] ?>"
        class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''  ?>" id="title" name="title"
        placeholder="One Piece">
      <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
    </div>
    <div class="mb-3">
      <label for="writer" class="form-label">Penulis</label>
      <input type="text" value="<?= old('writer') ?? $komik["penulis"] ?>"
        class="form-control <?= ($validation->hasError('writer')) ? 'is-invalid' : ''  ?>" id="writer" name="writer"
        placeholder="Devon">
      <div class="invalid-feedback"><?= $validation->getError('writer') ?></div>
    </div>
    <div class="mb-3">
      <label for="publisher" class="form-label">Penerbit</label>
      <input type="text" value="<?= old('publisher') ?? $komik["penerbit"] ?>"
        class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''  ?>" id="publisher"
        name="publisher" placeholder="Steam">
      <div class="invalid-feedback"><?= $validation->getError('publisher') ?></div>
    </div>
    <div class="mb-5">
      <label for="sampul" class="form-label">Sampul</label>
      <div class="col-sm-2" style="transform:scale(0.6); margin:-20px 0"><img class="image-preview"
          src="/images/<?= $komik["sampul"] ?>" alt="<?= $komik["slug"] ?>"></div>
      <input onChange="previewImg()" type="file"
        class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''  ?>" name="sampul"
        value="<?= old('sampul') ?>" id="sampul">
      <div class="invalid-feedback"><?= $validation->getError('sampul') ?></div>
    </div>
    <button class="btn btn-danger">Simpan Perubahan</button>
  </form>
</div>

<?= $this->endsection() ?>