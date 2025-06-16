<template>
    <ul>
        <li>
            <router-link to="/books">Lista de libros</router-link>
        </li>
        <li>
            <router-link to="/login">Login</router-link>
        </li>
        <li>
            <router-link to="/register">Registro</router-link>
        </li>
    </ul>
    <div>
        <h1>Biblioteca</h1>
    </div>
    <router-view></router-view>  
</template>