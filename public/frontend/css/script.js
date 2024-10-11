$(document).ready(function () {
    if ($(window).width() > 991){
    $('.navbar-light .d-menu').hover(function () {
            $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
        }, function () {
            $(this).find('.sm-menu').first().stop(true, true).delay(120).slideUp(100);
        });
        }
});

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
  

$(".filter a").click(function (e) {
    e.preventDefault();
    var a = $(this).attr("href");
    a = a.substr(1);
    $(".sets a").each(function () {
      if (!$(this).hasClass(a) && a != "") $(this).addClass("hide");
      else $(this).removeClass("hide");
    });



// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("btncontainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    var current = document.getElementsByClassName("btn-active");
    current[0].className = current[0].className.replace(" btn-active", "");
    this.className += " btn-active";

}
});


let imgs = document.querySelectorAll("a img");
  let count;
  imgs.forEach((img, index) => {
    img.addEventListener("click", function (e) {
      if (e.target == this) {
        count = index;
        let openDiv = document.createElement("div");
        let imgPreview = document.createElement("img");
        let butonsSection = document.createElement("div");
        butonsSection.classList.add("butonsSection");
        let closeBtn = document.createElement("button");
        let nextBtn = document.createElement("button");
        let prevButton = document.createElement("button");
        prevButton.innerText = "Previous";
        nextBtn.innerText = "Next";

        nextBtn.classList.add("nextButton");
        prevButton.classList.add("prevButton");
        nextBtn.addEventListener("click", function () {
          if (count >= imgs.length - 1) {
            count = 0;
          } else {
            count++;
          }

          imgPreview.src = imgs[count].src;
        });

        prevButton.addEventListener("click", function () {
          if (count === 0) {
            count = imgs.length - 1;
          } else {
            count--;
          }

          imgPreview.src = imgs[count].src;
        });

        closeBtn.classList.add("closeBtn");
        closeBtn.innerText = "Close";
        closeBtn.addEventListener("click", function () {
          openDiv.remove();
        });

        imgPreview.classList.add("imgPreview");
        imgPreview.src = this.src;

        butonsSection.append(prevButton, nextBtn);
        openDiv.append(imgPreview, butonsSection, closeBtn);

        openDiv.classList.add("openDiv");

        document.querySelector("body").append(openDiv);
      }
    });
  });
  
  const checkbox = document.querySelector('.my-form input[type="checkbox"]');
const btns = document.querySelectorAll(".my-form button");

// checkbox.addEventListener("change", function() {
//   const checked = this.checked;
//   for (const btn of btns) {
//     checked ? (btn.disabled = false) : (btn.disabled = true);
//   }
// });