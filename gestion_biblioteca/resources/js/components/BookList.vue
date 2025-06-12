<template>
    <div>
        <h2 class="bg-red-800 text-white">Lista de libros</h2>
        <ul class="list-disc pl-5">
            <li v-for="book in books" :key="book.id">
                {{ book.title }}

            </li>
        </ul>
    </div>    

</template>

<script>
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
        }
    }
</script>

