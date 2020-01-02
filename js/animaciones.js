// animaciones
const elements = document.querySelectorAll("#animacion");

const callback = (entries, observer) => {
  // console.log(entries); // nos llega solamente un array un elemento

  

  entries.forEach( (entry) => {
    //si la entrada se intersecta y si es la animacion correcta ejecutara eso
    if (entry.isIntersecting && entry.target.dataset.animacion === "img-servicios"){
      entry.target.classList.add("animated", "fadeInLeft");
      observer.disconnect();
    } 
    else if (entry.isIntersecting && entry.target.dataset.animacion === "servicios-texto") {
      entry.target.classList.add("animated", "fadeIn");
      observer.disconnect();
    }
    else if (entry.isIntersecting && entry.target.dataset.animacion === "productos-pyme") {
      entry.target.classList.add("animated", "fadeIn");
      observer.disconnect();
    }
    else if (entry.isIntersecting && entry.target.dataset.animacion === "productos-ph") {
      entry.target.classList.add("animated", "fadeIn", "delay-05s");
      observer.disconnect();
    }
    else if (entry.isIntersecting && entry.target.dataset.animacion === "productos-vip") {
      entry.target.classList.add("animated", "fadeIn", "delay-1s");
      observer.disconnect();
    }

  })

};

// del array de los elementos iteramos cada uno y por cada uno creamos un observador para ese elemento
elements.forEach(element => {

  var options = {
    // root: ,
    rootMargin: "0px 0px 0px 0px",
    threshold: .35
  };

  const observer = new IntersectionObserver(callback, options);
  observer.observe(element);
   
});