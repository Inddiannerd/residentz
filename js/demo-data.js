const demoData = {
    users: [
        {
            id: 1,
            email: "demo@example.com",
            password: "1234567",
            name: "Demo User",
            society_id: 1
        }
    ],
    societies: [
        {
            id: 1,
            name: "Demo Society",
            address: "123 Demo Street",
            maintenanceDue: "5000",
            totalResidents: 50,
            pendingComplaints: 2
        }
    ],
    complaints: [
        {
            id: 1,
            title: "Water Supply Issue",
            description: "Low water pressure in Block A",
            status: "Pending",
            created_date: "2024-03-19"
        }
    ],
    polls: [
        {
            id: 1,
            title: "Garden Renovation",
            description: "Vote for new garden layout",
            options: ["Design A", "Design B", "Design C"],
            end_date: "2024-04-01"
        }
    ]
};

// Enhanced demo functions
function demoLogin(email, password) {
    const user = demoData.users.find(u => 
        u.email === email && u.password === password
    );
    if (user) {
        localStorage.setItem('isLoggedIn', 'true');
        localStorage.setItem('userId', user.id);
        localStorage.setItem('userName', user.name);
        localStorage.setItem('societyId', user.society_id);
        return true;
    }
    return false;
}

function getDemoSocietyData(societyId) {
    return demoData.societies.find(s => s.id === societyId);
}

function getDemoComplaints() {
    return demoData.complaints;
}

function getDemoPolls() {
    return demoData.polls;
}