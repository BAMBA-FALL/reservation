//
const activateSelectImage = (input) => {
    input.addEventListener('change', (e)=>{
        // On récupère l'index de l'image chargée dans l'input de type file
        let file = e.currentTarget.files[0];
        // On mémorise l'élément html qui a été changé
        let item = e.currentTarget; // C'est input de type file qui a été changé
        // Si l'input est peuplé
        if(file){
            // On instancie un objet FileReader
            let reader = new FileReader();
            reader.onload = function(){
                // On met en place l'image dans le DOM html
                // console.log(item.parentElement.previousElementSibling);
                // On crée une variable qui pointe sur le parent (div) dans laquelle on va mettre l'image
                let imgParent = item.parentElement.previousElementSibling;
                // On vérifie si le parent contient déjà la balise img recherchée
                if(imgParent.querySelector('.img-form-livre')){
                    imgParent.querySelector('a').setAttribute("href", reader.result);
                    // imgParent.querySelector('a').setAttribute("data-lightbox", "image");
                    imgParent.querySelector('.img-form-livre').setAttribute("src", reader.result);
                }else{
                    let link = document.createElement('a');
                    link.classList.add('d-block', 'me-3');
                    link.setAttribute("href", reader.result);
                    link.setAttribute("data-lightbox", Date.now());
                    let img = document.createElement('img');
                    img.classList.add('img-fluid', 'img-form-livre');
                    img.setAttribute("src", reader.result);
                    // On ajoute l'image dans le lien
                    link.appendChild(img);
                    // On ajoute le lien dans le parent
                    imgParent.appendChild(link);
                }
            }
            // On lit le contenu du fichier
            reader.readAsDataURL(file);
        }
    });
}

// On récupère tout les input html de type file porteurs de la classe select-image
document.querySelectorAll('.select-image').forEach((item) => {
    // On les active
    activateSelectImage(item);
});