<template>
  <div class="flex h-screen bg-gray-200 font-roboto">

    <div class="flex-1 flex flex-col overflow-hidden">
      <Header />

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div
        class="
          max-w-2xl
          mx-auto
          p-4
          sm:p-6
          lg:p-8
          w-full
          sm:max-w-md
          mt-6
          px-6
          py-4
          bg-white
          shadow-md
          overflow-hidden
          sm:rounded-lg
        ">
        <form
        @submit.prevent="
          form.post(route('vehicleTypes.store'), {
            onSuccess: () => form.reset(),
          })
        ">

          <div>
            <InputLabel for="name" value="Tipo" />
            <TextInput
              id="name"
              type="text"
              class="mb-1 block w-full"
              v-model="form.name"
              autofocus
            />
            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <PrimaryButton class="mt-4">Cadastrar</PrimaryButton>

        </form>
        
      </div>

      </main>
    </div>
  </div>
</template>

<script setup lang="ts">

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";

import Header from "../../Components/Header.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";


const form = useForm({
  name: "",
});

</script>