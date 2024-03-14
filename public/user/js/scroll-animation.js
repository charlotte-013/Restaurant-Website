
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    });

    const hiddenElements = document.querySelectorAll(".hidden");
    hiddenElements.forEach((el) => observer.observe(el));

const observer1 = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    });

    const hiddenElements1 = document.querySelectorAll(".right-hidden");
    hiddenElements1.forEach((el) => observer1.observe(el));

const observer2 = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show-vertical");
            }
        });
    });

    const hiddenElements2 = document.querySelectorAll(".top-hidden");
    hiddenElements2.forEach((el) => observer2.observe(el));

const observer3 = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show-vertical");
            }
        });
    });

    const hiddenElements3 = document.querySelectorAll(".bottom-hidden");
    hiddenElements3.forEach((el) => observer3.observe(el));
