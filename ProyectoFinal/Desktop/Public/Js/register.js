// Cuando el usuario envía el formulario de registro
document.getElementById("registerForm").addEventListener("submit", async function (e) {
    e.preventDefault(); // Evita que la página se recargue

    // Recoge los valores de los inputs
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const password_confirmation = document.getElementById("password_confirmation").value;

    // Comprueba que las contraseñas coinciden
    if (password !== password_confirmation) { // Si las contraseñas no coinciden
        alert("Las contraseñas no coinciden"); // mensaje de error si no coinciden
        return; // Detiene aquí para no enviar nada al servidor y nada de lo de abajo se ejecuta
    }

    try { // Si las contraseñas coinciden entra aquí y envia los datos al backend para crear el usuario
        const response = await fetch("http://localhost:8000/api/register", { 
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Envia JSON
            },
            body: JSON.stringify({ // convierte los datos a JSON
                name,
                email,
                password,
                password_confirmation
            })
        });

        const data = await response.json(); // convierte la respuesta a JSON

        if (response.ok) {
            // Si el registro es correcto, redirige al login
            alert("Registro completado. Ahora puedes iniciar sesión.");
            window.location.href = "login.html";
            return; // Evita que siga ejecutando nada más
        }

        // Muestra errores de validación si los hay
        alert(data.message || "Error al registrar el usuario");

    } catch (error) {
        // Muestra un mensaje de error si no se puede conectar con el backend
        alert("Error de conexión con el servidor");
    }
}); 