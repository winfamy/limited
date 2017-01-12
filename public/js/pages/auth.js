$(document).ready(function(e) {
    $('body').on('click', '#register', function(e) {
        e.preventDefault();
        console.log('register');
        history.pushState('register', 'register', '/register');
    });

    $('body').on('click', '#login', function(e) {
        e.preventDefault();
        console.log('login');
        history.pushState('login', 'login', '/login');
    });

    $('body').on('click', '#recover', function(e) {
        e.preventDefault();
        console.log('recover');
        history.pushState('recover', 'recover', '/recover');
    });
});