const addImageFormDeleteLink = (item) => {
  const removeFormButton = document.createElement('button');
  removeFormButton.classList.add("btn", "text-danger", "bt-trash")
  removeFormButton.innerHTML = '<i class="align-middle" data-feather="trash-2">';

  item.append(removeFormButton);

  removeFormButton.addEventListener('click', (e) => {
      e.preventDefault();
      // remove the li for the tag form
      //on supprime la li du boutton parent 
      // item.remove();
      item.parentElement.remove();
  });
}


const addFormToCollection = (e) => {
  //on recupére l'ul qui contient la collection du formualire dynamique
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
  //on crée un li qui contiendra  le prototype du formaulaire
    const item = document.createElement('li');
  //on ajouute dans l'html de la li l'html du prototype de formualire des images conrenu dans l'attribut data prototype
  // de l'ul
  //on remplce les _name_ par le numéro de la collection  (l'attribut data-index)
    item.innerHTML = collectionHolder
      .dataset
      .prototype
      .replace(
        /__name__/g,
        collectionHolder.dataset.index
      );
  //on ajoute un boutton de suppression 
  const container = item.querySelector('.img-form-container')
    addImageFormDeleteLink(container);
  //on ajoute le li au ul
    collectionHolder.appendChild(item);
     //on active feather pour remplacer les balises i  par les icones svg
      //en faisant feather.replace
      feather.replace();
  // on incrémente l'index de la collection (attribut data-index de l'ul )
    collectionHolder.dataset.index++;
  };
// prise en charge du clic sur le boutton d'ajout d'une image
  document
  .querySelectorAll('.add_item_link')
  .forEach(btn => {
      btn.addEventListener("click", addFormToCollection)
  });
  // la mise en place des bouttons de mise en place
  document
    .querySelectorAll('ul.images .img-form-container')
    .forEach((item) => {
      addImageFormDeleteLink(item);
    });
