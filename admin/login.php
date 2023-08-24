<?php
include_once("layout/top_all.php");
?>

    <div class="container-login">
        <main class="form-signin w-100 m-auto">
            <form action="<?php echo ADMIN_URL; ?>index.php" method="post">
                <h1 class="text-center">Admin Login</h1>
        
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
        
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <div class="login-forget-password">
                <a href="<?php echo ADMIN_URL; ?>forget-password.php">Forget Password</a>
            </div>
        </main>
    </div>

    <?php 
    include_once("layout/footer.php");
    ?>