<div class="registro-container">
        <div class="registro-content">
            <h2 class="registro-heading">Sign In</h2>
            <p class="text">Introduce tus datos</p>
            <form action="?controller=Registro&action=registrar" method="post" class="registro-form">
                <div class="registro-input-group">
                    <label for="usuario" class="label">Usuario*</label>
                    <input type="text" name="usuario" class="input" placeholder="Tu Usuario" required>
                </div>

                <div class="registro-input-group">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" class="input" placeholder="Tu Email">
                </div>

                <div class="registro-input-group">
                    <label for="password" class="label">Contraseña*</label>
                    <input type="password" name="password" class="input" placeholder="Tu Contraseña" required>
                </div>

                <div class="registro-input-group">
                    <label for="direccion" class="label">Dirección*</label>
                    <input type="text" name="direccion" class="input" placeholder="Tu Dirección" required>
                </div>

                <div class="registro-buttons">
                    <input type="submit" value="Registrarse" class="registro-button">
                    <button type="button" class="button-google">
                        <img src="img/google-icon.png" alt="Google Icon" class="google-icon">
                        Sign In with Google
                    </button>
                </div>
            </form>
            <div class="footer-registro">
                <p class="footer-textregistro">Already have an account?<a href="?controller=Login&action=showLoginForm" class="footer-linkregistro">Log In</a></p>
            </div>
        </div>
    </div>

