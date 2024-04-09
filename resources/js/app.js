import './swiper';
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('img').forEach((img) => {
        const src = img.getAttribute('src');
        const noHasSrc = (src == '');

        if (noHasSrc) {
            img.src = '/images/image_blank.webp';
            img.error = false;
        }

        img.addEventListener('error', () => {
            img.src = "/images/image_blank.webp";
            img.error = false;
        });
    });
});
