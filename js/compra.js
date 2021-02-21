var addedRows = JSON.parse(sessionStorage.getItem("addedRows"));
var amounts = JSON.parse(sessionStorage.getItem("amounts"));
const albumNames = JSON.parse(sessionStorage.getItem("albumNames"));
const albumPrices = JSON.parse(sessionStorage.getItem("albumPrices"));

var total = 0;

const tabela = document.getElementById("tabelaProdutos");

const originalDiv = document.getElementById("row");

originalDiv.children.item(0).children.item(0).textContent = albumNames[addedRows[0] - 1];
originalDiv.children.item(1).children.item(0).textContent = amounts[0] + "x " + "\u00A0"  + "\u00A0" + albumPrices[addedRows[0] - 1] + " €";
originalDiv.children.item(2).children.item(0).src = "img/alb" + (addedRows[0]) + ".jpg";
total += amounts[0] * albumPrices[addedRows[0] - 1];

function addRow(id){
    const div = originalDiv.cloneNode(true);
    div.children.item(0).children.item(0).textContent = albumNames[addedRows[id] -1];
    div.children.item(1).children.item(0).textContent = amounts[id] + "x " + "\u00A0"  + "\u00A0" + albumPrices[addedRows[id] - 1] + " €";
    div.children.item(2).children.item(0).src = "img/alb" + (addedRows[id]) + ".jpg";
    total += amounts[id] * albumPrices[addedRows[id] - 1];
    let newRow = tabela.insertRow(-1);
    newRow.style.marginLeft = "95px";
    newRow.appendChild(div.children.item(0));
    newRow.appendChild(div.children.item(0));
    newRow.appendChild(div.children.item(0));
}

if(addedRows.length >= 1) {
    for (var i = 1; i < addedRows.length; i++) {
        addRow(i);
    }
    totalRow = tabela.createTFoot();
    totalRow.textContent = "Total: " + total + " €";
    totalRow.style.fontWeight = "bold";
    totalRow.style.textAlign = "center";
    totalRow.style.fontSize = "24px";
    totalRow.style.height = "70px";
    addedRows.sort((a, b) => a - b);
    console.log(amounts);
    document.getElementById('amounts').value = amounts;
    document.getElementById('total').value = total.toString();
    document.getElementById('albums').value = addedRows.toString();
}

