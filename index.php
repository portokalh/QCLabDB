<html>
<head><title>Choose a Link</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #fff;
}
.topnav a {
  float: left;
  color: #000000; 
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ccc;
  color: black;
}
.topnav a.active {
  background-color: #012169;
  color: white;     
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href=".">Home</a>
  <a href="./upload.php">Upload</a>
  <a href="#contact">View</a>
  <a href="#about">How To</a>
</div>
<div style="padding-left:16px">
  <h2>MRI Image Database</h2>
  <p>Welcome to the Badea lab MRI image database!</p>
</div>
<div style="padding-left:16px">
<table>
	Organize by Genotype:
	<tr>
		<td><a href="./more_read_csv.php?genotype=APOE44"><button>APOE44</button></a></td>
		<td><a href="./more_read_csv.php?genotype=APOE33"><button>APOE33</button></a></td>
		<td><a href="./more_read_csv.php?genotype=APOE22"><button>APOE22</button></a></td>
		<td><a href="./more_read_csv.php?genotype=APOE2"><button>APOE2</button></a></td>
		<td><a href="./more_read_csv.php?genotype=APOE3"><button>APOE3</button></a></td>
		<td><a href="./more_read_csv.php?genotype=CVN"><button>CVN</button></a></td>
		<td><a href="./more_read_csv.php?genotype=HN"><button>HN</button></a></td>
	</tr>
</table>
<table>
	Organize by Gender:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>male</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>female</button></a></td>
	</tr>
</table>
<table>
	With and Without MEMRI in Vevo Images:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>with</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>without</button></a></td>
	</tr>
</table>
<table>
	With and Without Perfusion in Vevo Images:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>with</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>without</button></a></td>
	</tr>
</table>
<table>
	With and Without DWI ex Vevo Images:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>with</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>without</button></a></td>
	</tr>
</table>
<table>
	With and Without GRE ex Vevo Images:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>with</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>without</button></a></td>
	</tr>
</table>
<table>
	MWM Memory Data:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>yes</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>no</button></a></td>
	</tr>
</table>
<table>
	Olfactory Memory Data:
	<tr>
		<td><a href="./more_age_csv.php?gender=0"><button>yes</button></a></td>
		<td><a href="./more_age_csv.php?gender=1"><button>no</button></a></td>
	</tr>
</table>
</div>
</body>
</html>