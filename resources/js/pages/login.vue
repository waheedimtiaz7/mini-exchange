<script setup>
import { ref } from "vue";
import { api, setToken } from "../lib/api";
import { notify, toast } from "../lib/toast";

const email = ref("");
const password = ref("");
const loading = ref(false);

async function login() {
  loading.value = true;
  try {
    const { data } = await api.post("/api/auth/login", { email: email.value, password: password.value });
    localStorage.setItem("token", data.token);
    setToken(data.token);
    location.href = "/";
  } catch (e) {
    notify("Invalid credentials", "error");
  } finally {
    loading.value = false;
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-sm bg-white rounded-2xl shadow p-6 space-y-4">
      <div class="text-xl font-semibold">Login</div>

      <div v-if="toast.show" class="text-sm" :class="toast.type === 'error' ? 'text-red-600' : 'text-gray-700'">
        {{ toast.message }}
      </div>

      <input class="w-full border rounded-xl p-2" v-model="email" placeholder="Email" />
      <input class="w-full border rounded-xl p-2" v-model="password" type="password" placeholder="Password" />

      <button class="w-full border rounded-xl p-2" :disabled="loading" @click="login">
        {{ loading ? "Logging in..." : "Login" }}
      </button>
    </div>
  </div>
</template>
