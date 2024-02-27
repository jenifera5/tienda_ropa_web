<div class="login-container">
    <div class="login-content">
        <div class="l-content">
            <div class="section-title">
                <h2 class="login-heading">Log In</h2>
                <p class="text">Introduce tus datos</p>
            </div>

            <form action="?controller=Login&action=login" method="post" class="form">
                <div class="input-group">
                    <!-- Asegúrate de que el valor del atributo for sea igual al id del input correspondiente -->
                    <label for="usuario" class="label">Usuario*</label>
                    <!-- Agrega un atributo id que coincida con el valor de for en el label -->
                    <input type="text" name="usuario" id="usuario" class="input" placeholder="Tu Nombre" required>
                </div>

                <div class="input-group">
                    <!-- Asegúrate de que el valor del atributo for sea igual al id del input correspondiente -->
                    <label for="password" class="label">Contraseña*</label>
                    <!-- Agrega un atributo id que coincida con el valor de for en el label -->
                    <input type="password" name="password" id="password" class="input" placeholder="Tu Contraseña" required>
                </div>

                <div class="buttons">
                    <button type="submit" class="button">Log In</button>
                    <button type="button" class="button-google">
                        <img src="img/google-icon.png" alt="Google Icon" class="google-icon">
                        Log In with Google
                    </button>
                </div>
            </form>

            <div class="footer-login">
                <p class="footer-text">Don't have an account? <a href="?controller=Registro&action=showRegistroForm" class="footer-link">Sign up</a></p>
            </div>
        </div>
    </div>
</div>


