var on = false;
var hasAlbum = false;

const albumNames = ["CHERRY BLOSSOM", "SONHOS DE MENINO", "ACTS OF REBELLION", "POSITIONS", "JOLLY HOLIDAY",
    "BELIEVE", "NOW 105", "COMME AVANT", "LOVE GOES", "POST TRAUMATIC", "HEY CLOCKFACE", "BILLIE"];

const albumPrices = ["14", "15", "12", "16", "23", "16", "22", "15", "16",
    "13", "16", "16"];

var addedRows = [];
var invisible = [];
var money = 0.00;
/*document.getElementById("dropdown-cart").appendChild(row);*/

//Função chamada quando se carrega no botao "Adicionar ao carrinho"
function addToCart(elementId) {
    //Id da musica
    const id = parseInt(elementId.slice(3));
    //Verificar se algum album ja foi adicionado
    if(hasAlbum){
        //Verificar se este album já foi adicionado
        if(!(addedRows.includes(id))) {
            //Clonar o div anterior e alterar os valores para os do novo album
            const row = document.getElementById("Lista 1").cloneNode(true);
            row.id = "Lista " + id;
            row.children.item(0).textContent = albumNames[id - 1];
            row.children.item(1).textContent = "\u00A0\u00A0\u00A0" + albumPrices[id-1] + " €";
            row.children.item(2).src = "imgs/alb" + id + ".jpg";
			//Adicionar ao total
			money += parseInt(albumPrices[id-1]);
			console.log(money);
			updateTotal();
			if(on){
				row.children.item(2).style.visibility="visible";
				row.children.item(3).style.visibility="visible";
			}
			else{
				invisible.push(row);
			}
            //Adicionar o album ao carrinho
            document.getElementById("dropdown").insertBefore(row, document.getElementById("total"));
            //Adicionar o album ao array que guarda os que já foram adicionados para o if statement acima
            addedRows.push(id);
        }
    }
    //Caso não tenha adicionado nenhum album
    else{
        const row = document.getElementById("dropdown").children.item(0);
        row.style.minHeight="70px";
        row.style.maxHeight="70px";
        row.children.item(0).textContent = albumNames[id - 1];
        row.children.item(0).style.width="";
        row.children.item(1).textContent = "\u00A0\u00A0\u00A0" + albumPrices[id-1] + " €";
        row.children.item(2).src = "imgs/alb" + id + ".jpg";
        row.children.item(3).src = "imgs/trash.png";
		//Adicionar ao total
		money += parseInt(albumPrices[id-1]);
		if(on){
			row.children.item(2).style.visibility="visible";
			row.children.item(3).style.visibility="visible";
		}
		else{
			invisible.push(row);
		}
        addedRows.push(id);
        hasAlbum = true;
    }
	updateTotal();
    return false;
}


function updateTotal() {
	document.getElementById("soma").textContent = money + " €";
}

//Função chamada quando se carrega no carrinho
function onCartClick() {
    const dropdown = document.getElementById("dropdown");
    //Se estiver aberto, esconder
    if(on){
        on = false;
        dropdown.style.visibility = "hidden";
        dropdown.style.opacity = "0";
    }
    //Se estiver escondido, ficar visivel
    else{
        dropdown.style.visibility = "visible";
        dropdown.style.opacity = "1";
        on = true;
		if(invisible.length > 0){
			for(var idx = 0; idx <= invisible.length - 1; idx++){
				invisible[idx].children.item(2).style.visibility="visible";
				invisible[idx].children.item(3).style.visibility="visible";
			}
			invisible = [];
		}
    }
}

//Funcao para remover album do carrinho
function trash(element) {
    const id = element.parentNode.children.item(2).attributes.getNamedItem("src").nodeValue;
    const idInt = parseInt(id.slice(8).slice(0,-4));
    //Reduzir preço total
	money -= parseInt(albumPrices[idInt-1]);
	updateTotal();
	//Se não houver mais albuns a remover deixar um em branco para ser clonado
    if(element.parentNode.parentNode.childElementCount <= 5){
        element.parentNode.style.minHeight="10px";
        element.parentNode.style.maxHeight="10px";
        element.parentNode.children.item(0).textContent = "";
        element.parentNode.children.item(0).style.width = "320px";
        element.parentNode.children.item(1).textContent = "";
        element.parentNode.children.item(2).src = "";
		element.parentNode.children.item(2).style.visibility = "hidden";
        element.parentNode.children.item(3).src = "";
		element.parentNode.children.item(3).style.visibility = "hidden";
        hasAlbum = false;
    }
    else {
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
    addedRows.splice(addedRows.indexOf(idInt), 1);
    return false;
}