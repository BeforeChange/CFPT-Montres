<form action="/login" method="post">
    <div class="mb-3">
        <p class="error-message"><?= $errors['email'] ?? '' ?></p>
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div>
        <p class="error-message"><?= $errors['password'] ?? '' ?></p>
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <p class="error-message"><?= $errors['general'] ?? '' ?></p>
    <button type="submit" class="btn btn-primary">Login</button>
</form>