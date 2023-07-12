// Carrinho
let cartIcon = document.querySelector("#Cart-Icon");
let cart = document.querySelector(".cart");
let closecart = document.querySelector("#close-cart");
//Abrir Carrinho
cartIcon.onclick = () =>{
    cart.classList.add("active");
};
//Fechar Carrinho
closecart.onclick = () =>{
    cart.classList.remove("active");
};

//carrinho funcionando JS
if (document.readyState == "loading"){
    document.addEventListener("DOMContentLoaded", ready);
}else{
    ready();
}

// Realização da função
function ready(){
    //Remover Itens do Carrinho
    var removeCartButtons = document.getElementsByClassName("cart-remove");
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i];
        button.addEventListener("click", removeCartItem);
    }
    //Mudar a Quantidade
    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < removeCartButtons.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    //Adicionar para o Carrinho
    var addCart = document.getElementsByClassName("add-cart");
    for (var i = 0; i < addCart.length; i++){
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    } 
    // Configuração do botão de finalizar
    document
    .getElementsByClassName("btn-buy")[0]
    .addEventListener("click", buyButtonClicked);
}
//Botão de Finalizar
function buyButtonClicked(){
    alert("Seu Pedido foi Registado com Susesso!");
    var cartContent = document.getElementsByClassName("cart-content")[0];
    while (cartContent.hasChildNodes()){
        cartContent.removeChild(cartContent.firstChild);
    }
    update();
}
//Remover Itens do Carrinho
function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    update();
}
//Mudaças na Quantidade
function quantityChanged(event){
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }   
    update();
}
//Adicionar para o Carrinho
function addCartClicked(event){
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName("product-title")[0].innerText;
    var productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    addProducToCart(title, productImg);
    update();
}
function addProducToCart(title, productImg){
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add("cart-box");
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    for (var i = 0; i < cartItemsNames.length; i++){
      if (cartItemsNames[i].innerText == title) {
        alert("Este item já esta no seu carrinho");
        return;
    }
}

var cartBoxContent = `
                       <img src="${productImg}" alt="" class="cart-img">                   
                        <div class="detail-box">
                        <div class="cart-product-title">${title}</div>
                        <input type="number" value="1" class="cart-quantity">
                      </div>
                      <!--Remover Carrinho-->
                      <i class="bx bx-trash cart-remove"></i>`;

cartShopBox.innerHTML = cartBoxContent;
cartItems.append(cartShopBox);
cartShopBox
    .getElementsByClassName("cart-remove")[0]
    .addEventListener("click", removeCartItem);
cartShopBox
    .getElementsByClassName("cart-quantity")[0]
    .addEventListener("change", quantityChanged);

//Atualizar
function update(){
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
for (var i = 0; i < cartBoxes.length; i++){
var cartBox = cartBoxes[i];
var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
var quantity = quantityElement.value;
total = total * quantity;

}
}
}

let subMenu = document.getElementById("subMenu");
function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}