<?php include './views/layouts/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-4 rounded shadow">
            <h3 class="mb-4 text-center text-primary">Register</h3>

            <form action="/core/project1-loginregister/po" method="POST" enctype="multipart/form-data" onsubmit="return formsubmit(event)" id="form">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                    <div class="text-danger error" id="error-name"></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email">
                    <div class="text-danger error" id="error-email"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Enter password">
                    <div class="text-danger error" id="error-password"></div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Retype Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Retype password">
                    <div class="text-danger error" id="error-password_confirmation"></div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>

                <div class="text-center mt-3">
                    Already have an account? <a href="/login" class="text-decoration-none">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

 <script src="../../public/assets/js/formsubmission.js"></script>

<?php include './views/layouts/footer.php'; ?>
