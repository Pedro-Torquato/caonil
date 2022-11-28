<!-- <style>
    
*{
	padding: 0;
	margin: 0;
	text-decoration: none;
	list-style: none;
	box-sizing: border-box;
}

body {
	font-family: montserrat;
	background: url("https://iili.io/HHxH1Gp.png");
}

nav {
	background: #1abc9c;
	height: 80px;
	width: 100%;	
}

.logo {
	color: white;
	font-size: 30px;
	padding: 0 10px;
	font-weight: bold;
}

nav ul li {
	display: inline-block;
	margin: 0 5px;
}

nav ul li a {
	color: white;
	font-size: 17px;
	padding: 7px 13px;
	border-radius: 3px;
	text-transform: uppercase;
}

a.active, a:hover {
	background: #0c6957;
	transition: 0.5s;
	color: #fff;
}

#check {
	display: none;
}
@media (max-width: 952px){
	label.logo{
		font-size: 30px;
		padding-left: 50px;
	}
	nav ul li a{
		font-size: 16px;
	}
}
@media (max-width: 858px){
	.checkbtn {
		display: block;
	}
	ul{
		position: fixed;
		width: 100%;
		height: 100vh;
		background: #1d075f;
		top: 80px;
		left: -100%;
		text-align: center;
		transition: all .5s;
		
	}
	nav ul li{
		display: block;
		margin: 50px 0;
		line-height: 30px;
		
	}
	nav ul li a {
		font-size: 20px;
	}
	a:hover, a.active {
		background: none;
		color: #5434af;
	}
	#check:checked ~ ul {
		left: 0;
	}
}
label{
	display: inline-block;
}

.cadastro{
	background-color:  #1abc9c;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	padding: 80px;
	border-radius: 10px;
	color: #fff;
}

input{
	border-radius: 10px;
	padding: 8px;
	border: none;
	font-size: 15px;
	display: block;
	width: 13em;
}

button:hover{
	background-color: deepskyblue;
	cursor: pointer;
}
</style> -->

<style>
	* {
		padding: 0;
		margin: 0;
		text-decoration: none;
		list-style: none;
		box-sizing: border-box;
	}

	@font-face {
		font-family: YuseiMagic;

		/*Caso a fonte esteja na mesma pasta*/
		src: url("<?= base_url('img/YuseiMagic-Regular.ttf ') ?>");
	}

	body {
		font-family: montserrat;
	}

	nav {
		background: #1abc9c;
		height: 80px;
		width: 100%;
	}

	label.logo {
		font-family: YuseiMagic;
		color: white;
		font-size: 35px;
		line-height: 80px;
		padding: 0 100px;
		font-weight: bold;
	}

	nav ul {
		float: right;
		margin-right: 20px;
	}

	nav ul li {
		display: inline-block;
		line-height: 80px;
		margin: 0 5px;
	}

	nav ul li a {
		color: white;
		font-size: 17px;
		padding: 7px 13px;
		border-radius: 3px;
		text-transform: uppercase;
	}

	a.active,
	a:hover {
		background: #0c6957;
		transition: .5s;
	}

	.checkbtn {
		font-size: 30px;
		color: white;
		float: right;
		line-height: 80px;
		margin-right: 40px;
		cursor: pointer;
		display: none;
	}

	#check {
		display: none;
	}

	@media (max-width: 952px) {
		label.logo {
			font-size: 30px;
			padding-left: 50px;
		}

		nav ul li a {
			font-size: 16px;
		}
	}

	@media (max-width: 858px) {
		.checkbtn {
			display: block;
		}

		ul {
			position: fixed;
			width: 100%;
			height: 100vh;
			background: #1d075f;
			top: 80px;
			left: -100%;
			text-align: center;
			transition: all .5s;
		}

		nav ul li {
			display: block;
			margin: 50px 0;
			line-height: 30px;
		}

		nav ul li a {
			font-size: 20px;
		}

		a:hover,
		a.active {
			background: none;
			color: #5434af;
		}

		#check:checked~ul {
			left: 0;
		}
	}

	label {
		display: inline-block;
	}

	div {
		background-color: #1abc9c;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		padding: 80px;
		border-radius: 15px;
		color: #fff;
	}

	input {
		margin-right: 5px;
		padding: 15px;
		border: none;
		outline: none;
		font-size: 15px;
		display: block;
	}

	button {

		background-color: dodgerblue;
		border: none;
		padding: 15px;
		width: 100%;
		border-radius: 10px;
		color: white;
		font-size: 15px;

	}

	button:hover {
		background-color: deepskyblue;
		cursor: pointer;
	}

	.search {
		width: 100%;
		position: relative;
		display: flex;
	}

	.searchTerm {
		width: 100%;
		border: 3px solid #1abc9c;
		border-right: none;
		padding: 5px;
		height: 36px;
		border-radius: 5px 0 0 5px;
		outline: none;
		color: #9DBFAF;
	}

	.searchTerm:focus {
		color: #00B4CC;
	}

	.searchButton {
		width: 50px;
		height: 36px;
		border: 1px solid #1abc9c;
		background: #1abc9c;
		text-align: center;
		color: #fff;
		border-radius: 0 5px 5px 0;
		cursor: pointer;
		font-size: 20px;
	}

	/*Resize the wrap to see the search bar change!*/
	.wrap {
		width: 30%;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.card {
	max-width: 300px;
	text-align: center;
	font-family: montserrat;
	margin-right: 50px;
	margin-left: 50px;
  }
  

  .row {
	display: flex;
	justify-content: center;
	align-items: center;
  }
</style>