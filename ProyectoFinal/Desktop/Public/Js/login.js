// ===============================
// MANEJAR EL FORMULARIO DE LOGIN
// ===============================

document.getElementById("loginForm").addEventListener("submit", async function(e) {
    e.preventDefault(); // Evita que la página se recargue

    // ===============================
    // OBTENER LOS DATOS DEL FORMULARIO
    // ===============================
    const email = document.getElementById("email").value;      
    const password = document.getElementById("password").value; 

    try {
        // ===============================
        // ENVIAR DATOS A LA API DE LARAVEL
        // ===============================
        const response = await fetch("http://127.0.0.1/api/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Indica que enviamos JSON
            },
            body: JSON.stringify({ email, password }) // Convertir los datos a JSON
        });

        // Convertimos la respuesta de Laravel a JSON
        const data = await response.json();

            // Si el login es correcto
        if (response.ok) {
            // Si el login está bien, guarda el token en localStorage para recordar la sesión.
            localStorage.setItem("token", data.access_token);

            // Redirigimos inmediatamente
            window.location.href = "index.html";


            return; // Importante: salir aquí
        }

        // Si el login falla mostramos un mensaje de error
        alert(data.message || "Error al iniciar sesión");

    } catch (error) {
        console.error("Error:", error);
        alert("No se pudo conectar con el servidor");
    }
});

