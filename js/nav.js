function updateNavBar() {
    const navRight = document.getElementById('navRight');
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    
    if (isLoggedIn) {
        navRight.innerHTML = `
            <a href="#" onclick="showDashboard()">Your Society</a>
            <a href="#" onclick="logout()" id="loginBtn">Logout</a>
        `;
    } else {
        navRight.innerHTML = `
            <a href="LoginAndSignUp.html" id="loginBtn">Login / Sign Up</a>
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