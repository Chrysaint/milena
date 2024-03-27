const track = document.querySelector('.slider__track');
const slides = Array.from(track.children);
const firstSlide = slides[0];
const lastSlide = slides[slides.length - 1];
const nextButton = document.querySelector('.slider__btn_next');
const prevButton = document.querySelector('.slider__btn_prev');

const slideWidth = slides[0].getBoundingClientRect().width;

const setSlidePosition = (slide, idx) => {
    slide.style.left = slideWidth * idx + 'px';
};

slides.forEach(setSlidePosition);

function moveSlides(nextSlide, currentSlide, amountToMove) {
    currentSlide.classList.remove('current-slide');
    nextSlide.classList.add('current-slide');
    track.style.transform = "translateX(-" + amountToMove + ")";
}

function hideShowButtons (nextSlide) {
    if(nextSlide === firstSlide){
        prevButton.classList.add("slider__btn_hidden");
    } else if (prevButton.classList.contains('slider__btn_hidden')) {
        prevButton.classList.remove("slider__btn_hidden");
    }

    
    if(nextSlide === lastSlide){
        nextButton.classList.add("slider__btn_hidden");
    } else if (nextButton.classList.contains('slider__btn_hidden')) {
        nextButton.classList.remove("slider__btn_hidden");
    }
}

prevButton.addEventListener('click', (e) => {
    e.preventDefault();
    
    const currentSlide = document.querySelector('.current-slide');
    const prevSlide = currentSlide.previousElementSibling;
    const amountToMove = prevSlide.style.left;

    moveSlides(prevSlide, currentSlide, amountToMove);
    hideShowButtons(prevSlide);
})

nextButton.addEventListener('click', (e) => {
    e.preventDefault();
    
    const currentSlide = document.querySelector('.current-slide');
    const nextSlide = currentSlide.nextElementSibling;
    const amountToMove = nextSlide.style.left;

    moveSlides(nextSlide, currentSlide, amountToMove);
    hideShowButtons(nextSlide);
})