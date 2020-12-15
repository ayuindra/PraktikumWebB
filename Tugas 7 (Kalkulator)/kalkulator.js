var bil1;
var bil2;
var hitung;
var operasi;
var operasi2 = false;

function btn(bilangan) {
	var tampil = document.getElementById("hasil").value;
	if(tampil == "0") {
		tampil = bilangan; 
    } 
    else {
		tampil += bilangan;
	}
	document.getElementById("hasil").value = tampil;
}
 
function hapus() {
	document.getElementById("hasil").value = "0";
	bil1 = 0;
	bil2 = 0;
	operasi2 = false;
}
 
function koma() {
	var tampil = document.getElementById("hasil").value;
	if(tampil.includes(".") == false) {
		tampil += ".";
	}
	document.getElementById("hasil").value = tampil;	
}
 
function btn_operasi(o) {
	operasi2 = true;
	bil1 = parseFloat(document.getElementById("hasil").value);
	operasi = o;
	document.getElementById("hasil").value = "0";
}
 
function hasil_hitung() {
	if(operasi2 == true) {
		bil2 = parseFloat(document.getElementById("hasil").value);
		switch(operasi){
			case 1 :
				hitung = bil1 + bil2;
				document.getElementById("hasil").value = hitung;			
				break;
			case 2 :
				hitung = bil1 - bil2;
				document.getElementById("hasil").value = hitung;
				break;
			case 3 :
				hitung = bil1 * bil2;
				document.getElementById("hasil").value = hitung;
				break;
			case 4 :
				hitung = bil1 / bil2;
				document.getElementById("hasil").value = hitung;
				break;
		}
		operasi2 = false
		hitung = 0;
		bil1 = 0;
		bil2 = 0;
	}
}