<form action="/register" method="post">
    <div>
        <div class="mb-3">
            <p class="error-message"><?= $errors['last_name'] ?? '' ?></p>
            <label for="last_name" class="form-label">Last Name:</label>
            <input type="text" class="form-label" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <p class="error-message"><?= $errors['first_name'] ?? '' ?></p>
            <label for="first_name" class="form-label">First Name:</label>
            <input type="text" class="form-label" id="first_name" name="first_name" required>
        </div>
    </div>
    <div class="mb-3">
        <p class="error-message"><?= $errors['email'] ?? '' ?></p>
        <label for="email" class="form-label" >Email:</label>
        <input type="email" class="form-label" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <p class="error-message"><?= $errors['password'] ?? '' ?></p>
        <label for="password" class="form-label" >Password:</label>
        <input type="password" class="form-label" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <p class="error-message"><?= $errors['confirm_password'] ?? '' ?></p>
        <label for="confirm_password" class="form-label" >Confirm Password:</label>
        <input type="password" class="form-label" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Register</button>
</form>