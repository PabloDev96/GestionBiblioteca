<template>
  <div class="min-h-screen flex items-center justify-center bg-verdeBase">
    <form
      @submit.prevent="register"
      class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-4"
    >
      <h2 class="text-2xl font-bold text-verdeBase text-center mb-4">Crear cuenta</h2>

      <!-- Nombre -->
      <div>
        <label for="name" class="block text-verdeBase font-medium mb-1">Nombre</label>
        <input
          v-model="name"
          type="text"
          id="name"
          placeholder="Introduce tu nombre"
          required
          class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-verdeBase focus:outline-none"
        />
        <p v-if="errors.name" class="text-sm text-red-600 mt-1">{{ errors.name[0] }}</p>
      </div>

      <!-- Email -->
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
        <p v-if="errors.email" class="text-sm text-red-600 mt-1">{{ errors.email[0] }}</p>
      </div>

      <!-- Contraseña -->
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
        <p v-if="errors.password" class="text-sm text-red-600 mt-1">{{ errors.password[0] }}</p>
      </div>

      <!-- Confirmar contraseña -->
      <div>
        <label for="password_confirmation" class="block text-verdeBase font-medium mb-1">Confirmar Contraseña</label>
        <input
          v-model="password_confirmation"
          type="password"
          id="password_confirmation"
          placeholder="Repite tu contraseña"
          required
          class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-verdeBase focus:outline-none"
        />
        <p v-if="errors.password_confirmation" class="text-sm text-red-600 mt-1">{{ errors.password_confirmation[0] }}</p>
      </div>

      <button
        type="submit"
        class="w-full bg-verdeBase text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition duration-300"
      >
        Registrarse
      </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errors: {} // Aquí guardamos los errores por campo
    };
  },
  methods: {
    register() {
      this.errors = {}; // Limpia errores anteriores
      axios
        .post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        })
        .then((response) => {
          localStorage.setItem('token', response.data.token);
          this.$router.push({ name: 'Profile' });
        })
        .catch((error) => {
          if (error.response && error.response.status === 422) {
            this.errors = error.response.data.errors; // Captura los errores
          } else {
            console.error('Error al registrarse:', error);
            alert('Error inesperado. Intenta más tarde.');
          }
        });
    }
  }
};
</script>