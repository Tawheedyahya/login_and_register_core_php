
<?php if (isset($_SESSION['msg']) && $_SESSION['msg'] === 'success'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ Registration successful! enter user_name and pasword
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['msg']); ?>
<?php endif;?>
<?php include './views/layouts/header.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="mb-4">LOGIN </h3>
        <form action="/core/project1-loginregister/poo" method="POST" enctype="multipart/form-data" onsubmit="return formsubmit(event)" id="form">

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="text-danger error" id="error-email"></div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="text-danger error" id="error-password"></div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
<!-- <script src="/assets/js/formsubmission.js"></script> -->
 <script src="../../public/assets/js/formsubmission.js"></script>


<?php include './views/layouts/footer.php'; ?>