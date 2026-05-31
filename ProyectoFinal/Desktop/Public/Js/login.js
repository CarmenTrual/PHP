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


        if (response.ok) {
            // Si el login está bien, guarda el token en localStorage para recordar la sesión.
            localStorage.setItem("token", data.access_token);

            alert("Sesión iniciada correctamente");

            // Redirige al usuario a la página principal
            window.location.href = "index.html";
        } 

        // SI EL LOGIN FALLA
        else {
            alert(data.message || "Error al iniciar sesión");
        }

    } catch (error) {

        // SI HAY UN ERROR DE CONEXIÓN
        console.error("Error:", error);
        alert("No se pudo conectar con el servidor");
    }
});
