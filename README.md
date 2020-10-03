# PHP Practicas for DWS

## Description

This project was made for class DWS where we work with php. Because we have a lot of exercises I decided to make this webpage where all my practicas from DWS live.

**Features:**

1. Pages are created automatically when visiting the index.php so I dont have to write a bunch of starting code
2. It is easier for the professor because he has all the practicas in one single place which is accessible via the side menu
3. Lastly it is a good practice for me to do so. It is my first time writing php but i've touched alot of subjects like *includes, reading/writing files, creating templates like header and footer*

## How it works

It is important that I document this because if it works nicely I can do this to all my practices that involve exercises inside a website.

### Firstly the folder structure

```bash
.
├── README.md
├── index.php
├── practica_1
│   ├── e1.php
│   ├── e2php
│   ├── e3php
│   ├── e4.php
├── practica_PDFs
│   ├── tema2-practica1.pdf
│   ├── tema2-practica2.pdf
│   ├── tema3-practica1.pdf
│   └── tema3-practica2.pdf
├── practicas.json
├── style.css
└── templates
    ├── createPage.php
    ├── footer.php
    └── header.php
```

### practicas.json

practicas.json is where the informations about practicas live.

Inside it we have an object composed of multiple practicas that look like this

```json
{
  "practica_1": {
    "numberOfExercises": 14
  },
  "practica_2": {
    "numberOfExercises": 8
  }
}
```

This will be parsed into php array and it will automatically create the folders practica_1, practica_2, etc. and inside each of the folder it will create using a boilerplate, simple php filed called e1, e2, e3 ... for n numberOfExdercises

Note: I added an object for each practica in case I will need to add more data. For now, however, the number of exercises is just enough

### index.php

In order to programatically create the files you must visit index.php because that's where the code start from. I still need to find a way to generate the files when the server starts but it is not such a big of a deal since when you visit the server you will instantly go to index.php. 

### header.php and footer.php

They are simply templates that are applyed to every page created automatically and to the index.php

In header we have a navbar where we create dinamically the links to the ejerciciosa. However modifing the practicas will result in fake links that dont have a page generated or if we change the numberOfExercises lower even hide some pages. So be careful with that.

### createPage.php

This is the actual script that creates the pages.