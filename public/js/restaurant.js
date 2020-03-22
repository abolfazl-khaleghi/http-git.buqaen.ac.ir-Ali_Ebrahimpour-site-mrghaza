function initilizeSimilarSlider() {
    let id = 'similar-slider';
    let list = [
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\similar-slide\\1.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\similar-slide\\2.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\similar-slide\\3.jpg'
        }
    ];

    let slider = document.getElementById(id);
    let ul = slider.querySelector('ul');

    list.forEach(slide => {
        ul.innerHTML += `
            <li class="splide__slide">
                <div class="slide">
                    <div class="card text-center">
                        <img src="${slide.img}" class="card-img-top mx-auto" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">${slide.title}</h5>
                            <p class="card-text">${slide.content}</p>
                            <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </li>`;
    });

    return new Splide(slider, {
        type: 'loop',
        perPage: similarSliderPerPage(),
        rewind: true,
        autoplay: true,
        pagination: false
    }).mount();
}

function similarSliderPerPage() {
    let width = window.innerWidth;
    if (width < 540) {
        return 1;
    } else if (width < 768) {
        return 3;
    } else {
        return 4;
    }
}
/**
 * restaurant slider
 */
function initilizeRestaurantSlider() {
    let id = 'restaurant-slider';
    let list = [
        'images\\restaurant-slide\\1.jpg',
        'images\\restaurant-slide\\2.jpg',
    ];

    let slider = document.getElementById(id);
    let ul = slider.querySelector('ul');

    list.forEach(src => {
        let li = document.createElement('li');
        li.classList.add('splide__slide');

        let div = document.createElement('div');
        div.classList.add('slide');

        let img = document.createElement('img');
        img.classList.add('w-100');
        img.src = src;

        div.appendChild(img);
        li.appendChild(div);

        ul.appendChild(li);
    });

    return new Splide(slider, {
        type: 'fade',
        rewind: true,
        autoplay: true
    }).mount();
}

/**
 * loader
 */
var similarSlider;
$(document).ready(function() {
    similarSlider = initilizeSimilarSlider();
    initilizeRestaurantSlider();

    var map = L.map('mapid').setView([51.505, -0.09], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.5, -0.09])
        .addTo(map)
        .bindPopup('رستوران قصر آریا')
        .openPopup();

    $('a[href="#new-comment"]').on('click', function(ev) {
        $('#new-comment').removeClass('d-none');
        $('#comments').addClass('d-none');
    });

    $('a[href="#comments"]').on('click', function(ev) {
        $('#new-comment').addClass('d-none');
        $('#comments').removeClass('d-none');
    });
});

window.addEventListener('resize', function() {
    similarSlider.options = { perPage: similarSliderPerPage() };
});
