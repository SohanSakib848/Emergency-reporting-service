
anime({
    targets: '.hero .content',
    translateY: [-50, 0],
    opacity: [0, 1],
    duration: 1000,
    easing: 'easeInOutQuad'
  });
  const btn = document.querySelector(".btn");

btn.addEventListener("click", () => {
    document.body.classList.toggle("active");
});
