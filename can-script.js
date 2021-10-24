// var qui va contenir les produit
var products;

// ajout du fichier json dans la var product 
// fetch pour eviter les erreur
fetch('produits.json').then(function (response) {
  if (response.ok) {
    response.json().then(function (json) {
      products = json;
      initialize();
    });
  } else {
    console.log('Network request for products.json failed with response ' + response.status + ': ' + response.statusText);
  }
});

// fonction principal
function initialize() {
  // mise en var des element modifiable(filtre) du site
  var category = document.querySelector('#category');
  var nutriscore = document.querySelector('#nutriscore');
  var searchTerm = document.querySelector('#searchTerm');
  var searchBtn = document.querySelector('button');
  var main = document.querySelector('main');

  var lastCategory = category.value;
  var lastnutriscore = nutriscore.value;
  var lastSearch = '';
  var categoryGroup = [];
  var finalGroup = [];
  finalGroup = products;

  updateDisplay();

  //au click du bonton afficher 
  searchBtn.onclick = selectCategory; 
  //ont met dans categoryGroup les element dans les condition des filtre
  function selectCategory(e) {
    e.preventDefault();
    categoryGroup = [];
    finalGroup = [];

      lastnutriscore = nutriscore.value
      lastCategory = category.value;
      lastSearch = searchTerm.value.trim();

      var lowerCaseType = category.value.toLowerCase();
      for (var i = 0; i < products.length; i++) {
        if (products[i].type === lowerCaseType || category.value === 'Tous') {
          if (products[i].nutriscore === lastnutriscore || lastnutriscore === 'Tous'){
            categoryGroup.push(products[i]);
          }
        }
      }
        selectProducts();
  }

  // semi-inutile qui renvois vers updateDisplay pour les afficher
  function selectProducts() {
    if (searchTerm.value.trim() === '') {
      finalGroup = categoryGroup;
      updateDisplay();
    } else {
      var lowerCaseSearchTerm = searchTerm.value.trim().toLowerCase();

      for (var i = 0; i < categoryGroup.length; i++) {
        if (categoryGroup[i].nom.indexOf(lowerCaseSearchTerm) !== -1) {
          finalGroup.push(categoryGroup[i]);
        }
      }
      updateDisplay();
    }
  }

  // vide les produit afficher puis envois des nouveau elements vers showProduct
  function updateDisplay() {
    while (main.firstChild) {
      main.removeChild(main.firstChild);
    }

    if (finalGroup.length === 0) {
      var para = document.createElement('p');
      para.textContent = 'No results to display!';
      main.appendChild(para);
    } else {
      fisherYatesShuffle(finalGroup)
      for (var i = 0; i < finalGroup.length; i++) {
        showProduct(finalGroup[i]);
      }
    }
  }

  // function melange de tableau
  function fisherYatesShuffle(arr){
    for(var i =arr.length-1 ; i>0 ;i--){
        var j = Math.floor( Math.random() * (i + 1) );
        [arr[i],arr[j]]=[arr[j],arr[i]];
    }
  }

  //function pour ajouter les produit dans le html
  function showProduct(product) {
    //creation des element composant le produit
    var url = 'images/' + product.image;
    var section = document.createElement('section');
    var heading = document.createElement('h2');
    var para = document.createElement('p');
    var image = document.createElement('img');
    var txtnutriscore = document.createElement('h3')
    var nutriscore = document.createElement('span')
    
    section.setAttribute('class', product.type);

    heading.textContent = product.nom.replace(product.nom.charAt(0), product.nom.charAt(0).toUpperCase());

    para.textContent = product.prix.toFixed(2) + ' €';

    image.src = url;
    image.alt = product.nom;

    //mis en couleur selon le nutriscore
    nutriscore.textContent = product.nutriscore
    if (nutriscore.textContent == 'A'){nutriscore.style.backgroundColor = ' #196f3d'}
    else if (nutriscore.textContent == 'B'){nutriscore.style.backgroundColor = '#52be80'}
    else if (nutriscore.textContent == 'C'){nutriscore.style.backgroundColor = ' #f1c40f'}
    else if (nutriscore.textContent == 'D'){nutriscore.style.backgroundColor = '#dc7633'}
    else if (nutriscore.textContent == 'E'){nutriscore.style.backgroundColor = '#c0392b'}
     
    txtnutriscore.textContent = 'Nutriscore : '

    // on ajoute les element du produit dans le html
    main.appendChild(section);
    section.appendChild(heading);
    section.appendChild(para);
    section.appendChild(image);
    section.appendChild(txtnutriscore)
    txtnutriscore.appendChild(nutriscore)
  }
}