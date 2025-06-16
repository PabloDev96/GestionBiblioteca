<template>
    <div>
        <h2>Perfil del usuario</h2>
        <div v-if="user">
            <p> Nombre: {{ user.name }}</p>
            <p> Correo electrónico: {{ user.email }}</p>
        </div>
        <button class="bg-blue-500 text-white" @click="logout"> Cerrar sesión </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
        };
    },
    mounted() {
        fetch('/api/user', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                this.user = data;
            })
            .catch((error) => {
                console.error('Error al obtener el perfil del usuario:', error);
            });
    },
    methods: {
        logout() {
            fetch('/logout', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                }
            })
            .then(() => {
                localStorage.removeItem('token');
                this.$router.push({ name: 'Login' }); // Redirigir al usuario a la página de inicio de sesión
            })
            .catch((error) => {
                console.error('Error al cerrar sesión:', error);
            });
        },
    },
};
</script>