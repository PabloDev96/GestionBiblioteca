<template>
    <div>
        <h2 class="bg-red-800 text-white">Lista de libros</h2>
        <ul class="list-disc pl-5">
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
                <button @click="addFavorito(book.id)" class="px-3 py-1 ml-2 bg-blue-500 hover:bg-blue-700 text-white rounded"> Add Fav

                </button>

            </li>
        </ul>
    </div>    

</template>

<script>
import Cookies from 'js-cookie';
    export default{
        data(){
            return{
                books: [],
            }
        },
        mounted(){
            fetch('api/libros')
                .then(response => response.json())
                .then(data => {
                    this.books = data;
                })
        },
        methods:{
            addFavorito(id){
                let favorites = Cookies.get('favorites')
                if(!favorites){
                    favorites = '[]';
                }
                //Parseo lista
                favorites = JSON.parse(favorites);

                //Agregar nuevo favorito
                if(!favorites.includes(id)){
                    favorites.push(id);

                    Cookies.set('favorites', JSON.stringify(favorites), {expires : 30});
                }

                //Actualizar la variable
                this.favorites = favorites;

                console.log(favorites);
            }
        }
    }
</script>

