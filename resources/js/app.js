require('./bootstrap');
window.addEventListener('scroll', function() {
    const blogLink = document.querySelector('a[href="/my-blog"]');

    if (window.scrollY > 50) {  // 50px is the scroll threshold, adjust as needed
        blogLink.classList.add('enlarged');
    } else {
        blogLink.classList.remove('enlarged');
    }
});
