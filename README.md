<!-- logo -->
<p align="center">
  <img width='300' src="src_readme/logo_lol.png">
</p>

<!-- tag line -->
<h3 align='center'> Backend and Frontend League of Legends ! </h3>

<!-- primary badges -------------------------------------->
<p align="center">

  <!-- follow -->
  <img src='https://img.shields.io/github/followers/ManuelCanulDev?label=Follow&style=social&color=%23FFB31A' />
  <!-- Twitter intent -->
</p>

---

<br/>

## Requerimientos

☢ Docker Desktop <a href='(https://docs.docker.com/docker-for-windows/install/' target='_black'> Descarga Aquí </a>

⚡ Docker Compose <a href='(https://docs.docker.com/docker-for-windows/install/' target='_black'> Descarga Aquí </a>

<br/>

## 🌻 Motivación

Lograr la implementación de una `API funcional` en el **backend** y poder usarla en el **front** para el usuario final.

<br/>


## Instalación
Una vez teniendo instalado y configurado el Docker Desktop/Composer en nuestra computadora, clonamos el proyecto a nuestra computadora.
<details>
<summary>
🍭 <strong>Clonar Proyecto desde Github</strong>
<p align='center'>
  <img align='center' src='src_readme/github-icon-white-28.jpg' width='450'/>
</p>
</summary>


<!-- Code -->
```bash
git clone "https://github.com/ManuelCanulDev/LeagueOfLegends.git"
```
</details>
Luego nos movemos a la carpeta donde se clono el proyecto y al nivel de nuestro archivo "docker-compose.yml", y ejecutamos...
<br>

```bash
docker-compose up -d
```
<br/>



## ☢️ Como funciona ?

Este proyecto se divide en 2 partes, el **Frontend** y el **Backend**

Para esto hay que comprender que el:

- Frontend: Consiste en la parte de una aplicación que interactúa con los usuarios, es conocida como el lado del cliente. 
- Backend: Consiste en un servidor, una aplicación y una base de datos. Se toman los datos, se procesa la información y se envía al usuario.

En este proyecto tomamos el rol de dos devs distintos, los desarrolladores de Front end y Back end suelen trabajar juntos para que todo funcione correctamente.

<br/>




## ✨ Aprendiendo a usar el `ChampionsAPI`

`radioactive-state` gives you a hook `useRS` (use radioactive state) which lets you create a radioactive state in your React Components.

### BASE_URL: http://localhost/Champions/api/v#

> v# se refiere a la versión de API, para este ejemplo será v1.


<details>
<summary>
🍭 <strong>OBTENER TODOS LOS CAMPEONES: BASE_URL + /champions/get_all</strong>

<p align='center'>
<br>
  <img align='center' src='src_readme/read.png' width='50'/>
</p>
</summary>

<!-- Live Demo -->
<a href='http://localhost/Champions/api/v1/champions/get_all' target="_blank" title='counter app'> Demo en Local </a>
Devolvera un response similar a este:

<!-- Code -->
```json
{
  "status": true,
  "error": false,
  "message": "OK",
  "system_code": "001",
  "data": [
    {
    "id": "1",
    "name": "Annie",
    "title": "the Dark Child",
    "lore": "In the time shortly before the League, there were those within the sinister city-state of Noxus who did not agree with the evils perpetrated by the Noxian High Command. The High Command had...",
    "tags": "mage,ranged,recommended",
    "image": "portraits/1.jpg",
    "icon": "icons/1.jpg",
    "habilities": [],
    "stats": [],
    "tips": []
    },
    //y los demás campeones...
  ]
}
```
</details>
<br/>

---

<details>
<summary>
<strong> 🍡OBTENER UN CAMPEON: BASE_URL + /champions/get/id/# </strong>
<p align='center'>
<br>
  <img align='center' src='src_readme/read.png' width='50'/>
</p>
</summary>

En esta ocasión, le pasaremos un parametros **id** que nos servirá para saber que campeon deseamos cosultar.

Por ejemplo el **id/8**. 

<a href='http://localhost/Champions/api/v1/champions/get/id/8' target="_blank" title='counter app'> Demo en Local </a>
Devolvera un response similar a este:

```json
{
"status": true,
"error": false,
"message": "OK",
"system_code": "001",
"data": [
    {
    "id": "8",
    "name": "Vladimir",
    "title": "the Crimson Reaper",
    "lore": "There is a temple hidden in the mountains between Noxus and the Tempest Flats, where the secrets of an ancient and terrifying sorcery are kept....",
    "tags": "fighter,mage,ranged",
    "image": "http://localhost/Champions/resources/portraits/8.jpg",
    "icon": "http://localhost/Champions/resources/icons/8.jpg",
    "habilities": [],
    "stats": [],
    "tips": []
    }
  ]
}
```
</details>
<br />

<br/>

## 💙 Únete

¿Quieres sumarte? ADELANTE

Encontraste un bug ? Mandame mensaje

- Email **manuel.canul109@gmail.com**

<br/>




## 💖 Te gusta este proyecto ?

Deje un ⭐ si cree que este proyecto es genial.

<br/>




## 👨‍💻 Author

### Manuel Canul

[Twitter](https://twitter.com/ManuelCanulDev "ManuelCanulDev")

<br/>




## 🍁 Licence

**MC**