const demoData = {
    users: [
        {
            id: 1,
            email: "demo@example.com",
            password: "1234567",
            name: "Demo User"
        }
    ],
    societies: [
        {
            id: 1,
            name: "Demo Society",
            address: "123 Demo Street",
            maintenanceDue: "5000"
        }
    ]
};

function demoLogin(email, password) {
    const user = demoData.users.find(u => 
        u.email === email && u.password === password
    );
    if (user) {
        localStorage.setItem('isLoggedIn', 'true');
        localStorage.setItem('userId', user.id);
        localStorage.setItem('userName', user.name);
        return true;
    }
    return false;
}