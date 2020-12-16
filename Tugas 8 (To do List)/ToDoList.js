function Tambah(formID, tabelID) {              
    var tabel = document.getElementById(tabelID);
    var form = document.forms[formID];
    var hitung_baris = tabel.rows.length;
    var baris = tabel.insertRow(hitung_baris);                
    var kolom1 = baris.insertCell(0);
    var element1 = document.createElement("input");
        element1.type = "checkbox";
        element1.name = "chkbox";
        kolom1.appendChild(element1);
    var kolom2 = baris.insertCell(1);
        kolom2.innerHTML = form.elements['kata'].value;
    ClearText();            
}

function Hapus(tabelID) {
    var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
    try {
        var tabel = document.getElementById(tabelID);
        var hitung_baris = tabel.rows.length;
        for (var i = 0; i < hitung_baris; i++) {
            var baris = tabel.rows[i];
            var chkbox = baris.cells[0].childNodes[0];
            var a = 0;
            if (null != chkbox && true == chkbox.checked) {
                a++;
                if(tanya == true){
                  tabel.deleteRow(i);
                  hitung_baris--;
                  i--;
                }
                else if(a == hitung_baris){
                  tabel.deleteRow(i);
                  hitung_baris--;
                  i--;
                }
            }
        }
    } catch(e) {
        alert(e);
    }
}

function ClearText(){
  document.getElementById("kata").value= '';
}

 function SelectAll(){
  var items = document.getElementsByName('chkbox');
  for(var i=0; i<items.length; i++){
    if(items[i].type=='checkbox'){
      items[i].checked=true;
    }
  }
}

function UnSelectAll(){
  var items = document.getElementsByName('chkbox');
  for(var i=0; i<items.length; i++){
    if(items[i].type=='checkbox'){
      items[i].checked=false;
    }
  }
}

  