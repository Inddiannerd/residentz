function toggleMenu() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('nav-active');
}

function updateNavBar() {
    const navRight = document.getElementById('navRight');
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    
    if (isLoggedIn) {
        navRight.innerHTML = `
            <a href="#" onclick="showDashboard()">Your Society</a>
            <a href="#" onclick="logout()" id="loginBtn">Logout</a>
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
        `;
    } else {
        navRight.innerHTML = `
            <a href="LoginAndSignUp.html" id="loginBtn">Login / Sign Up</a>
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
        `;
    }
}

function logout() {
    localStorage.clear();
    window.location.href = 'LoginAndSignUp.html';
}

function showDashboard() {
    window.location.href = 'index.html';
}

window.onload = function() {
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    const userId = localStorage.getItem('userId');
    
    if (!isLoggedIn || !userId) {
        localStorage.clear();
        window.location.href = 'LoginAndSignUp.html';
    }
    updateNavBar();
}