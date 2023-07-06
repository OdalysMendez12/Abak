'use strict'
const marcas = document.querySelector('.marcas')
const punto = document.querySelectorAll('.punto')
punto.forEach((cadaPunto, i) => {
    punto[i].addEventListener('click', () => {
        let posicion = i
        let operacion = posicion * -33.3
        marcas.style.transform = `translateX(${operacion}%)`
        punto.forEach((cadaPunto, i) => {
            punto[i].classList.remove('activo')
        })
        punto[i].classList.add('activo')

    })
})