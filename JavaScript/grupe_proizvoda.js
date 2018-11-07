function grupe_proizvoda() 
{
	if (document.getElementById('gru_pro').className == "dropdown") 
		{
			document.getElementById('gru_pro').className = "dropdown open";
			document.getElementById('os').className = "dropdown";
			document.getElementById('proizvo').className = "dropdown";
			document.getElementById('prilozi').className = "dropdown";
			document.getElementById('pro').className = "dropdown";
		} 
	else
		{document.getElementById('gru_pro').className = "dropdown"}					
}
function ostali() 
{
		if (document.getElementById('os').className == "dropdown") 
		{
			document.getElementById('os').className = "dropdown open";
			document.getElementById('gru_pro').className = "dropdown";
			document.getElementById('proizvo').className = "dropdown";
			document.getElementById('prilozi').className = "dropdown";
			document.getElementById('pro').className = "dropdown";
		} 
	else
		{document.getElementById('os').className = "dropdown"}
}
function proizvodaci() 
{
		if (document.getElementById('proizvo').className == "dropdown") 
		{
			document.getElementById('proizvo').className = "dropdown open";
			document.getElementById('gru_pro').className = "dropdown";
			document.getElementById('os').className = "dropdown";
			document.getElementById('prilozi').className = "dropdown";
			document.getElementById('pro').className = "dropdown";
		} 
	else
		{document.getElementById('proizvo').className = "dropdown"}
}

function prilozi () 
{
		if (document.getElementById('prilozi').className == "dropdown") 
		{
			document.getElementById('prilozi').className = "dropdown open";
			document.getElementById('gru_pro').className = "dropdown";
			document.getElementById('os').className = "dropdown";
			document.getElementById('proizvo').className = "dropdown";
			document.getElementById('pro').className = "dropdown";
		} 
	else
		{document.getElementById('prilozi').className = "dropdown"}
}
function proizvodi () {
		if (document.getElementById('pro').className == "dropdown") 
		{
			document.getElementById('pro').className = "dropdown open";
			document.getElementById('gru_pro').className = "dropdown";
			document.getElementById('os').className = "dropdown";
			document.getElementById('proizvo').className = "dropdown";
			document.getElementById('prilozi').className = "dropdown";
		} 
	else
		{document.getElementById('pro').className = "dropdown"}
}