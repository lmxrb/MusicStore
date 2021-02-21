var on = false;
var hasAlbum = false;

//Limpar cache da session
sessionStorage.setItem("addedRows", "");
sessionStorage.setItem("amounts", "");

var addedRows = [];
var invisible = [];
var amounts = [];
var money = 0.00;
const genders = [];
const years = [];
const albumNames = [];
const albumPrices = [];
const singers = [];
const table = document.getElementById("table").cloneNode(true);
const allAlbums = [];
let albumAmount = 0;

for(let i = 0; i < table.lastChild.children.length; i++){
    albumAmount += table.lastChild.children.item(i).childElementCount;
}

for(let i = 1; i <= albumAmount; i++){
    allAlbums.push(document.getElementById("btn" + i).parentNode);
}

//Th de cada album
var albumsTh = [];

for(let i = 1; i <= albumAmount; i++){
    albumsTh.push(document.getElementById("btn" + i).parentNode);

}

for(let i = 0; i < albumAmount; i++){
    albumNames.push(albumsTh[i].children.item(1).innerHTML);
    singers.push(albumsTh[i].children.item(2).innerHTML.toLowerCase());
    albumPrices.push(parseInt(albumsTh[i].children.item(3).innerHTML.substring(1)));
    years.push(albumsTh[i].children.item(8).innerHTML);
    genders.push(albumsTh[i].children.item(9).innerHTML);
}

//Função chamada quando se carrega no botao "Adicionar ao carrinho"
function addToCart(elementId) {
    //Id da musica
    const id = parseInt(elementId.slice(3));
    //Quantidade de albuns
    const amount = parseInt(document.getElementById(elementId).parentNode.children.item(4).value);
    if(isNaN(amount) || amount < 0){
        return false;
    }
    //Verificar se algum album ja foi adicionado
    if(hasAlbum){
        //Verificar se este album já foi adicionado
        if(!(addedRows.includes(id)) && amount !== 0) {
            //Clonar o div anterior e alterar os valores para os do novo album
            const row = document.getElementById("Lista 1").cloneNode(true);
            row.id = "Lista " + (addedRows.length + 1);
            row.children.item(0).textContent = albumNames[id - 1];
            row.children.item(1).textContent = amount + "x \u00A0\u00A0" + albumPrices[id-1] + " €";
            row.children.item(2).src = "img/alb" + id + ".jpg";
            //Adicionar ao total
            money += amount * parseInt(albumPrices[id-1]);
            updateTotal();
            if(on){
                row.children.item(2).style.display="block";
                row.children.item(3).style.display="block";
            }
            else{
                invisible.push(row);
            }
            //Adicionar o album ao carrinho
            document.getElementById("dropdown").insertBefore(row, document.getElementById("total"));
            //Adicionar o album ao array que guarda os que já foram adicionados para o if statement acima
            addedRows.push(id);
            amounts.push(amount);
        }
        else{
            const previousAmount = amounts[addedRows.indexOf(id)];
            if(previousAmount !== amount){
                document.getElementById("Lista " + (addedRows.indexOf(id) + 1)).children.item(1).textContent = amount + "x \u00A0\u00A0\u00A0" + albumPrices[id-1] + " €";
                if (amount === 0){
                    trash(document.getElementById("Lista " + (addedRows.indexOf(id) + 1)).children.item(3));
                }
                else{
                    amounts[addedRows.indexOf(id)] = amount;
                    money += (amount - previousAmount) * albumPrices[id-1];
                }
                updateTotal();
            }
        }
    }
    //Caso não tenha adicionado nenhum album
    else{
        if(amount === 0){
            return false;
        }
        const row = document.getElementById("dropdown").children.item(0);
        row.style.minHeight="70px";
        row.style.maxHeight="85px";
        row.style.display="block";
        row.children.item(0).textContent = albumNames[id - 1];
        row.children.item(0).style.width="";
        row.children.item(1).textContent = amount + "x \u00A0\u00A0" + albumPrices[id-1] + " €";
        row.children.item(2).src = albumsTh[id-1].children.item(0).src;
        row.children.item(3).src = "img/trash.png";
        //Adicionar ao total
        money += amount * parseInt(albumPrices[id-1]);
        if(on){
            row.children.item(2).style.display="block";
            row.children.item(3).style.display="block";
        }
        else{
            invisible.push(row);
        }
        addedRows.push(id);
        amounts.push(amount);
        hasAlbum = true;
    }
    updateTotal();
    return false;
}



function updateTotal() {
    if (isNaN(money)) money = 0;
    document.getElementById("soma").textContent = "Total: " + money + " €";
}

//Função chamada quando se carrega no carrinho
function onCartClick() {
    const dropdown = document.getElementById("dropdown");
    //Se estiver aberto, esconder
    if(on){
        on = false;
        dropdown.style.display = "none";
        dropdown.style.opacity = "0";
    }
    //Se estiver escondido, ficar visivel
    else{
        dropdown.style.display = "block";
        dropdown.style.opacity = "1";
        on = true;
        if(invisible.length > 0){
            for(var idx = 0; idx <= invisible.length - 1; idx++){
                invisible[idx].children.item(2).style.display="block";
                invisible[idx].children.item(3).style.display="block";
            }
            invisible = [];
        }
    }
}

//Funcao para remover album do carrinho
function trash(element) {
    const id = element.parentNode.children.item(2).attributes.getNamedItem("src").nodeValue;
    const idInt = parseInt(id.slice(7).slice(0,-4));
    const index = addedRows.indexOf(idInt);
    const amount = amounts[index];
    //Reduzir preço total
    money -= amount * parseInt(albumPrices[idInt-1]);
    updateTotal();
    //Se não houver mais albuns a remover deixar um em branco para ser clonado
    if(element.parentNode.parentNode.childElementCount <= 5){
        element.parentNode.style.minHeight="10px";
        element.parentNode.style.maxHeight="10px";
        element.parentNode.children.item(0).textContent = "";
        element.parentNode.children.item(0).style.width = "320px";
        element.parentNode.children.item(1).textContent = "";
        element.parentNode.children.item(2).src = "";
        element.parentNode.children.item(2).style.display = "none";
        element.parentNode.children.item(3).src = "";
        element.parentNode.children.item(3).style.display = "none";
        hasAlbum = false;
    }
    else {
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
    amounts.splice(index, 1);
    addedRows.splice(index, 1);
    return false;
}

function finishOrder(){
    if(addedRows.length < 1){
        return false;
    }
    /*
    Provavelmente impossivel
    if(sessionStorage.getItem("userid") == null){
        window.alert("User is not logged in!");
        return false;
    }*/
    sessionStorage.setItem("addedRows", JSON.stringify(addedRows));
    sessionStorage.setItem("amounts", JSON.stringify(amounts));
    sessionStorage.setItem("albumNames", JSON.stringify(albumNames));
    sessionStorage.setItem("albumPrices", JSON.stringify(albumPrices));
    window.location.replace("./compra.php");
}

function onFilter(inputField){
    let newRows = [];
    const search = inputField.value;
    for(let i in albumNames){
        if(albumNames[i].toLowerCase().includes(search)){
            newRows.push(parseInt(i));
        }
    }
    for(let i in singers){
        //console.log(i);
        if(singers[i].toLowerCase().includes(search)){
            if(!newRows.includes(parseInt(i))){
                newRows.push(parseInt(i));
            }
        }
    }
    for(let i in genders){
        if(genders[i].toLowerCase().includes(search)){
            if(!newRows.includes(parseInt(i))){
                newRows.push(parseInt(i));
            }
        }
    }
    for(let i in years){
        if(years[i].toLowerCase().includes(search)){
            if(!newRows.includes(parseInt(i))){
                newRows.push(parseInt(i));
            }
        }
    }
    var deletedRows = [];
    /*
    for(let k = 0; k <= albumAmount - 1; k++){
        if(!(newRows.includes(k))){
            //deletedRows.push(k+1);
            document.getElementById("btn" + (k+1)).parentNode.style.display="none";
        }
        else{
            document.getElementById("btn" + (k+1)).parentNode.style.display="";
        }
    }*/
    newTable(newRows);
    if(search === ""){
        for(let k = 0; k <= albumAmount - 1; k++){
            document.getElementById("btn" + (k+1)).parentNode.style.display="";
        }
        deletedRows = [];
        newRows = [];
        return;
    }
}

function newTable(newRows){
    //esvazia a tabela
    var newTable = document.getElementById("table");
    newTable.innerHTML = document.createElement("table").innerHTML;
    const visiveis = newRows.length;
    newRows.sort(function(a, b){
        return a - b;
    });
    //linhas inteiras
    let added = 0;
    for(let i = 1; i <= Math.floor(visiveis/4); i++){
        let row = document.createElement("tr");
        for(let j = (i-1) * 4; j < i*4; j++){
            //document.getElementById("btn" + (newRows[j] + 1)).parentNode
            row.appendChild(allAlbums[newRows[added]]);
            added++;
        }
        newTable.appendChild(row);
    }
    let row = document.createElement("tr");
    for(let i = added; i < visiveis; i ++){
        row.appendChild(allAlbums[newRows[added]]);
        added++;
    }
    if(row.childElementCount > 0){
        newTable.appendChild(row);
    }
}