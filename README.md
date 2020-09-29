# QCLabDB

Helpfile for DB

Here is a breakdown of the key files used for the Database:


How to set up the SQL DB:

	This setup is configured primarily to use CSV files, but can additionally utilize SQL with either MySQL or MariaDB. This system has been more extensively utilized with MariaDB due to speed advantages. 

	To set up this database, bring up an SQL prompt and type in the following:
	"CREATE DATABASE images;"
	Then type in:
	"CREATE TABLE image_upload (
	    column1 ID,
	    column2 Brunno,
	    column3 Date,
	    column4 Genotype,
	    column5 Sex,
	    column6 Age
	);

	This creates a new database and a new datatable associated with the files. These files are also configured for user: "root" and password: "". 

	These can be modified in the individual files, as most mysqli_connect() functions are at the very beginning of the code, but this is not recommended. Chaning the password for user "root" to "" should suffice for ensured connection.

How to set up Neuroglancer
	
	Neuroglancer is a WebGL-based NIFTI image viewer Google. There are two primary ways of displaying files on Neuroglancer:

	1. Using a precomputed file: 
		By following the instructions laid out here, https://bit.ly/3ks56CV, and upload the files to a hosting site that can be pointed directly to by Neuroglancer.

	2. Using a Python Script:
		A Google-based Python script can be implemented if your server is configured with Python 3.8 and bash shell. 

		Step 1: Download and Update Anaconda 
			Download:
				>curl -O https://repo.anaconda.com/archive/Anaconda3-2019.03-Linux-x86_64.sh
				>bash Anaconda3-2019.03-Linux-x86_64.sh

			Update:
				>conda update --update-all
				>conda update anaconda

		Step 2: Create New Environment for Python 3.8
				>conda create -n py38 python=3.8 anaconda
				>conda activate py38

		Step 3: Configure Bash
				>curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash

		Step 4: Install Neuroglancer
				>python -m pip install neuroglancer

		Step 5: Activate Neuroglancer
				>cd ~/anaconda/envs/py38/lib/python3.8/site-packages/neuroglancer/
				>cd ~/anaconda/envs/py38/lib/python3.8/site-packages/neuroglancer/
				>python server.py
				>python test_ng.py

Other items for setup

	Make sure you have the space necessary to hold the NIFTI images associated with the DB. This DB could be gigabytes in size if it is allowed to by virtue of the size of individual files. Make sure you consider this and optimize your database as you see fit for potential speed improvements


Basic Operation
	
	Four Buttons line the top of the webpage: Home, Upload, View, and How To

	Home takes you to the landing page, which contains a series of buttons allowing the user to select any collection of data matching a given parameter to display. (i.e. every image of a certain gender or genotype)

	Upload allows users to upload both CSV files and NIFTI images as well as indiviual NIFTI files with associated data.

	View launches the viewer and allows users to view all of the uploaded images. On this page, a neuroglancer instance displaying the uploaded images can be launched. The NIFTI image can be downloaded from this page as well. 

	How To shows instructions on how to properly operate the database.


Files used in Database
	
	*_show.php, more_read_csv.php: reads csv into viewer and allows for downloading

	index.html: landing page

	instructions.html: how to page
