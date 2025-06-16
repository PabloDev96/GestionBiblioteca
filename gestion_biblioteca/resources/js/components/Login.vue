<template>
  <div class="min-h-screen flex items-center justify-center bg-verdeBase">
    <form
      @submit.prevent="login"
      class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-4"
    >
      <h2 class="text-2xl font-bold text-verdeBase text-center mb-4">Iniciar sesión</h2>

      <div>
        <label for="email" class="block text-verdeBase font-medium mb-1">Email</label>
        <input
          v-model="email"
          type="email"
          id="email"
          placeholder="Introduce tu correo"
          required
          class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-verdeBase focus:outline-none"
        />
      </div>

      <div>
        <label for="password" class="block text-verdeBase font-medium mb-1">Contraseña</label>
        <input
          v-model="password"
          type="password"
          id="password"
          placeholder="Introduce tu contraseña"
          required
          class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-verdeBase focus:outline-none"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-verdeBase text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300"
      >
        Iniciar sesión
      </button>
    </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        login() {
            axios
                .post('/api/login', {
                    email: this.email,
                    password: this.password
                })
                .then((response) => {
                    alert("Has iniciado sesión correctamente");
                    localStorage.setItem('token', response.data.token);
                    this.$router.push({ name: 'Profile' }); // Redirigir al usuario a la página principal después del registro
                })
                .catch((error) => {
                    alert("Error inicio de sesión");
                    console.error('Error al iniciar sesión:', error);
                });
        },
    },
};
</script>