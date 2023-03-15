window.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".header__btn").addEventListener("click", function () {
    document.querySelector(".tender_fence").classList.add("active");
  });
  document.querySelector("#tender_fence .close").addEventListener("click", function () {
    document.querySelector(".tender_fence").classList.remove("active");
  });
  document.querySelector('#tender_fence .black').addEventListener('click', function () {
    document.querySelector(".tender_fence").classList.remove("active");
  });

  document.querySelector(".modal-tender").addEventListener("click", function () {
    document.querySelector(".tender_fence").classList.add("active");
  });
  document.querySelector("#tender_fence .close").addEventListener("click", function () {
    document.querySelector(".tender_fence").classList.remove("active");
  });
  document.querySelector('#tender_fence .black').addEventListener('click', function () {
    document.querySelector(".tender_fence").classList.remove("active");
  });

  document.querySelector(".modal-order").addEventListener("click", function () {
    document.querySelector(".order_fence").classList.add("active");
  });

  document.querySelectorAll(".modal-order-company").forEach(item => item.addEventListener("click", function () {
    document.querySelector(".order_fence").classList.add("active");
  }));

  document.querySelector("#order_fence .close").addEventListener("click", function () {
    document.querySelector(".order_fence").classList.remove("active");
  });
  document.querySelector('#order_fence .black').addEventListener('click', function () {
    document.querySelector(".order_fence").classList.remove("active");
  });


});
