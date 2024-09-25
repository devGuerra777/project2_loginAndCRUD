<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Opcional: CSS externo -->
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" action="/login" method="POST"> <!-- Asegúrate de que la acción sea correcta -->
            @csrf <!-- Agrega este token para protección CSRF -->
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <div id="error" style="color:red; display:none;"></div>
    </div>

    <script>
        document.getElementById('loginForm').onsubmit = async function(event) {
            event.preventDefault(); // Prevenir el envío normal del formulario
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Para indicar que es una solicitud AJAX
                },
            });

            if (response.ok) {
                window.location.href = 'home.html'; // Redirigir a home si es exitoso
            } else {
                const errorDiv = document.getElementById('error');
                const result = await response.json(); // Obtener el mensaje de error
                errorDiv.textContent = result.message || 'Credenciales inválidas. Inténtalo de nuevo.';
                errorDiv.style.display = 'block';
            }
        };
    </script>
</body>
</html>
