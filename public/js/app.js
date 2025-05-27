document.addEventListener("DOMContentLoaded", function () {
  const initSlider = () => {
    const slides = document.querySelectorAll(".hero-slide");
    let currentIndex = 0; // Track the current slide
    const totalSlides = slides.length;

    // Función para mover la diapositiva 
    function moveToSlide(n) {
      slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${-100 * n}%)`;
        if (n === index) {
          slide.classList.add("active");
        } else {
          slide.classList.remove("active");
        }
      });
      currentIndex = n;
    }

    // Función para ir a la siguiente diapositiva
    function nextSlide() {
      if (currentIndex === totalSlides - 1) {
        moveToSlide(0); // Si estás en la última diapositiva, vuelve a la primera
      } else {
        moveToSlide(currentIndex + 1);
      }
    }

    // Función para ir a la diapositiva anterior
    function prevSlide() {
      if (currentIndex === 0) {
        moveToSlide(totalSlides - 1); // Si estás en la primera diapositiva, ve a la última
      } else {
        moveToSlide(currentIndex - 1);
      }
    }

    // al hacer click en el slide derecho, ir a la siguiente diapositiva
    const carouselNextButton = document.querySelector(".hero-slide-next");
    if (carouselNextButton) {
      carouselNextButton.addEventListener("click", nextSlide);
    }
    // al hacer click en el slide izquierdo, ir a la diapositiva anterior
    const carouselPrevButton = document.querySelector(".hero-slide-prev");
    if (carouselPrevButton) {
      carouselPrevButton.addEventListener("click", prevSlide);
    }

    // Iniciar el slider
    moveToSlide(0);
  };

  
  /*Función para mostrar y ocultar según la opción elegida*/
  const initCascadingDropdown = (parentSelector, childSelector) => {
    const parentDropdown = document.querySelector(parentSelector);
    const childDropdown = document.querySelector(childSelector);

    if (!parentDropdown || !childDropdown) return;

    hideModelOptions(parentDropdown.value)

    parentDropdown.addEventListener('change', (ev) => {
      hideModelOptions(ev.target.value)
      childDropdown.value = ''
    });


    
    function hideModelOptions(parentValue) {
      const models = childDropdown.querySelectorAll('option');
      models.forEach(model => {
        if (model.dataset.parent === parentValue || model.value === '') {
          model.style.display = 'block';
        } else {
          model.style.display = 'none';
        }
      });
    }
  }


  // Botón de restablecer para volver a los valores por defecto
    const resetButton = document.querySelector(".btn-find-a-moto-reset");
    const form = document.querySelector(".find-a-moto-form");

    if (resetButton && form) {
      resetButton.addEventListener("click", () => {
        form.reset();
        setTimeout(() => {
          const resetOptions = (selector) => {
            document.querySelectorAll(`${selector} option`).forEach((option) => {
              option.style.display = "block";
            });
          };

          resetOptions("#modeloSelect");
          resetOptions("#ciudadSelect");
        }, 0);
      });
    }
    

    // Function to initialize the sorting dropdown
    const initSortingDropdown = () => {
    const sortingDropdown = document.querySelector('.sort-dropdown');
    if (!sortingDropdown) return;

    // Init sorting dropdown with the current value
    const url = new URL(window.location.href);
    const sortValue = url.searchParams.get('sort');
    if (sortValue) {
      sortingDropdown.value = sortValue;
    }

    sortingDropdown.addEventListener('change', (ev) => {
      const url = new URL(window.location.href);
      url.searchParams.set('sort', ev.target.value);
      window.location.href = url.toString();
    });
  }


   

    const imageCarousel = () => {
      const carousel = document.querySelector('.moto-images-carousel');
      if (!carousel) {
        return;
      }
      const thumbnails = document.querySelectorAll('.moto-image-thumbnails img');
      const activeImage = document.getElementById('activeImage');
      const prevButton = document.getElementById('prevButton');
      const nextButton = document.getElementById('nextButton');
  
  
      let currentIndex = 0;
  
      // Initialize active thumbnail class
      thumbnails.forEach((thumbnail, index) => {
        if (thumbnail.src === activeImage.src) {
          thumbnail.classList.add('active-thumbnail');
          currentIndex = index;
        }
      });
  
      // Function to update the active image and thumbnail
      const updateActiveImage = (index) => {
        activeImage.src = thumbnails[index].src;
        thumbnails.forEach(thumbnail => thumbnail.classList.remove('active-thumbnail'));
        thumbnails[index].classList.add('active-thumbnail');
      };
  
      // Add click event listeners to thumbnails
      thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
          currentIndex = index;
          updateActiveImage(currentIndex);
        });
      });
  
      // Add click event listener to the previous button
      prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
        updateActiveImage(currentIndex);
      });
  
      // Add click event listener to the next button
      nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % thumbnails.length;
        updateActiveImage(currentIndex);
      });
    }
  

    // Function to initialize the image picker
    const initImagePicker = () => {
    const fileInput = document.querySelector("#motoFormImageUpload");
    const imagePreview = document.querySelector("#imagePreviews");
    if (!fileInput) {
      return;
    }
    fileInput.onchange = (ev) => {
      imagePreview.innerHTML = "";
      const files = ev.target.files;
      for (let file of files) {
        readFile(file).then((url) => {
          const img = createImage(url);
          imagePreview.append(img);
        });
      }
    };

    function readFile(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = (ev) => {
          resolve(ev.target.result);
        };
        reader.onerror = (ev) => {
          reject(ev);
        };
        reader.readAsDataURL(file);
      });
    }

    function createImage(url) {
      const a = document.createElement("a");
      a.classList.add("moto-form-image-preview");
      a.innerHTML = `
        <img src="${url}" />
      `;
      return a;
    }
  };



    


  
  initSlider();
  initCascadingDropdown('#fabricanteSelect', '#modeloSelect');
  initCascadingDropdown('#comunidadSelect', '#ciudadSelect');
  imageCarousel();
  initSortingDropdown();
  initImagePicker();

  
  
  /*aparece el título del texto al entrar en la página*/
  ScrollReveal().reveal(".hero-slide.active .hero-slider-title", {
    delay: 200,
    reset: true,
  });

  /*aparece el texto desde abajo al entrar en la página */
  ScrollReveal().reveal(".hero-slide.active .hero-slider-content", {
    delay: 200,
    origin: "bottom",
    distance: "50%",
  });
});
