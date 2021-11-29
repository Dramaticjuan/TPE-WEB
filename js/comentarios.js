"use strict";
window.onload = function(){
const id_libro = document.getElementById("aplicacion").getAttribute("data-id-libro");
const usuario = document.getElementById("dataUsuario").getAttribute("data-usuario");
const is_admin = document.getElementById("dataAdmin").getAttribute("data-admin");

const API_URL = `api/comments/libro/${id_libro}`;

let app = new Vue({
    el: '#aplicacion',
    data: {
        comentarios: [],
        is_admin: is_admin 
    },
    methods: {
        async deleteComment(idComment) {
            fetch("api/comments/" + idComment, {
                method:"DELETE"})
            .then(response => getComments())

            .catch(error => console.log(error));
        }
    }
});



async function getComments() {

    fetch(API_URL)
    .then(response => response.json())
    .then(comments => {
        if (comments != "no existen comentarios"){
            app.comentarios= comments;
    }})
    .catch(error => console.log(error));
}



getComments();

document.getElementById("btn_comment").addEventListener("click", insertComment);

async function insertComment() {

    let content = document.getElementById("content").value;
    let valoracion = document.getElementById("valoracion").value;
    let newComment = {
        comentario: content,
        valoracion: valoracion,
        usuario: usuario,
        id_libro: id_libro
    }
    console.log(JSON.stringify(newComment));
    fetch("api/comments/", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify(newComment)
    })
    .then(response => {
        getComments();
    })
    .catch(error => console.log(error));

}
};