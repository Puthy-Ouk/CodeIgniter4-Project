<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">


  <?php if(isset($validation)) :?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
      </div>
  </div>
  <?php endif; ?>


  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="/signout" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" name ="email" class="form-control" placeholder="Enter email" value="">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea name="address"  class="form-control" placeholder="Address" value=""></textarea>
          </div>

          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="roles"  class="form-check-input" name="checkbox" value="1">I'm a manager
            </label>
            <!-- <input type="text" name="roles" class="form-control" placeholder="roles" value=""> -->
        </div>

        </div>
      </div>

        <div class="auth__form_actions">

          <button  type="submit"  class="btn btn-primary btn-lg btn-block" >
            NEXT
          </button>

        <div class="mt-2">
          <a href="/signin" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>

    </form>
  </div>
</div>
<?= $this->endSection() ?>