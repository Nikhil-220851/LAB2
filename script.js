document.addEventListener("DOMContentLoaded", () => {

  document.querySelectorAll('.mail').forEach(mail => {
    mail.addEventListener('click', () => {
      mail.classList.remove('unread');
    });
  });

  document.querySelectorAll('.sidebar li').forEach(item => {
    item.addEventListener('click', () => {
      document.querySelector('.active')?.classList.remove('active');
      item.classList.add('active');
    });
  });

  const menuBtn = document.getElementById("menuBtn");
  const sidebar = document.getElementById("sidebar");

  if (menuBtn && sidebar) {
    menuBtn.addEventListener("click", () => {
      console.log("Menu Clicked");
      sidebar.classList.toggle("minimized");
    });
  }

});

document.querySelectorAll('.mail-star').forEach(star => {
  star.addEventListener('click', (e) => {
    e.stopPropagation(); // prevent mail click
    star.classList.toggle('active');

    if (star.classList.contains('active')) {
      star.classList.replace('fa-regular', 'fa-solid');
    } else {
      star.classList.replace('fa-solid', 'fa-regular');
    }
  });
});