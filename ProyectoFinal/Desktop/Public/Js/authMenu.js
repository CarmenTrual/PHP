document.addEventListener("DOMContentLoaded", () => {
    const token = localStorage.getItem("token");

    const btnLogin = document.getElementById("btn-login");
    const btnPerfil = document.getElementById("btn-perfil");
    const btnLogout = document.getElementById("btn-logout");

    const hmLogin = document.getElementById("hm-login");
    const hmPerfil = document.getElementById("hm-perfil");
    const hmLogout = document.getElementById("hm-logout");

    if (token) {
        // Usuario logueado
        if (btnLogin) btnLogin.style.display = "none";
        if (btnPerfil) btnPerfil.style.display = "inline-block";
        if (btnLogout) btnLogout.style.display = "inline-block";

        if (hmLogin) hmLogin.style.display = "none";
        if (hmPerfil) hmPerfil.style.display = "block";
        if (hmLogout) hmLogout.style.display = "block";
    } else {
        // Usuario NO logueado
        if (btnLogin) btnLogin.style.display = "inline-block";
        if (btnPerfil) btnPerfil.style.display = "none";
        if (btnLogout) btnLogout.style.display = "none";

        if (hmLogin) hmLogin.style.display = "block";
        if (hmPerfil) hmPerfil.style.display = "none";
        if (hmLogout) hmLogout.style.display = "none";
    }

    // Cerrar sesión
    if (btnLogout) {
        btnLogout.addEventListener("click", () => {
            localStorage.removeItem("token");
            window.location.reload();
        });
    }

    if (hmLogout) {
        hmLogout.addEventListener("click", () => {
            localStorage.removeItem("token");
            window.location.reload();
        });
    }
});
