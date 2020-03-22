function rate(rate, vote) {
    let spans = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rate) {
            spans = '<span class="checked"></span>' + spans;
        } else {
            spans = '<span class=""></span>' + spans;
        }
    }

    return `<div class="container-fluid mb-3">
    <div class="row">
      <div class="col-12 d-flex">
        <div class="rate mx-auto float-left">
          ${spans}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6 text-center"><span class="btn btn-sm btn-success">${rate}</span></div>
      <div class="col-6 dir-rtl text-center"><span>(${vote.toString()} نظر)</span></div>
    </div>
  </div>`;
}

function images() {
    return `<div class="card-img-top overflow-hidden">
    <img src="<?= Url('images/logo-black-white.png') ?>" class="w-100" alt="...">
  </div>
  <img src="<?= Url('images/logo-turquoise.png') ?>" class="card-img-logo position-absolute" alt="">`;
}

function contents() {
    return `<h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
      content.</p>`;
}

function buttons() {
    return `<div class="btn-group dir-ltr w-100" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">خرید</button>
    <button type="button" class="btn btn-secondary">مشخصات</button>
    <button type="button" class="btn btn-secondary">نمایش</button>
  </div>`;
}

function off(percent) {
    return `<div class="off position-absolute dir-ltr">
    <div class="triangle position-absolute shadow-sm"></div>
    <span class="position-relative">٪ ${percent}</span>
  </div>`;
}

$(document).ready(function() {
    let data = [0, 1, 2, 3, 4];
    let results = document.getElementById('results');

    data.forEach(function(el) {
        results.innerHTML += `<div class="card m-2 flex-md-grow-0 max-width overflow-hidden position-relative">
        ${images()}
        <div class="card-body dir-rtl text-right">
        <div class="container-fluid mb-3">
          ${rate(el, el)}
          ${contents()}
          ${buttons()}
      </div>
      ${off((el + 1) * 10)}
    </div>`;
    });
});
