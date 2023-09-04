document.getElementById('signOutLink').addEventListener('click', function(event){
    event.preventDefault();
    document.getElementById('signOutForm').submit();
});
document.getElementById('dashboard').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/dashboard';
});
document.getElementById('downloads').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/downloads';
});
document.getElementById('addresses').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/addresses';
});
document.getElementById('my-data').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/edit-account';
});
document.getElementById('compare').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/compare';
});
document.getElementById('wish-list').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/wish-list';
});
document.getElementById('new-ads').addEventListener('click', function(event){
    event.preventDefault();
    window.location.href = '/my-account/add-new-ads';
});