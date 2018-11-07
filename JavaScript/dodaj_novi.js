
function btnSlike (br) 
{
	br++;
	document.getElementById('btn').remove();
	thisOne = document.getElementById("slike");
	items = thisOne.getElementsByTagName("input");
	 x = items.length;
	var btn = '<input onclick="btnSlike(' + br + ')" type="button" value="+" id="btn" style="height:40; width: 40px;">';	
	document.getElementById('slike').innerHTML =  document.getElementById('slike').innerHTML + '<input type="file" name="slika' + br + '">' + btn;
	document.getElementById('br').value = x;
}
function error() 
{
	document.getElementById('err').innerHTML = "Barcode i ponovljeni Barcode se ne poklapaju.";
}
function function_b() {
	document.getElementById('txt').innerHTML = document.getElementById('txt').innerHTML + 'asdasd<b></b>';
}