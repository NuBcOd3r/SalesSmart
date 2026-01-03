function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
}

function toggleMobileSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}

function setActive(element) {
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => link.classList.remove('active'));
    element.classList.add('active');
}

document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const mobileBtn = document.querySelector('.mobile-menu-btn');
            
    if (window.innerWidth <= 768) 
    {
    if (!sidebar.contains(event.target) && !mobileBtn.contains(event.target)) 
    {
    sidebar.classList.remove('active');
    }
    }
});