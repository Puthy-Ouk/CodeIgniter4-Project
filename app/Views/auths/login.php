<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">
    <div class="auth__logo">
      <img height="90" src="images/logo.svg" alt="">
    </div>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-12">

      <?php if(session()->get('success')) :?>
        <div class="alert alert-success" role="alert"> <?= session()->get('success') ?></div>
     <?php endif; ?>
     
    </div>
  </div>
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="/Pizzas" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">Peperoni App</h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
          </div>
        </div>
      </div>
      <div class="auth__form_actions">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>


        <?php if(isset($validation)):?>
          <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors()?>
          </div>
        <?php endif;?>


        <div class="mt-2">
          <a href="/signout" class="small text-uppercase">
            CREATE ACCOUNT
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>