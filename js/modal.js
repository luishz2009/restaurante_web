let imagenes = document.querySelectorAll('.galeria_img');   /* con querySelectorAll voy a obtener todas las imágenes
                                                                que estén en la clase galeria_img */
let modal = document.querySelector('#modal');               /* con querySelector obtengo el elemento que tenga el id = modal */
let img = document.querySelector('#modal_img');             /* obtengo el elemento que tenga el id = modal_img */
let boton = document.querySelector('#modal_boton');         /* obtengo el elemento que tenga el id = modal_boton */

/* Vamos a hacer un recorrido por c/u de las imágenes con un for */
for(let i=0; i < imagenes.length; i++){
    imagenes[i].addEventListener('click', function(e){   /* c/vez que le dé click a una imagen va a ejecutar una función */
        modal.classList.toggle("modal-open");           /* Al elemento modal se le agrega la clase modal-open para que el modal se muestre. 
                                                            No se agrega el punto en el paréntesis porque ya estoy diciendo que es una clase
                                                            con el classList y toggle es para abrir y cerrar el modal */

        let src = e.target.src;                         /* e.target toma la ruta de la imagen que es src y la guarda en esa variable */
        img.setAttribute("src",src);                    /* al elemento img le paso el atributo src que está en la variable src */        

    });
}
boton.addEventListener('click', function(){
    modal.classList.toggle("modal-open");               /* Para que al darle click al boton se cierre el modal (con toggle lo cierro) */
});