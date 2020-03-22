/**
 * index slider builder
 */
function initilizeIndexSlider() {
    let id = 'index-slider';
    let list = [
        'images\\index-slide\\1.jpg',
        'images\\index-slide\\2.jpg',
        'images\\index-slide\\3.jpg'
    ];

    let slider = document.getElementById(id);
    let ul = slider.querySelector('ul');

    list.forEach(src => {
        let li = document.createElement('li');
        li.classList.add('splide__slide');

        let div = document.createElement('div');
        div.classList.add('slide');

        let img = document.createElement('images');
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
 * suggestion slider builder
 */
function initilizeSuggestionSlider() {
    let id = 'suggestion-slider';
    let list = [
        {
            title: 'Card one',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\suggestion-slide\\1.jpg'
        },
        {
            title: 'Card two',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\suggestion-slide\\2.jpg'
        },
        {
            title: 'Card three',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\suggestion-slide\\3.jpg'
        },
        {
            title: 'Card three',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\suggestion-slide\\3.jpg'
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
                            <a href="#" class="btn btn-primary btn-sm">اطلاعات بیشتر</a>
                        </div>
                    </div>
                </div>
            </li>`;
    });

    return new Splide(slider, {
        type: 'loop',
        perPage: suggestionSliderPerPage(),
        rewind: true,
        autoplay: true,
        pagination: false
    }).mount();
}

function suggestionSliderPerPage() {
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
 * banner slider builder
 */
function initilizeBannerSlider() {
    let id = 'banner-slider';
    let list = [
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\1.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\2.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\3.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\1.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\2.jpg'
        },
        {
            title: 'Card title',
            content:
                "Some quick example text to build on the card title and make up the bulk of the card's content.",
            img: 'images\\banner-slide\\3.jpg'
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
                            <a href="#" class="btn btn-primary btn-sm">اطلاعات بیشتر</a>
                        </div>
                    </div>
                </div>
            </li>`;
    });

    return new Splide(slider, {
        type: 'loop',
        perPage: bannerSliderPerPage(),
        rewind: true,
        autoplay: true,
        pagination: false
    }).mount();
}

function bannerSliderPerPage() {
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
 * today restaurant slider builder
 */
function initilizeTodayRestaurantSlider(list) {
    let id = 'today-restaurant-slider';

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
                            <a href="${slide.link}" class="btn btn-primary btn-sm">اطلاعات بیشتر</a>
                        </div>
                    </div>
                </div>
            </li>`;
    });

    return new Splide(slider, {
        type: 'loop',
        perPage: todayRestaurantSliderPerPage(),
        rewind: true,
        autoplay: true,
        pagination: false
    }).mount();
}

function todayRestaurantSliderPerPage() {
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
 * all restaurant slider builder
 */
function initilizeAllRestaurantSlider(list) {
    let id = 'all-restaurant-slider';
    // let list = [
    //     {
    //         title: 'Card title',
    //         content:
    //             "Some quick example text to build on the card title and make up the bulk of the card's content.",
    //         img: 'images\\all-restaurant-slide\\1.jpg'
    //     },
    //     {
    //         title: 'Card title',
    //         content:
    //             "Some quick example text to build on the card title and make up the bulk of the card's content.",
    //         img: 'images\\all-restaurant-slide\\2.jpg'
    //     },
    //     {
    //         title: 'Card title',
    //         content:
    //             "Some quick example text to build on the card title and make up the bulk of the card's content.",
    //         img: 'images\\all-restaurant-slide\\3.jpg'
    //     }
    // ];

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
                            <a href="#" class="btn btn-primary btn-sm">اطلاعات بیشتر</a>
                        </div>
                    </div>
                </div>
            </li>`;
    });

    return new Splide(slider, {
        type: 'loop',
        perPage: allRestaurantSliderPerPage(),
        rewind: true,
        autoplay: true,
        pagination: false
    }).mount();
}

function allRestaurantSliderPerPage() {
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
 * loader
 */
var suggestionSlider;
var bannertSlider;
var todayRestaurantSlider;
var allRestaurantSlider;



$('#phone-number').inputmask({'mask': '0999 999 99 99'})

window.addEventListener('resize', function() {
    // suggestionSlider.options = { perPage: suggestionSliderPerPage() };
    // bannerSlider.options = { perPage: bannerSliderPerPage() };
    todayRestaurantSlider.options = { perPage: todayRestaurantSliderPerPage() };
    allRestaurantSlider.options = { perPage: allRestaurantSliderPerPage() };
});

$('#go-down').on('click', function(ev) {
    let el = document.getElementById('today-restaurants');;
    el.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
});
